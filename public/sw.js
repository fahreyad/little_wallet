const CACHE_VERSION = 'little-wallet-v1';
const STATIC_CACHE = `${CACHE_VERSION}-static`;

const APP_SHELL = [
  '/manifest.webmanifest',
  '/offline.html',
  '/icons/icon-192.png',
  '/icons/icon-512.png',
  '/icons/apple-touch-icon.png',
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(STATIC_CACHE).then((cache) => cache.addAll(APP_SHELL))
  );
  self.skipWaiting();
});

self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches
      .keys()
      .then((keys) =>
        Promise.all(
          keys
            .filter((key) => key.startsWith('little-wallet-') && key !== STATIC_CACHE)
            .map((key) => caches.delete(key))
        )
      )
      .then(() => self.clients.claim())
  );
});

self.addEventListener('fetch', (event) => {
  const { request } = event;

  // Never intercept mutating requests (form posts carry CSRF tokens the
  // service worker has no business touching) — let those hit the network.
  if (request.method !== 'GET') {
    return;
  }

  const url = new URL(request.url);

  // Page navigations: always prefer a fresh network response (this app is
  // session/auth driven, so cached HTML would show stale or wrong data),
  // falling back to a static offline page only when the network is down.
  if (request.mode === 'navigate') {
    event.respondWith(
      fetch(request).catch(() => caches.match('/offline.html'))
    );
    return;
  }

  // Same-origin app shell assets (icons, manifest): cache-first since they
  // rarely change and are safe to serve stale.
  const isAppShellAsset =
    url.origin === self.location.origin &&
    (url.pathname.startsWith('/icons/') || url.pathname === '/manifest.webmanifest');

  if (isAppShellAsset) {
    event.respondWith(
      caches.match(request).then(
        (cached) =>
          cached ||
          fetch(request).then((response) => {
            const clone = response.clone();
            caches.open(STATIC_CACHE).then((cache) => cache.put(request, clone));
            return response;
          })
      )
    );
    return;
  }

  // Everything else (API-style requests, CDN scripts, dynamic pages under
  // other modes) passes straight through to the network untouched.
});
