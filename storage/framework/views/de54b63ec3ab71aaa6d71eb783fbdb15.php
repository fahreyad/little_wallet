<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card text-bg-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title">This Month Profit</h5>
                        <p class="card-text display-6"><?php echo e(number_format($monthlyProfit, 2)); ?></p>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2">
                        <i class="bi bi-calendar-month fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card text-bg-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title">Total Profit</h5>
                        <p class="card-text display-6"><?php echo e(number_format($totalProfit, 2)); ?></p>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card text-bg-info h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title">Recent Records</h5>
                        <p class="card-text display-6"><?php echo e($recentProfits->count()); ?></p>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2">
                        <i class="bi bi-clock-history fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header bg-transparent border-bottom-0 pt-4 pb-0">
                <h5 class="card-title fw-bold mb-0">Monthly Profit Trend</h5>
                <p class="text-secondary small">Profit performance over time</p>
            </div>
            <div class="card-body">
                <canvas id="profitChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-transparent border-bottom-0 pt-4 pb-0">
                <h5 class="card-title fw-bold mb-0">Recent Profits</h5>
                <p class="text-secondary small">Latest recorded entries</p>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <?php $__empty_1 = true; $__currentLoopData = $recentProfits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <span class="fw-medium d-block"><?php echo e($profit->incomeSource->name); ?></span>
                                <small class="text-secondary"><?php echo e($profit->date->format('M d, Y')); ?></small>
                            </div>
                            <span class="badge bg-primary rounded-pill"><?php echo e(number_format($profit->amount, 2)); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item text-center py-4 text-secondary">No profits recorded yet.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function () {
        const isDark = document.documentElement.getAttribute('data-bs-theme') === 'dark';
        const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
        const textColor = isDark ? '#adb5bd' : '#6c757d';

        const ctx = document.getElementById('profitChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($monthlyChart->pluck('month_label')); ?>,
                datasets: [{
                    label: 'Profit',
                    data: <?php echo json_encode($monthlyChart->pluck('total')); ?>,
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.15)',
                    borderWidth: 3,
                    pointBackgroundColor: '#0d6efd',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: isDark ? '#212529' : '#fff',
                        titleColor: isDark ? '#fff' : '#000',
                        bodyColor: isDark ? '#adb5bd' : '#6c757d',
                        borderColor: isDark ? '#495057' : '#dee2e6',
                        borderWidth: 1,
                        padding: 12,
                        callbacks: {
                            label: function(context) {
                                return 'Profit: ' + Number(context.parsed.y).toFixed(2);
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: textColor }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: gridColor },
                        ticks: { color: textColor }
                    }
                }
            }
        });
    })();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>