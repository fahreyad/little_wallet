@extends('layouts.app')

@section('title', $incomeSource->name)
@section('page-title', $incomeSource->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('income-sources.index') }}" class="text-decoration-none text-secondary small"><i class="bi bi-arrow-left"></i> Back to sources</a>
        <h1 class="h3 fw-bold mt-1 mb-0">{{ $incomeSource->name }}</h1>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('income-sources.edit', $incomeSource) }}" class="btn btn-warning btn-icon">
            <i class="bi bi-pencil"></i> Edit
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card text-bg-primary h-100">
            <div class="card-body">
                <h5 class="card-title">Invested Money</h5>
                <p class="card-text display-6">{{ number_format($incomeSource->investment_amount, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card {{ $incomeSource->is_active ? 'text-bg-success' : 'text-bg-secondary' }} h-100">
            <div class="card-body">
                <h5 class="card-title">Status</h5>
                <p class="card-text display-6">{{ $incomeSource->is_active ? 'Active' : 'Inactive' }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card text-bg-info h-100">
            <div class="card-body">
                <h5 class="card-title">Total Profits</h5>
                <p class="card-text display-6">{{ number_format($incomeSource->profits->sum('amount'), 2) }}</p>
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
                    @forelse($incomeSource->profits as $profit)
                        <tr>
                            <td>{{ $profit->date->format('M d, Y') }}</td>
                            <td class="text-end font-monospace">{{ number_format($profit->amount, 2) }}</td>
                            <td class="text-end font-monospace">{{ number_format($profit->total_amount, 2) }}</td>
                            <td class="text-secondary">{{ $profit->notes ?: '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-secondary">
                                <i class="bi bi-graph-up-arrow fs-2 d-block mb-2"></i>
                                No profits recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
