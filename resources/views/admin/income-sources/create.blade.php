@extends('layouts.app')

@section('title', 'Add Income Source')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Add Income Source</h1>
    <a href="{{ route('income-sources.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('income-sources.store') }}">
            @csrf
            @include('admin.income-sources.form')
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
