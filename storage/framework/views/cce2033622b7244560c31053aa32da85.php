<?php $__env->startSection('title', $incomeSource->name); ?>
<?php $__env->startSection('page-title', $incomeSource->name); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?php echo e(route('income-sources.index')); ?>" class="text-decoration-none text-secondary small"><i class="bi bi-arrow-left"></i> Back to sources</a>
        <h1 class="h3 fw-bold mt-1 mb-0"><?php echo e($incomeSource->name); ?></h1>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('income-sources.edit', $incomeSource)); ?>" class="btn btn-warning btn-icon">
            <i class="bi bi-pencil"></i> Edit
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card text-bg-primary h-100">
            <div class="card-body">
                <h5 class="card-title">Invested Money</h5>
                <p class="card-text display-6"><?php echo e(number_format($incomeSource->investment_amount, 2)); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card <?php echo e($incomeSource->is_active ? 'text-bg-success' : 'text-bg-secondary'); ?> h-100">
            <div class="card-body">
                <h5 class="card-title">Status</h5>
                <p class="card-text display-6"><?php echo e($incomeSource->is_active ? 'Active' : 'Inactive'); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card text-bg-info h-100">
            <div class="card-body">
                <h5 class="card-title">Total Profits</h5>
                <p class="card-text display-6"><?php echo e(number_format($incomeSource->profits->sum('amount'), 2)); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-transparent pt-4 pb-0 border-bottom-0">
        <h5 class="card-title fw-bold mb-0">Recent Profits</h5>
        <p class="text-secondary small">Profit history for this source</p>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Total Amount</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $incomeSource->profits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($profit->date->format('M d, Y')); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($profit->amount, 2)); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($profit->total_amount, 2)); ?></td>
                            <td class="text-secondary"><?php echo e($profit->notes ?: '—'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-secondary">
                                <i class="bi bi-graph-up-arrow fs-2 d-block mb-2"></i>
                                No profits recorded yet.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/income-sources/show.blade.php ENDPATH**/ ?>