@extends('layouts.master')

@section('title', 'Contact')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<div class="section-contact py-5" style="text-align:center; color:#37502d;">
    <h1>Hubungi Kami</h1>
    <p>Ada pertanyaan atau komentar? Cukup tulis pesan kepada kami!</p>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6" style="background-image: url(https://i.pinimg.com/564x/43/9a/98/439a98a9a2e9818c749a00cb1ef3381d.jpg); color:white; border-radius:20px; height:400px; padding:30px;">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    <p>Jika Anda mempunyai pertanyaan atau kekhawatiran, Anda dapat menghubungi kami dengan mengisi formulir kontak, menelepon kami, datang ke kantor kami, menemukan kami di jejaring sosial lain, atau Anda dapat mengirim email pribadi kepada kami di:</p>
                    <p><i class="fas fa-phone-alt"></i> 0853-1111-1010</p>
                    <p><i class="fas fa-envelope"></i> hello@fore.coffee</p>
                    <p><i class="fas fa-map-marker-alt"></i> Gedung Graha Ganesha, Lantai 1 Suite 120 & 130<br>Jl. Hayam Wuruk No. 28, RT 014/ RW 001,<br>Kecamatan Gambir, Jakarta Pusat, DKI Jakarta</p>
                </div>
            </div>


            <div class="col-md-6">
                <form  style="text-align:left; padding:15px; font-weight:bold;">
                    <div class="form-group mb-4" >
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group mb-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group mb-4">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                    </div>
                    <a href="https://fore.coffee/fore-wujudkan-harapan/" class="btn" style="background-color: #37502d; color:aliceblue; box-shadow:20px; text-align:center;">Submit</a>
                
                </form>
            </div>
        </div>
    </div>


</div>

@endsection
