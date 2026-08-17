@extends('layouts.app')

@section('title', 'Edit Income Source')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Edit Income Source</h1>
    <a href="{{ route('income-sources.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('income-sources.update', $incomeSource) }}">
            @csrf
            @method('PUT')
            @include('admin.income-sources.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
