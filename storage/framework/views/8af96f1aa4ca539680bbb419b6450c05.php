<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --transition-speed: 0.25s;
        }

        body {
            min-height: 100vh;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .app-sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            border-right: 1px solid var(--bs-border-color);
            background-color: var(--bs-body-bg);
            transition: background-color var(--transition-speed) ease, border-color var(--transition-speed) ease;
            position: sticky;
            top: 0;
            align-self: flex-start;
            z-index: 1040;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--bs-emphasis-color);
            text-decoration: none;
            border-bottom: 1px solid var(--bs-border-color);
        }

        .brand-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: #fff;
            font-size: 1.1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 1.25rem;
            margin: 0.15rem 0.75rem;
            border-radius: 0.5rem;
            color: var(--bs-secondary-color);
            font-weight: 500;
            transition: all var(--transition-speed) ease;
        }

        .nav-link:hover {
            color: var(--bs-primary);
            background-color: rgba(var(--bs-primary-rgb), 0.08);
        }

        .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 1.25rem;
            text-align: center;
        }

        .app-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .app-header {
            height: 64px;
            border-bottom: 1px solid var(--bs-border-color);
            background-color: rgba(var(--bs-body-bg-rgb), 0.85);
            backdrop-filter: blur(8px);
            position: sticky;
            top: 0;
            z-index: 1030;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
        }

        .page-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--bs-emphasis-color);
            margin: 0;
        }

        .content-area {
            padding: 1.5rem;
            flex: 1;
        }

        .card {
            border: 1px solid var(--bs-border-color-translucent);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease, background-color var(--transition-speed) ease, border-color var(--transition-speed) ease;
        }

        .card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
        }

        .stat-card {
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            position: relative;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15), transparent);
            pointer-events: none;
        }

        .stat-card .card-title {
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            opacity: 0.9;
        }

        .stat-card .display-6 {
            font-weight: 700;
            font-size: 2rem;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.04em;
            color: var(--bs-secondary-color);
        }

        .theme-toggle {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--bs-border-color);
            background: transparent;
            color: var(--bs-emphasis-color);
            transition: all var(--transition-speed) ease;
        }

        .theme-toggle:hover {
            background-color: var(--bs-secondary-bg);
        }

        .theme-toggle .dark-icon {
            display: none;
        }

        [data-bs-theme="dark"] .theme-toggle .light-icon {
            display: none;
        }

        [data-bs-theme="dark"] .theme-toggle .dark-icon {
            display: inline;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        @media (max-width: 767.98px) {
            .app-sidebar {
                display: none;
            }

            .mobile-nav {
                display: flex !important;
            }
        }

        @media (min-width: 768px) {
            .mobile-nav {
                display: none !important;
            }
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="app-wrapper">
        <?php if(auth()->guard()->check()): ?>
        <nav class="app-sidebar d-none d-md-flex flex-column">
            <a href="<?php echo e(route('dashboard')); ?>" class="brand">
                <span class="brand-icon"><i class="bi bi-wallet2"></i></span>
                <span><?php echo e(config('app.name')); ?></span>
            </a>
            <ul class="nav flex-column py-3 flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('income-sources.*') ? 'active' : ''); ?>" href="<?php echo e(route('income-sources.index')); ?>">
                        <i class="bi bi-diagram-3"></i>
                        <span>Income Sources</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('profits.*') ? 'active' : ''); ?>" href="<?php echo e(route('profits.index')); ?>">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span>Profits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('reports.*') ? 'active' : ''); ?>" href="<?php echo e(route('reports.index')); ?>">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Reports</span>
                    </a>
                </li>
            </ul>
            <div class="p-3 border-top">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="nav-link w-100 border-0 text-start">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>
        <?php endif; ?>

        <main class="app-main">
            <?php if(auth()->guard()->check()): ?>
            <header class="app-header">
                <h1 class="page-title"><?php echo $__env->yieldContent('page-title', ''); ?></h1>
                <div class="user-menu">
                    <button type="button" class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
                        <i class="bi bi-moon-stars-fill dark-icon"></i>
                        <i class="bi bi-sun-fill light-icon"></i>
                    </button>
                    <span class="d-none d-sm-inline text-secondary small"><?php echo e(auth()->user()->email); ?></span>
                    <span class="user-avatar"><?php echo e(strtoupper(substr(auth()->user()->name ?? auth()->user()->email, 0, 1))); ?></span>
                </div>
            </header>

            <nav class="mobile-nav d-md-none border-bottom bg-body-tertiary px-3 py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-decoration-none fw-bold text-body"><?php echo e(config('app.name')); ?></a>
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </nav>

            <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title fw-bold" id="mobileSidebarLabel"><?php echo e(config('app.name')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    <ul class="nav flex-column py-3">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('income-sources.*') ? 'active' : ''); ?>" href="<?php echo e(route('income-sources.index')); ?>">
                                <i class="bi bi-diagram-3"></i> Income Sources
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('profits.*') ? 'active' : ''); ?>" href="<?php echo e(route('profits.index')); ?>">
                                <i class="bi bi-graph-up-arrow"></i> Profits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('reports.*') ? 'active' : ''); ?>" href="<?php echo e(route('reports.index')); ?>">
                                <i class="bi bi-file-earmark-bar-graph"></i> Reports
                            </a>
                        </li>
                    </ul>
                    <div class="p-3 border-top">
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="nav-link w-100 border-0 text-start">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="content-area">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i><?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger shadow-sm">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            const html = document.documentElement;
            const storedTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            html.setAttribute('data-bs-theme', storedTheme);

            const toggle = document.getElementById('themeToggle');
            if (toggle) {
                toggle.addEventListener('click', function () {
                    const current = html.getAttribute('data-bs-theme');
                    const next = current === 'dark' ? 'light' : 'dark';
                    html.setAttribute('data-bs-theme', next);
                    localStorage.setItem('theme', next);
                });
            }
        })();
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>