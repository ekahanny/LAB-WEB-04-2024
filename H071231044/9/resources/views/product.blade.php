<!-- resources/views/product.blade.php -->
@extends('layout.master')

@section('title', 'Product Management')
@section('header', 'Product Management')

@section('content')

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Error Message -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($errors->has('quantity'))
        <div class="alert alert-danger">
            {{ $errors->first('quantity') }}
        </div>
    @endif


    <!-- Tabel Produk -->
    <table class="table mt-3 table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $produc)
                <tr>
                    <td>{{ $produc->id }}</td>
                    <td>{{ $produc->category->name }}</td>
                    <td>{{ $produc->name }}</td>
                    <td>{{ $produc->description }}</td>
                    <td>{{ $produc->price }}</td>
                    <td>{{ $produc->stock }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $produc->id }}">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal{{ $produc->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
                @include('modals.edit_product', ['product' => $produc])
                @include('modals.delete_product', ['product' => $produc])
            @endforeach
        </tbody>
    </table>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>

    <div class="d-flex justify-content-center">
        {{ $product->links() }}
    </div>

    @include('modals.add_product')
@endsection
