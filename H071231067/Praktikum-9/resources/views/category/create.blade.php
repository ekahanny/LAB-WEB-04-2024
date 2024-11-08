<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<h1>Add Category</h1>

<form action="{{ route('categories.store') }}" method="POST" class="bg-dark-primary p-4 rounded">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>
@endsection
