<!-- resources/views/contact.blade.php -->
@extends('layouts.master')

@section('title', 'contact')

@section('content')

    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="display-4 text-secondary">Contact Us</h2>
            <p class="lead text-muted">If you have any questions or want to join TechTutor, feel free to reach out to us.</p>
        </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" class="p-4 rounded">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="text-light">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="form-group mb-3">
            <label for="email" class="text-light">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group mb-3">
            <label for="topic" class="text-light">Topic of Interest</label>
            <input type="text" class="form-control" id="topic" name="topic" placeholder="E.g., Web Development, Data Science, etc." required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
    </form>

    </div>
@endsection
