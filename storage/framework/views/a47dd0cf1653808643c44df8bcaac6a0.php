<?php $__env->startSection('title', 'Income Sources'); ?>
<?php $__env->startSection('page-title', 'Income Sources'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Income Sources</h1>
        <p class="text-secondary small mb-0">Manage your investment sources and track performance</p>
    </div>
    <a href="<?php echo e(route('income-sources.create')); ?>" class="btn btn-primary btn-icon">
        <i class="bi bi-plus-lg"></i> Add Source
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-end">Invested Money</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $incomeSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-medium"><?php echo e($source->name); ?></td>
                            <td class="text-secondary"><?php echo e($source->description ?: '—'); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($source->investment_amount, 2)); ?></td>
                            <td>
                                <span class="badge <?php echo e($source->is_active ? 'bg-success-subtle text-success-emphasis' : 'bg-secondary-subtle text-secondary-emphasis'); ?> rounded-pill">
                                    <?php echo e($source->is_active ? 'Active' : 'Inactive'); ?>

                                </span>
                            </td>
                            <td class="text-end">
                                <a href="<?php echo e(route('income-sources.show', $source)); ?>" class="btn btn-sm btn-outline-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('income-sources.edit', $source)); ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('income-sources.destroy', $source)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this income source?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="bi bi-diagram-3 fs-2 d-block mb-2"></i>
                                No income sources found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($incomeSources->hasPages()): ?>
        <div class="card-footer bg-transparent">
            <?php echo e($incomeSources->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/income-sources/index.blade.php ENDPATH**/ ?>