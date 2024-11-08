@extends('layouts.master')

@section('title', 'home')

@section('content')
<!-- Hero Section -->
<section class="text-light text-center py-5" style="background-image: url('{{ asset('images/gallery1.jpg') }}'); background-size: cover; background-position: center; height: 100vh; position: relative;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="container my-5" style="position: relative; z-index: 1;">
        <h1 class="display-4">Transform Your Career with Industry-Focused Courses</h1>
        <p class="lead">Get real-world skills in AI, Data Science, Cloud Computing, and more.</p>
        <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg">Start Learning Now</a>
    </div>
</section>

<!-- Testimoni Section -->
<section class="container my-5">
    <h2 class="text-center">What Our Learners Say</h2><br><br>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p>"TechTutor helped me switch careers into data science with practical skills."</p>
            <p><strong>- Alice, Data Scientist</strong></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p>"The projects were real-world and the mentorship provided kept me on track."</p>
            <p><strong>- John, AI Specialist</strong></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p>"I now have the skills to confidently work as a cloud engineer thanks to TechTutor."</p>
            <p><strong>- Sara, Cloud Engineer</strong></p>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
