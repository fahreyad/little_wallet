@extends('layouts.app')

@section('title', 'Edit Profit')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Edit Profit</h1>
    <a href="{{ route('profits.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('profits.update', $profit) }}">
            @csrf
            @method('PUT')
            @include('admin.profits.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
