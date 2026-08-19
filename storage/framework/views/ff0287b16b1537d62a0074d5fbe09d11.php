<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 3rem);">
    <div class="col-md-5 col-lg-4">
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center rounded-4 mb-3" style="width: 4rem; height: 4rem; background: linear-gradient(135deg, #0d6efd, #0dcaf0);">
                <i class="bi bi-wallet2 text-white fs-2"></i>
            </div>
            <h2 class="fw-bold mb-1">Welcome back</h2>
            <p class="text-secondary mb-0">Sign in to <?php echo e(config('app.name')); ?></p>
        </div>

        <div class="card shadow border-0">
            <div class="card-body p-4 p-md-5">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-medium">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 btn-icon justify-content-center py-2">
                        <i class="bi bi-box-arrow-in-right"></i> Sign In
                    </button>
                </form>
            </div>
        </div>

        <p class="text-center text-secondary small mt-4 mb-0">&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>