@extends('layouts.app')

@section('title', 'Income Sources')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Income Sources</h1>
    <a href="{{ route('income-sources.create') }}" class="btn btn-primary">Add Income Source</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Invested Money</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($incomeSources as $source)
                    <tr>
                        <td>{{ $source->name }}</td>
                        <td>{{ $source->description }}</td>
                        <td>{{ number_format($source->investment_amount, 2) }}</td>
                        <td>
                            <span class="badge {{ $source->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $source->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('income-sources.show', $source) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('income-sources.edit', $source) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('income-sources.destroy', $source) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No income sources found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $incomeSources->links() }}
    </div>
</div>
@endsection
