<?php $__env->startSection('title', 'Edit Income Source'); ?>
<?php $__env->startSection('page-title', 'Edit Income Source'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?php echo e(route('income-sources.index')); ?>" class="text-decoration-none text-secondary small"><i class="bi bi-arrow-left"></i> Back to sources</a>
        <h1 class="h3 fw-bold mt-1 mb-0">Edit Income Source</h1>
    </div>
</div>

<div class="card">
    <div class="card-body p-4 p-md-5">
        <form method="POST" action="<?php echo e(route('income-sources.update', $incomeSource)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('admin.income-sources.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-icon">
                    <i class="bi bi-check-lg"></i> Update Source
                </button>
                <a href="<?php echo e(route('income-sources.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/income-sources/edit.blade.php ENDPATH**/ ?>