@extends('layouts.app')

@section('title', 'Income Sources')
@section('page-title', 'Income Sources')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-0">Income Sources</h1>
        <p class="text-secondary small mb-0">Manage your investment sources and track performance</p>
    </div>
    <a href="{{ route('income-sources.create') }}" class="btn btn-primary btn-icon">
        <i class="bi bi-plus-lg"></i> Add Source
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-end">Invested Money</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($incomeSources as $source)
                        <tr>
                            <td class="fw-medium">{{ $source->name }}</td>
                            <td class="text-secondary">{{ $source->description ?: '—' }}</td>
                            <td class="text-end font-monospace">{{ number_format($source->investment_amount, 2) }}</td>
                            <td>
                                <span class="badge {{ $source->is_active ? 'bg-success-subtle text-success-emphasis' : 'bg-secondary-subtle text-secondary-emphasis' }} rounded-pill">
                                    {{ $source->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('income-sources.show', $source) }}" class="btn btn-sm btn-outline-info" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('income-sources.edit', $source) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('income-sources.destroy', $source) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this income source?');">
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
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="bi bi-diagram-3 fs-2 d-block mb-2"></i>
                                No income sources found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($incomeSources->hasPages())
        <div class="card-footer bg-transparent">
            {{ $incomeSources->links() }}
        </div>
    @endif
</div>
@endsection
