@extends('layouts.app')

@section('title', $incomeSource->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">{{ $incomeSource->name }}</h1>
    <div>
        <a href="{{ route('income-sources.edit', $incomeSource) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('income-sources.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <p><strong>Description:</strong> {{ $incomeSource->description ?? 'N/A' }}</p>
        <p><strong>Invested Money:</strong> {{ number_format($incomeSource->investment_amount, 2) }}</p>
        <p><strong>Status:</strong> {{ $incomeSource->is_active ? 'Active' : 'Inactive' }}</p>
    </div>
</div>

<div class="card">
    <div class="card-header">Recent Profits</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($incomeSource->profits as $profit)
                    <tr>
                        <td>{{ $profit->date->format('Y-m-d') }}</td>
                        <td>{{ number_format($profit->amount, 2) }}</td>
                        <td>{{ number_format($profit->total_amount, 2) }}</td>
                        <td>{{ $profit->notes }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No profits recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
