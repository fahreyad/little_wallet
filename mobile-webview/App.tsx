import { StatusBar } from 'expo-status-bar';
import React, { useCallback, useEffect, useRef, useState } from 'react';
import {
  ActivityIndicator,
  BackHandler,
  Platform,
  StyleSheet,
  Text,
  TouchableOpacity,
  View,
} from 'react-native';
import { SafeAreaProvider, SafeAreaView } from 'react-native-safe-area-context';
import WebView, { WebViewNavigation } from 'react-native-webview';

const SITE_URL = 'https://pocket.fahreyad.site';

export default function App() {
  return (
    <SafeAreaProvider>
      <SiteWebView />
    </SafeAreaProvider>
  );
}

function SiteWebView() {
  const webViewRef = useRef<WebView>(null);
  const [canGoBack, setCanGoBack] = useState(false);
  const [hasError, setHasError] = useState(false);
  const [reloadKey, setReloadKey] = useState(0);

  const handleNavigationStateChange = useCallback((navState: WebViewNavigation) => {
    setCanGoBack(navState.canGoBack);
  }, []);

  useEffect(() => {
    if (Platform.OS !== 'android') return;

    const subscription = BackHandler.addEventListener('hardwareBackPress', () => {
      if (canGoBack && webViewRef.current) {
        webViewRef.current.goBack();
        return true;
      }
      return false;
    });

    return () => subscription.remove();
  }, [canGoBack]);

  const retry = () => {
    setHasError(false);
    setReloadKey((key) => key + 1);
  };

  return (
    <SafeAreaView style={styles.flex} edges={['top', 'bottom']}>
      <StatusBar style="dark" />

      {hasError ? (
        <View style={styles.center}>
          <Text style={styles.errorTitle}>Couldn't load Little Wallet</Text>
          <Text style={styles.errorSubtitle}>Check your connection and try again.</Text>
          <TouchableOpacity style={styles.retryButton} onPress={retry}>
            <Text style={styles.retryText}>Retry</Text>
          </TouchableOpacity>
        </View>
      ) : (
        <WebView
          key={reloadKey}
          ref={webViewRef}
          source={{ uri: SITE_URL }}
          style={styles.flex}
          onNavigationStateChange={handleNavigationStateChange}
          onError={() => setHasError(true)}
          onHttpError={(event) => {
            if (event.nativeEvent.statusCode >= 500) {
              setHasError(true);
            }
          }}
          pullToRefreshEnabled
          startInLoadingState
          renderLoading={() => (
            <View style={[styles.center, styles.absoluteFill]}>
              <ActivityIndicator size="large" color="#2563eb" />
            </View>
          )}
          allowsBackForwardNavigationGestures
        />
      )}
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  flex: { flex: 1, backgroundColor: '#ffffff' },
  absoluteFill: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    backgroundColor: '#ffffff',
  },
  center: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    padding: 24,
  },
  errorTitle: {
    fontSize: 17,
    fontWeight: '700',
    color: '#0f172a',
    marginBottom: 6,
  },
  errorSubtitle: {
    fontSize: 13,
    color: '#64748b',
    marginBottom: 20,
    textAlign: 'center',
  },
  retryButton: {
    backgroundColor: '#2563eb',
    paddingHorizontal: 24,
    paddingVertical: 10,
    borderRadius: 8,
  },
  retryText: {
    color: '#fff',
    fontWeight: '600',
    fontSize: 14,
  },
});
