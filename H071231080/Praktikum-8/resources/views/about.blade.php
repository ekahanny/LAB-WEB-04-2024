@extends('layouts.master')

@section('title', 'About')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
<section class="main-content py-5" >
    <div class="container">
        <div class="row align-items-center" style="color: #37502d; font-family: 'Poppins', sans-serif;">
            <div class="col-md-6">
                    <h1 class="display-4">Our Experts Says</h1>
                    <p>Kami mentransformasi visi kami dalam menawarkan kopi berkualitas tinggi ke pelanggan menjadi sebuah prestasi yang bisa dicapai. Fore Coffee adalah brand kopi yang sangat berkomitmen dalam semua aspek penyajian kopi. Misi Fore lebih dari sekadar menyajikan kopi berkualitas. Misi kami termasuk menciptakan dampak ke komunitas melalui pembangunan cabang strategis dan partnership yang menciptakan pilihan menu kreatif. Kunci dari kesuksesan kami ada pada kerjasama kolaboratif kami, karena kami berjalan sebagai satu kesatuan #FOREactMe</p>
                {{-- <a href="#" class="btn btn-warning text-white" link="{{ url('/about') }}">Order Now</a> --}}
                </div>
                <div class="col-md-6">
                    <img src="https://d26bwjyd9l0e3m.cloudfront.net/wp-content/uploads/2023/10/Vico-Lomar-Chief-Executive-Fore-Coffee-Photo.jpg" alt="CEO" class="img-fluid" style="width: 400px; height:400px; border-radius:100%; background-size:cover ;background-position:right; padding:20px;">
                    <h3>Vico Lomar <br>
                        CEO of Fore Coffe</h3>
            </div>
        </div>
        </div>
</section>


<div class="description">
    <h1 style="text-shadow:10px 10px 20px aquamarine; text-align:center; padding:40px;">Our Menu</h1>
</div>

<!-- Products Gallery -->

<div class="row" style="display: flex; justify-content: center; gap: 40px;">
    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Americano%20Iced.jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>SIced Americano</h3>
            <p>Rp21.000</p>
            <p>Espresso shoot yang dicampur dengan segelas air menghadirkan karakter, aroma, dan rasa yang ideal.</p>
            <a href="https://fore.coffee/fore-wujudkan-harapan/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>

    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/sunnycitrus173.jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Sunny Citrus Jasmine</h3>
            <p>Rp 29.000</p>
            <p>Campuran spesial dari rasa buah tropikal, madu Manuka, dan teh jasmine yang menyegarkan</p>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>

    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Berry%20Manuka%20Americano%20(3).jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Berry Manuka Americano</h3>
            <p>Rp 29.000</p>
            <p>Perpaduan rasa Stroberi dan Manuka dengan Classic Blend Fore yang menyegarkan</p>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>
</div>
<br>
<br>



<!-- Products Gallery -->
<div class="row" style="display: flex; justify-content: center; gap: 40px;">
    <div class="card" style="width: 18rem;height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Capucino%20Iced%20(1).jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Iced Cappuccino</h3>
            <p>Rp29.000</p>
            <p>Paduan Espresso, susu hangat, dan lapisan foam tebal di atasnya tanpa gula tambahan.</p>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>

    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Double%20Iced%20Shaken%20Latte%20(1).jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Double Iced Shaken Latte</h3>
            <p>Rp 33.000</p>
            <p>Paduan klasik 2 shot espresso dengan susu dan krim</p>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>

    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/espresso173.jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Hot Americano</h3>
            <p>Rp 19.000</p>
            <p>Ekstrak biji kopi Arabika murni tanpa campuran</p> <br>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>
</div>

<br>
<br>


<div class="row" style="display: flex; justify-content: center; gap: 40px;">
    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Thumbnail_Aromatic%20Golden%20Jasmine%20Tea.jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Iced Aromatic Golden Jasmine Tea</h3>
            <p>Rp29.000</p>
            <p>Segarnya jasmine tea paduan aromatik dari cream jasmine </p>
            <a href="https://fore.coffee/fore-wujudkan-harapan/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>

    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Thumbnail_Aromatic%20Pandan%20Jasmine%20Latte.jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Iced Aromatic Pandan Jasmine Latte</h3>
            <p>Rp 29.000</p>
            <p>Nikmatnya pandan latte dengan cream jasmine yang aromatik</p>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>

    <div class="card" style="width: 18rem; height:35rem; background-color: #37502d; color:white;">
        <img src="https://static.fore.coffee/product/Thumbnail_Aromatic%20Creamy%20Rose.jpg" class="card-img-top mt-3" alt="..." height="250px">
        <div class="card-body">
            <h3>Iced Aromatic Creamy Rose</h3>
            <p>Rp 29.000</p>
            <p>
                Paduan aromatik dari rose, hibiscus, dan cream rose</p> <br>
            <a href="https://fore.coffee/id/menu-indo/" class="btn" style="background-color: aliceblue">Pesan di App</a>
        </div>
    </div>
</div>


    {{-- <div class="text-center">
        <h2 class="display-5">About Us</h2>
        <p class="lead">This page provides information about our team and our mission.</p>
        <x-button title="Contact Us" link="{{ url('/contact') }}"/>
    </div> --}}
@endsection