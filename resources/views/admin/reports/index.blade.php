@extends('layouts.app')

@section('title', 'Profit Reports')
@section('page-title', 'Monthly Reports')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Monthly Reports</h1>
        <p class="text-secondary small mb-0">Review profit summaries by month</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body p-4">
        <form method="GET" action="{{ route('reports.index') }}" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="year" class="form-label small fw-medium text-secondary">Year</label>
                <select class="form-select" id="year" name="year">
                    @foreach($years as $y)
                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
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
                    @forelse($monthlyReports as $report)
                        @php $monthId = str_replace('-', '_', $report->month); @endphp
                        <tr>
                            <td class="fw-medium">{{ $report->month }}</td>
                            <td class="text-end">{{ $report->records }}</td>
                            <td class="text-end font-monospace">{{ number_format($report->amount, 2) }}</td>
                            <td class="text-end font-monospace">{{ number_format($report->total_amount, 2) }}</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#details_{{ $monthId }}" aria-expanded="false">
                                    <i class="bi bi-list-ul"></i> Items
                                </button>
                                <a href="{{ route('reports.monthly', $report->month) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-box-arrow-up-right"></i> Full Report
                                </a>
                            </td>
                        </tr>
                        <tr class="collapse" id="details_{{ $monthId }}">
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
                                            @forelse($monthlyDetails[$report->month] ?? [] as $profit)
                                                <tr>
                                                    <td>{{ $profit->date->format('M d, Y') }}</td>
                                                    <td>{{ $profit->incomeSource->name }}</td>
                                                    <td class="text-end font-monospace">{{ number_format($profit->amount, 2) }}</td>
                                                    <td class="text-end font-monospace">{{ number_format($profit->total_amount, 2) }}</td>
                                                    <td class="text-secondary">{{ $profit->notes ?: '—' }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-3 text-secondary">No item details for this month.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="bi bi-file-earmark-bar-graph fs-2 d-block mb-2"></i>
                                No data found for this year.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
