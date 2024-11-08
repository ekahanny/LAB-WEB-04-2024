<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<h1>Add Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
@endsection
