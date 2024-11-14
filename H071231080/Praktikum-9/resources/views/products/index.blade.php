@extends('layouts.app')

@section('title', 'Product List')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center" style="margin: 0 auto; font-family: 'Poppins', sans-serif;">
        <h1 class="me-3">Product List</h1>
    </div>
</div>

<div class="container">

    <!-- Dropdown "All Categories" centered above the table -->
    <div class="d-flex justify-content-center mb-3">
        <form method="GET" action="{{ route('products.index') }}" class="d-flex">
            <select name="category" class="form-select form-select-sm me-2 bg-light text-dark border-secondary" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <!-- Table with 70% width, border-radius, and centered -->
    <table class="table table-light table-striped" style="width: 70%; border-radius: 10px; overflow: hidden; margin: 0 auto; font-family: 'Poppins', sans-serif;">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm" style="width: 60px;">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>


<div class="d-flex justify-content-end mt-4" style="width: 70%; margin: 0 auto; font-family: 'Poppins', sans-serif;">
    <a href="{{ route('products.create') }}" class="btn btn-primary" style="background-color: burlywood; color:black;">Add Product</a>
</div>
@endsection
