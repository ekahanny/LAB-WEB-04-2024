<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Product')

@section('content')


<form action="{{ route('products.store') }}" method="POST" style="width: 70%; border-radius: 10px; overflow: hidden; margin: 0 auto; font-family: 'Poppins', sans-serif;">
    @csrf
    <div class="mb-3 mt-5">
        <h1>Add Product</h1>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select id="category_id" name="category_id" class="form-control" required>
        
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
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

</form>

<div class="d-flex justify-content-between mt-4 mb-5">
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary" style="background-color: burlywood; color:black;">Add Product</button>
</div>
@endsection