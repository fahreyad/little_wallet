<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">This Month Profit</h5>
                <p class="card-text display-6"><?php echo e(number_format($monthlyProfit, 2)); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Profit</h5>
                <p class="card-text display-6"><?php echo e(number_format($totalProfit, 2)); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Recent Records</h5>
                <p class="card-text display-6"><?php echo e($recentProfits->count()); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">Monthly Profit Trend</div>
            <div class="card-body">
                <canvas id="profitChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">Recent Profits</div>
            <ul class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $recentProfits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo e($profit->incomeSource->name); ?>

                        <span class="badge bg-primary rounded-pill"><?php echo e(number_format($profit->amount, 2)); ?></span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="list-group-item">No profits recorded yet.</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('profitChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($monthlyChart->pluck('month_label')); ?>,
            datasets: [{
                label: 'Profit',
                data: <?php echo json_encode($monthlyChart->pluck('total')); ?>,
                borderColor: 'rgb(13, 110, 253)',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>