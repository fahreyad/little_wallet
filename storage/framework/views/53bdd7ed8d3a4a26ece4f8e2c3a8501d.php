<?php $__env->startSection('title', 'Profit Reports'); ?>
<?php $__env->startSection('page-title', 'Monthly Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Monthly Reports</h1>
        <p class="text-secondary small mb-0">Review profit summaries by month</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body p-4">
        <form method="GET" action="<?php echo e(route('reports.index')); ?>" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="year" class="form-label small fw-medium text-secondary">Year</label>
                <select class="form-select" id="year" name="year">
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($y); ?>" <?php echo e($y == $year ? 'selected' : ''); ?>><?php echo e($y); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100 btn-icon justify-content-center">
                    <i class="bi bi-funnel"></i> Filter
                </button>
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
                        <th>Month</th>
                        <th class="text-end">Records</th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Total Amount</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $monthlyReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $monthId = str_replace('-', '_', $report->month); ?>
                        <tr>
                            <td class="fw-medium"><?php echo e($report->month); ?></td>
                            <td class="text-end"><?php echo e($report->records); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($report->amount, 2)); ?></td>
                            <td class="text-end font-monospace"><?php echo e(number_format($report->total_amount, 2)); ?></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#details_<?php echo e($monthId); ?>" aria-expanded="false">
                                    <i class="bi bi-list-ul"></i> Items
                                </button>
                                <a href="<?php echo e(route('reports.monthly', $report->month)); ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-box-arrow-up-right"></i> Full Report
                                </a>
                            </td>
                        </tr>
                        <tr class="collapse" id="details_<?php echo e($monthId); ?>">
                            <td colspan="5" class="p-0 border-0">
                                <div class="bg-body-tertiary p-3">
                                    <table class="table table-sm table-bordered mb-0 bg-body rounded overflow-hidden">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date</th>
                                                <th>Income Source</th>
                                                <th class="text-end">Amount</th>
                                                <th class="text-end">Total Amount</th>
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_2 = true; $__currentLoopData = $monthlyDetails[$report->month] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <tr>
                                                    <td><?php echo e($profit->date->format('M d, Y')); ?></td>
                                                    <td><?php echo e($profit->incomeSource->name); ?></td>
                                                    <td class="text-end font-monospace"><?php echo e(number_format($profit->amount, 2)); ?></td>
                                                    <td class="text-end font-monospace"><?php echo e(number_format($profit->total_amount, 2)); ?></td>
                                                    <td class="text-secondary"><?php echo e($profit->notes ?: '—'); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                <tr>
                                                    <td colspan="5" class="text-center py-3 text-secondary">No item details for this month.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="bi bi-file-earmark-bar-graph fs-2 d-block mb-2"></i>
                                No data found for this year.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/reports/index.blade.php ENDPATH**/ ?>