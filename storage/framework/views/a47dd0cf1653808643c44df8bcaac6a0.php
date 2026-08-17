<?php $__env->startSection('title', 'Income Sources'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Income Sources</h1>
    <a href="<?php echo e(route('income-sources.create')); ?>" class="btn btn-primary">Add Income Source</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Invested Money</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $incomeSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($source->name); ?></td>
                        <td><?php echo e($source->description); ?></td>
                        <td><?php echo e(number_format($source->investment_amount, 2)); ?></td>
                        <td>
                            <span class="badge <?php echo e($source->is_active ? 'bg-success' : 'bg-secondary'); ?>">
                                <?php echo e($source->is_active ? 'Active' : 'Inactive'); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('income-sources.show', $source)); ?>" class="btn btn-sm btn-info">View</a>
                            <a href="<?php echo e(route('income-sources.edit', $source)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?php echo e(route('income-sources.destroy', $source)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">No income sources found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php echo e($incomeSources->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/income-sources/index.blade.php ENDPATH**/ ?>