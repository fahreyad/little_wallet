@extends('layouts.app')

@section('title', 'Monthly Report: ' . $month)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Monthly Report: {{ $month }}</h1>
    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Amount</h5>
                <p class="card-text display-6">{{ number_format($totals['amount'], 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Profit</h5>
                <p class="card-text display-6">{{ number_format($totals['total_amount'], 2) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Income Source</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($profits as $profit)
                    <tr>
                        <td>{{ $profit->date->format('Y-m-d') }}</td>
                        <td>{{ $profit->incomeSource->name }}</td>
                        <td>{{ number_format($profit->amount, 2) }}</td>
                        <td>{{ number_format($profit->total_amount, 2) }}</td>
                        <td>{{ $profit->notes }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No records for this month.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
