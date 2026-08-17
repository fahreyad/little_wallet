@extends('layouts.app')

@section('title', 'Add Profit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Add Profit</h1>
    <a href="{{ route('profits.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('profits.store') }}">
            @csrf
            @include('admin.profits.form')
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
