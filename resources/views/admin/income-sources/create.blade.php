@extends('layouts.app')

@section('title', 'Add Income Source')
@section('page-title', 'Add Income Source')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('income-sources.index') }}" class="text-decoration-none text-secondary small"><i class="bi bi-arrow-left"></i> Back to sources</a>
        <h1 class="h3 fw-bold mt-1 mb-0">Add Income Source</h1>
    </div>
</div>

<div class="card">
    <div class="card-body p-4 p-md-5">
        <form method="POST" action="{{ route('income-sources.store') }}">
            @csrf
            @include('admin.income-sources.form')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-icon">
                    <i class="bi bi-check-lg"></i> Save Source
                </button>
                <a href="{{ route('income-sources.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
