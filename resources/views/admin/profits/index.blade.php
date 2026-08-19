@extends('layouts.app')

@section('title', 'Profits')
@section('page-title', 'Profits')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Profits</h1>
        <p class="text-secondary small mb-0">Track and manage profit records</p>
    </div>
    <a href="{{ route('profits.create') }}" class="btn btn-primary btn-icon">
        <i class="bi bi-plus-lg"></i> Add Profit
    </a>
</div>

<div class="card mb-4">
    <div class="card-header bg-transparent py-3 d-flex justify-content-between align-items-center">
        <h5 class="card-title fw-bold mb-0"><i class="bi bi-funnel me-2"></i>Filters</h5>
        <a href="{{ route('profits.index') }}" class="btn btn-sm btn-outline-secondary">Reset</a>
    </div>
    <div class="card-body p-4">
        <form method="GET" action="{{ route('profits.index') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="income_source_id" class="form-label small fw-medium text-secondary">Income Source</label>
                    <select class="form-select" id="income_source_id" name="income_source_id">
                        <option value="">All sources</option>
                        @foreach($incomeSources as $source)
                            <option value="{{ $source->id }}" {{ request('income_source_id') == $source->id ? 'selected' : '' }}>
                                {{ $source->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="date_from" class="form-label small fw-medium text-secondary">Date From</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                </div>

                <div class="col-md-3">
                    <label for="date_to" class="form-label small fw-medium text-secondary">Date To</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                </div>

                <div class="col-md-3">
                    <label for="sort" class="form-label small fw-medium text-secondary">Sort</label>
                    <select class="form-select" id="sort" name="sort">
                        <option value="date_desc" {{ request('sort', 'date_desc') == 'date_desc' ? 'selected' : '' }}>Date: Newest first</option>
                        <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Date: Oldest first</option>
                        <option value="amount_desc" {{ request('sort') == 'amount_desc' ? 'selected' : '' }}>Amount: High to Low</option>
                        <option value="amount_asc" {{ request('sort') == 'amount_asc' ? 'selected' : '' }}>Amount: Low to High</option>
                        <option value="total_desc" {{ request('sort') == 'total_desc' ? 'selected' : '' }}>Total: High to Low</option>
                        <option value="total_asc" {{ request('sort') == 'total_asc' ? 'selected' : '' }}>Total: Low to High</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="amount_min" class="form-label small fw-medium text-secondary">Amount Min</label>
                    <input type="number" step="0.01" class="form-control" id="amount_min" name="amount_min" value="{{ request('amount_min') }}" placeholder="0.00">
                </div>

                <div class="col-md-3">
                    <label for="amount_max" class="form-label small fw-medium text-secondary">Amount Max</label>
                    <input type="number" step="0.01" class="form-control" id="amount_max" name="amount_max" value="{{ request('amount_max') }}" placeholder="0.00">
                </div>

                <div class="col-md-3">
                    <label for="total_min" class="form-label small fw-medium text-secondary">Total Min</label>
                    <input type="number" step="0.01" class="form-control" id="total_min" name="total_min" value="{{ request('total_min') }}" placeholder="0.00">
                </div>

                <div class="col-md-3">
                    <label for="total_max" class="form-label small fw-medium text-secondary">Total Max</label>
                    <input type="number" step="0.01" class="form-control" id="total_max" name="total_max" value="{{ request('total_max') }}" placeholder="0.00">
                </div>

                <div class="col-md-6">
                    <label for="notes" class="form-label small fw-medium text-secondary">Notes</label>
                    <input type="text" class="form-control" id="notes" name="notes" value="{{ request('notes') }}" placeholder="Search notes...">
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
                    @forelse($profits as $profit)
                        <tr>
                            <td class="fw-medium">{{ $profit->incomeSource->name }}</td>
                            <td>{{ $profit->date->format('M d, Y') }}</td>
                            <td class="text-end font-monospace">{{ number_format($profit->amount, 2) }}</td>
                            <td class="text-end font-monospace">{{ number_format($profit->total_amount, 2) }}</td>
                            <td class="text-secondary">{{ $profit->notes ?: '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('profits.edit', $profit) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('profits.destroy', $profit) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this profit record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-secondary">
                                <i class="bi bi-graph-up-arrow fs-2 d-block mb-2"></i>
                                No profits found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($profits->hasPages())
        <div class="card-footer bg-transparent">
            <div class="d-flex justify-content-center">
                {{ $profits->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>
@endsection
