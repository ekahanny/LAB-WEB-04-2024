@extends('layouts.app')

@section('title', 'Welcome to Toko Cookies Pak Budi')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Welcome Section -->

    <section class="main-content py-5" >
        <div class="container">
            <div class="row align-items-center" style="font-family: 'Poppins', sans-serif;">
                <div class="col-md-6">
                    <h1 class="display-4 text-warning">Selamat Datang di Toko Cookies</h1>
                <p>Nikmati berbagai varian cookies lezat yang kami tawarkan!</p>
                {{-- <a href="#" class="btn btn-warning text-white" link="{{ url('/about') }}">Order Now</a> --}}
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('image/bg.png') }}" class="card-img-top" alt="Product 3">
                </div>
            </div>
            </div>
    </section>



    <!-- Product Section -->    
    <div class="row" style="display: flex; justify-content: center; gap: 40px; font-family: 'Poppins', sans-serif; ">
        <div class="card" style="width: 18rem;color:black;">
            <img src="https://i.pinimg.com/564x/64/c9/3f/64c93fc7f518e7e7e343a727bdbe6aa1.jpg" class="card-img-top" alt="Chocolate Chip Cookies">
                        <div class="card-body">
                            <h5 class="card-title">Chocolate Chip Cookies</h5>
                            <p class="card-text"> Nikmati cokelat lezat dalam setiap gigitan.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-warning">Lihat Produk</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;color:black;">
            <img src="https://i.pinimg.com/564x/f4/b4/a2/f4b4a25a1588e8ba2238fd0163a0231c.jpg" class="card-img-top" alt="Oatmeal Raisin Cookies">
            <div class="card-body">
                <h5 class="card-title">Oatmeal Raisin Cookies</h5>
                <p class="card-text">Kombinasi sempurna antara oatmeal dan kismis.</p>
                <a href="{{ route('products.index') }}" class="btn btn-warning">Lihat Produk</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;color:black;">
            <img src="https://i.pinimg.com/564x/3e/6f/23/3e6f23f329ca85e43c54ce21059d8c42.jpg" class="card-img-top" alt="Peanut Butter Cookies">
            <div class="card-body">
                <h5 class="card-title">Peanut Butter Cookies</h5>
                <p class="card-text">Kue yang kaya rasa selai kacang.</p>
                <a href="{{ route('products.index') }}" class="btn btn-warning">Lihat Produk</a>
            </div>
        </div>
    </div>




{{-- 
    <div class="container text-center mt-5">
        <h1 class="display-4 text-warning">Selamat Datang di Toko Cookies</h1>
        <img src="{{ asset('image/bg.png') }}" class="card-img-top" alt="Product 3">
        <p class="lead text-dark mb-4">Nikmati berbagai varian cookies lezat yang kami tawarkan!</p>
        <hr class="my-4">

        <!-- Featured Products Section -->
        <div class="text-center my-5">

            <div class="row">
                <div class="col-md-4 my-3">
                    <div class="card bg-light text-dark border-0">
                        <img src="https://i.pinimg.com/564x/76/9c/fc/769cfc2293721a5681ec968cb5d850f9.jpg" class="card-img-top" alt="Chocolate Chip Cookies">
                        <div class="card-body">
                            <h5 class="card-title">Chocolate Chip Cookies</h5>
                            <p class="card-text">Nikmati cokelat lezat dalam setiap gigitan.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-warning">Lihat Produk</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card bg-light text-dark border-0">
                        <img src="https://i.pinimg.com/564x/57/fa/cc/57facc3b5b588ff719f83701ed320823.jpg" class="card-img-top" alt="Oatmeal Raisin Cookies">
                        <div class="card-body">
                            <h5 class="card-title">Oatmeal Raisin Cookies</h5>
                            <p class="card-text">Kombinasi sempurna antara oatmeal dan kismis.</p>
                            <a href="{{ route('categories.index') }}" class="btn btn-warning">Lihat Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="card bg-light text-dark border-0">
                        <img src="https://i.pinimg.com/564x/fb/9b/b9/fb9bb982abb58fbaeb94a551ae39451d.jpg" class="card-img-top" alt="Peanut Butter Cookies">
                        <div class="card-body">
                            <h5 class="card-title">Peanut Butter Cookies</h5>
                            <p class="card-text">Kue yang kaya rasa selai kacang.</p>
                            <a href="{{ route('inventory-logs.index') }}" class="btn btn-warning">Lihat Inventory Log</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection