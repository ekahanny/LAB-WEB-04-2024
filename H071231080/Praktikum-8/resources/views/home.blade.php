@extends('layouts.master')

@section('title', 'Home')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <section class="main-content py-5" >
        <div class="container">
            <div class="row align-items-center" style="color: #37502d; font-family: 'Poppins', sans-serif;">
                <div class="col-md-6">
                <h1 class="display-4">Smooth taste<br>Caramel Ribbon</h1>
                <p>Dibuat dari biji kopi Indonesia pilihan untuk pengalaman minum kopi terbaik setiap hari</p>
                </div>
                <div class="col-md-6">
                <img src="image/fore1.png" alt="Caramel Ribbon" class="img-fluid" style="width: 100%">
                </div>
            </div>
            </div>
    </section>

    <div class="description">
        <h1 style="text-shadow:10px 10px 20px aquamarine; text-align:center; padding:40px;">ForeNews</h1>
    </div>

    <!-- Product Section -->    
    <div class="row" style="display: flex; justify-content: center; gap: 40px; font-family: 'Poppins', sans-serif; ">
        <div class="card" style="width: 18rem;background-color: #37502d; color:white;">
            <img src="https://fore.coffee/wp-content/uploads/2024/06/DSCF0753-3-3-1.jpg" class="card-img-top mt-3" alt="..." height="160px">
            <div class="card-body">
                <h5>Fore Coffe Bawa Gebrakan New Coffe Culture Melalui Inovasi, Otentitas, dan Kampanye #FOREVOLUTION</h5>
                <a href="https://fore.coffee/fore-coffee-bawa-gebrakan-new-coffee-culture-melalui-forevolution-2/" class="btn" style="background-color: aliceblue">Lihat ForNews</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;background-color: #37502d; color:white;">
            <img src="https://fore.coffee/wp-content/uploads/2024/09/Fore-HMNS-_-The-Creation-FOREveryHMNS-5.jpg" class="card-img-top mt-3" alt="..." height="160px">
            <div class="card-body">
                <h5>[Press Release] Pertama di Indonesia! Inovasi Minuman Kopi Beraroma Parfum Hadir </h5><br>
                <a href="https://fore.coffee/press-release-pertama-di-indonesia-inovasi-minuman-kopi-beraroma-parfum-hadir-dari-kolaborasi-fore-coffee-hmns/" class="btn" style="background-color: aliceblue">Lihat ForNews</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;background-color: #37502d; color:white;">
            <img src="https://fore.coffee/wp-content/uploads/2023/09/gwalk.png" class="card-img-top mt-3" alt="..." height=160px">
            <div class="card-body">
                <h5>[Press Release] Fore Coffee Pertahankan Ekspansi Bisnis Melalui Konsep Inovatif Rental Revenue Sharing</h5>
                <a href="https://fore.coffee/press-release-fore-coffee-pertahankan-ekspansi-bisnis-melalui-konsep-inovatif-rental-revenue-sharing/" class="btn" style="background-color: aliceblue">Lihat ForNews</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
