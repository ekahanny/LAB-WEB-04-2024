@extends('layout.master')

@section('title', 'Home')
@section('header', 'Home')

@section('content')
    <div class="center-content">
        <img src="{{ asset('images/Miaw.jpeg') }}" alt="Product Management" class="img-fluid">
        <p class="lead">Dr.Miaw</p>
        <br><br>
        <h1 class="mt-4">Welcome to Product Management</h1>
        <p class="lead">Manage your products, inventory, and categories easily from here.</p>
        
        <!-- Link navigasi ke halaman kategori dan produk -->
        <div class="mt-4">
            <a href="{{ route('category.index') }}" class="btn btn-primary mr-2">Categories</a>
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Products</a>
        </div>
    </div>

@endsection