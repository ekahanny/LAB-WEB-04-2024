@extends('layouts.app')

@section('title', 'Welcome to Toko Pak Budi')

@section('content')
    <!-- Welcome Section -->
    <div class="container text-center mt-5">
        <h1 class="display-4 text-primary">Selamat Datang Pak Budi</h1>
        <hr class="my-4">

        <!-- Featured Products Section -->
        <div class="text-center my-5">

            <div class="row">
                <div class="col-md-4 my-3">
                    <div class="card bg-dark-primary text-light border-0">
                        <img src="{{ asset('images/produk.png') }}" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Produk</h5>
                            <p class="card-text">Ke menu Produk</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card bg-dark-primary text-light border-0">
                        <img src="{{ asset('images/kategori.png') }}" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Kategori</h5>
                            <p class="card-text">Ke Menu Kategori</p>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Lihat Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card bg-dark-primary text-light border-0">
                        <img src="{{ asset('images/log.png') }}" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Inventory Log</h5>
                            <p class="card-text">Ke Inventory Log.</p>
                            <a href="{{ route('inventory-logs.index') }}" class="btn btn-primary">Lihat Inventory Log</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
