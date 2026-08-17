@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">This Month Profit</h5>
                <p class="card-text display-6">{{ number_format($monthlyProfit, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Profit</h5>
                <p class="card-text display-6">{{ number_format($totalProfit, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Recent Records</h5>
                <p class="card-text display-6">{{ $recentProfits->count() }}</p>
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
                @forelse($recentProfits as $profit)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $profit->incomeSource->name }}
                        <span class="badge bg-primary rounded-pill">{{ number_format($profit->amount, 2) }}</span>
                    </li>
                @empty
                    <li class="list-group-item">No profits recorded yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('profitChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($monthlyChart->pluck('month_label')) !!},
            datasets: [{
                label: 'Profit',
                data: {!! json_encode($monthlyChart->pluck('total')) !!},
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
@endpush
