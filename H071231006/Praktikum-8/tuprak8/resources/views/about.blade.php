@extends('layouts.master')

@section('content')
    <h2>About Us</h2>
    <p>This website helps you to find the best property.</p>

    <div class="property-list">
        <div class="property-item">
            <img src="{{ asset('images/property1.jpg') }}" alt="Property 1" class="img-fluid">
            <h3>Mediterranean Modern</h3>
            <p>Price: $500,000</p>
        </div>
        <div class="property-item">
            <img src="{{ asset('images/property2.jpg') }}" alt="Property 2" class="img-fluid">
            <h3>American Modern</h3>
            <p>Price: $250,000</p>
        </div>
        <div class="property-item">
            <img src="{{ asset('images/property3.jpg') }}" alt="Property 3" class="img-fluid">
            <h3>Japan Modern</h3>
            <p>Price: $300,000</p>
        </div>
    </div>
@endsection
