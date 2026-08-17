<?php $__env->startSection('title', 'Add Profit'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Add Profit</h1>
    <a href="<?php echo e(route('profits.index')); ?>" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('profits.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('admin.profits.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/profits/create.blade.php ENDPATH**/ ?>