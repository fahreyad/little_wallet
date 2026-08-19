@extends('layouts.app')

@section('title', 'Edit Profit')
@section('page-title', 'Edit Profit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('profits.index') }}" class="text-decoration-none text-secondary small"><i class="bi bi-arrow-left"></i> Back to profits</a>
        <h1 class="h3 fw-bold mt-1 mb-0">Edit Profit</h1>
    </div>
</div>

<div class="card">
    <div class="card-body p-4 p-md-5">
        <form method="POST" action="{{ route('profits.update', $profit) }}">
            @csrf
            @method('PUT')
            @include('admin.profits.form')
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-icon">
                    <i class="bi bi-check-lg"></i> Update Profit
                </button>
                <a href="{{ route('profits.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
