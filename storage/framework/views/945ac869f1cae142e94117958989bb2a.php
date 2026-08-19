<?php $__env->startSection('title', 'Profits'); ?>
<?php $__env->startSection('page-title', 'Profits'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Profits</h1>
        <p class="text-secondary small mb-0">Track and manage profit records</p>
    </div>
    <a href="<?php echo e(route('profits.create')); ?>" class="btn btn-primary btn-icon">
        <i class="bi bi-plus-lg"></i> Add Profit
    </a>
</div>

<div class="card mb-4">
    <div class="card-header bg-transparent py-3 d-flex justify-content-between align-items-center">
        <h5 class="card-title fw-bold mb-0"><i class="bi bi-funnel me-2"></i>Filters</h5>
        <a href="<?php echo e(route('profits.index')); ?>" class="btn btn-sm btn-outline-secondary">Reset</a>
    </div>
    <div class="card-body p-4">
        <form method="GET" action="<?php echo e(route('profits.index')); ?>">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="income_source_id" class="form-label small fw-medium text-secondary">Income Source</label>
                    <select class="form-select" id="income_source_id" name="income_source_id">
                        <option value="">All sources</option>
                        <?php $__currentLoopData = $incomeSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($source->id); ?>" <?php echo e(request('income_source_id') == $source->id ? 'selected' : ''); ?>>
                                <?php echo e($source->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="date_from" class="form-label small fw-medium text-secondary">Date From</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" value="<?php echo e(request('date_from')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="date_to" class="form-label small fw-medium text-secondary">Date To</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="<?php echo e(request('date_to')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="sort" class="form-label small fw-medium text-secondary">Sort</label>
                    <select class="form-select" id="sort" name="sort">
                        <option value="date_desc" <?php echo e(request('sort', 'date_desc') == 'date_desc' ? 'selected' : ''); ?>>Date: Newest first</option>
                        <option value="date_asc" <?php echo e(request('sort') == 'date_asc' ? 'selected' : ''); ?>>Date: Oldest first</option>
                        <option value="amount_desc" <?php echo e(request('sort') == 'amount_desc' ? 'selected' : ''); ?>>Amount: High to Low</option>
                        <option value="amount_asc" <?php echo e(request('sort') == 'amount_asc' ? 'selected' : ''); ?>>Amount: Low to High</option>
                        <option value="total_desc" <?php echo e(request('sort') == 'total_desc' ? 'selected' : ''); ?>>Total: High to Low</option>
                        <option value="total_asc" <?php echo e(request('sort') == 'total_asc' ? 'selected' : ''); ?>>Total: Low to High</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="amount_min" class="form-label small fw-medium text-secondary">Amount Min</label>
                    <input type="number" step="0.01" class="form-control" id="amount_min" name="amount_min" value="<?php echo e(request('amount_min')); ?>" placeholder="0.00">
                </div>

                <div class="col-md-3">
                    <label for="amount_max" class="form-label small fw-medium text-secondary">Amount Max</label>
                    <input type="number" step="0.01" class="form-control" id="amount_max" name="amount_max" value="<?php echo e(request('amount_max')); ?>" placeholder="0.00">
                </div>

                <div class="col-md-3">
                    <label for="total_min" class="form-label small fw-medium text-secondary">Total Min</label>
                    <input type="number" step="0.01" class="form-control" id="total_min" name="total_min" value="<?php echo e(request('total_min')); ?>" placeholder="0.00">
                </div>

                <div class="col-md-3">
                    <label for="total_max" class="form-label small fw-medium text-secondary">Total Max</label>
                    <input type="number" step="0.01" class="form-control" id="total_max" name="total_max" value="<?php echo e(request('total_max')); ?>" placeholder="0.00">
                </div>

                <div class="col-md-6">
                    <label for="notes" class="form-label small fw-medium text-secondary">Notes</label>
                    <input type="text" class="form-control" id="notes" name="notes" value="<?php echo e(request('notes')); ?>" placeholder="Search notes...">
                </div>

                <div class="col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary btn-icon">
                        <i class="bi bi-funnel"></i> Apply Filters
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Income Source</th>
                        <th>Date</th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Total Amount</th>
                        <th>Notes</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $profits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-medium"><?php echo e($profit->incomeSource->name); ?></td>
                            <td><?php echo e($profit->date->format('M d, Y')); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($profit->amount, 2)); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($profit->total_amount, 2)); ?></td>
                            <td class="text-secondary"><?php echo e($profit->notes ?: '—'); ?></td>
                            <td class="text-end">
                                <a href="<?php echo e(route('profits.edit', $profit)); ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('profits.destroy', $profit)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this profit record?');">
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
                            <td colspan="6" class="text-center py-5 text-secondary">
                                <i class="bi bi-graph-up-arrow fs-2 d-block mb-2"></i>
                                No profits found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($profits->hasPages()): ?>
        <div class="card-footer bg-transparent">
            <div class="d-flex justify-content-center">
                <?php echo e($profits->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/profits/index.blade.php ENDPATH**/ ?>