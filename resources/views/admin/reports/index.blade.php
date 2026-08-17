@extends('layouts.app')

@section('title', 'Profit Reports')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Monthly Reports</h1>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('reports.index') }}" class="row g-3">
            <div class="col-md-4">
                <label for="year" class="form-label">Year</label>
                <select class="form-select" id="year" name="year">
                    @foreach($years as $y)
                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
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
                @forelse($monthlyReports as $report)
                    @php $monthId = str_replace('-', '_', $report->month); @endphp
                    <tr>
                        <td>{{ $report->month }}</td>
                        <td>{{ $report->records }}</td>
                        <td>{{ number_format($report->amount, 2) }}</td>
                        <td>{{ number_format($report->total_amount, 2) }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#details_{{ $monthId }}" aria-expanded="false">Show Items</button>
                            <a href="{{ route('reports.monthly', $report->month) }}" class="btn btn-sm btn-outline-info">Full Report</a>
                        </td>
                    </tr>
                    <tr class="collapse" id="details_{{ $monthId }}">
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
                                    @forelse($monthlyDetails[$report->month] ?? [] as $profit)
                                        <tr>
                                            <td>{{ $profit->date->format('Y-m-d') }}</td>
                                            <td>{{ $profit->incomeSource->name }}</td>
                                            <td>{{ number_format($profit->amount, 2) }}</td>
                                            <td>{{ number_format($profit->total_amount, 2) }}</td>
                                            <td>{{ $profit->notes }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No item details for this month.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No data found for this year.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
