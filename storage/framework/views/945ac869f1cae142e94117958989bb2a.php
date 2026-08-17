<?php $__env->startSection('title', 'Profits'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Profits</h1>
    <a href="<?php echo e(route('profits.create')); ?>" class="btn btn-primary">Add Profit</a>
</div>

<div class="card mb-4">
    <div class="card-header">Filters</div>
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('profits.index')); ?>">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="income_source_id" class="form-label">Income Source</label>
                    <select class="form-select" id="income_source_id" name="income_source_id">
                        <option value="">All</option>
                        <?php $__currentLoopData = $incomeSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($source->id); ?>" <?php echo e(request('income_source_id') == $source->id ? 'selected' : ''); ?>>
                                <?php echo e($source->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="date_from" class="form-label">Date From</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" value="<?php echo e(request('date_from')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="date_to" class="form-label">Date To</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="<?php echo e(request('date_to')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="sort" class="form-label">Sort</label>
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
                    <label for="amount_min" class="form-label">Amount Min</label>
                    <input type="number" step="0.01" class="form-control" id="amount_min" name="amount_min" value="<?php echo e(request('amount_min')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="amount_max" class="form-label">Amount Max</label>
                    <input type="number" step="0.01" class="form-control" id="amount_max" name="amount_max" value="<?php echo e(request('amount_max')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="total_min" class="form-label">Total Min</label>
                    <input type="number" step="0.01" class="form-control" id="total_min" name="total_min" value="<?php echo e(request('total_min')); ?>">
                </div>

                <div class="col-md-3">
                    <label for="total_max" class="form-label">Total Max</label>
                    <input type="number" step="0.01" class="form-control" id="total_max" name="total_max" value="<?php echo e(request('total_max')); ?>">
                </div>

                <div class="col-md-6">
                    <label for="notes" class="form-label">Notes</label>
                    <input type="text" class="form-control" id="notes" name="notes" value="<?php echo e(request('notes')); ?>" placeholder="Search notes...">
                </div>

                <div class="col-md-6 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="<?php echo e(route('profits.index')); ?>" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Income Source</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $profits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($profit->incomeSource->name); ?></td>
                        <td><?php echo e($profit->date->format('Y-m-d')); ?></td>
                        <td><?php echo e(number_format($profit->amount, 2)); ?></td>
                        <td><?php echo e(number_format($profit->total_amount, 2)); ?></td>
                        <td><?php echo e($profit->notes); ?></td>
                        <td>
                            <a href="<?php echo e(route('profits.edit', $profit)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?php echo e(route('profits.destroy', $profit)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">No profits found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            <?php echo e($profits->links('pagination::bootstrap-4')); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/profits/index.blade.php ENDPATH**/ ?>