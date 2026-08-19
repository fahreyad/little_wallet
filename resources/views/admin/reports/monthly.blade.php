@extends('layouts.app')

@section('title', 'Monthly Report: ' . $month)
@section('page-title', 'Monthly Report: ' . $month)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('reports.index') }}" class="text-decoration-none text-secondary small"><i class="bi bi-arrow-left"></i> Back to reports</a>
        <h1 class="h3 fw-bold mt-1 mb-0">Monthly Report: {{ $month }}</h1>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card stat-card text-bg-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title">Total Amount</h5>
                        <p class="card-text display-6">{{ number_format($totals['amount'], 2) }}</p>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card stat-card text-bg-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title">Total Profit</h5>
                        <p class="card-text display-6">{{ number_format($totals['total_amount'], 2) }}</p>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2">
                        <i class="bi bi-graph-up-arrow fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-transparent pt-4 pb-0 border-bottom-0">
        <h5 class="card-title fw-bold mb-0">Profit Records</h5>
        <p class="text-secondary small">All profit entries for {{ $month }}</p>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
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
                    @forelse($profits as $profit)
                        <tr>
                            <td>{{ $profit->date->format('M d, Y') }}</td>
                            <td class="fw-medium">{{ $profit->incomeSource->name }}</td>
                            <td class="text-end font-monospace">{{ number_format($profit->amount, 2) }}</td>
                            <td class="text-end font-monospace">{{ number_format($profit->total_amount, 2) }}</td>
                            <td class="text-secondary">{{ $profit->notes ?: '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="bi bi-graph-up-arrow fs-2 d-block mb-2"></i>
                                No records for this month.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
