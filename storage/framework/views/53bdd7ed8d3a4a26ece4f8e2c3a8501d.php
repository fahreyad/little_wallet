<?php $__env->startSection('title', 'Profit Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Monthly Reports</h1>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('reports.index')); ?>" class="row g-3">
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <select class="form-select" id="year" name="year">
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($y); ?>" <?php echo e($y == $year ? 'selected' : ''); ?>><?php echo e($y); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Records</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $monthlyReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php $monthId = str_replace('-', '_', $report->month); ?>
                    <tr>
                        <td><?php echo e($report->month); ?></td>
                        <td><?php echo e($report->records); ?></td>
                        <td><?php echo e(number_format($report->amount, 2)); ?></td>
                        <td><?php echo e(number_format($report->total_amount, 2)); ?></td>
                        <td>
                            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#details_<?php echo e($monthId); ?>" aria-expanded="false">Show Items</button>
                            <a href="<?php echo e(route('reports.monthly', $report->month)); ?>" class="btn btn-sm btn-outline-info">Full Report</a>
                        </td>
                    </tr>
                    <tr class="collapse" id="details_<?php echo e($monthId); ?>">
                        <td colspan="5" class="bg-light">
                            <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Income Source (Item)</th>
                                        <th>Amount</th>
                                        <th>Total Amount</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_2 = true; $__currentLoopData = $monthlyDetails[$report->month] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <tr>
                                            <td><?php echo e($profit->date->format('Y-m-d')); ?></td>
                                            <td><?php echo e($profit->incomeSource->name); ?></td>
                                            <td><?php echo e(number_format($profit->amount, 2)); ?></td>
                                            <td><?php echo e(number_format($profit->total_amount, 2)); ?></td>
                                            <td><?php echo e($profit->notes); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No item details for this month.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">No data found for this year.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/reports/index.blade.php ENDPATH**/ ?>