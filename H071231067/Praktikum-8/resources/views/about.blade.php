@extends('layouts.master')

@section('content')
<div class="container-fluid" id="about">
  <div class="container my-5">
    <div class="row">
      <div class="col-md-5">
        <h2>About TechTutor</h2>
        <p>At TechTutor, we offer a range of cutting-edge courses to help you advance your career in technology. Our hands-on, project-based approach ensures you gain real-world skills that are in demand.</p>
      </div>
      <div class="col-md-7">
        <video src="{{ asset('videos/video1.mp4') }}" class="object-fit-contain" autoplay loop></video>
      </div>
    </div>
  </div>
</div>

<!-- Courses -->
<div id="courses" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
  <div class="container text-center">
    <h2>Courses</h2><br>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="d-flex justify-content-center">
        <!-- Card 1 -->
          <div class="card" style="width: 288px;">
            <img src="{{ asset('images/web_dev.jpg') }}" class="card-img-top" alt="Course 1" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Full Stack Web Developer</h5>
              <p class="card-text">3 Months, Intermediate</p>
              <p>Rating: ⭐⭐⭐⭐ (450)</p>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="card mx-3" style="width: 288px;">
            <img src="{{ asset('images/react.jpg') }}" class="card-img-top" alt="Course 2" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">React</h5>
              <p class="card-text">2 Months, Beginner</p>
              <p>Rating: ⭐⭐⭐⭐⭐ (525)</p>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="card" style="width: 288px;">
            <img src="{{ asset('images/data_an.jpg') }}" class="card-img-top" alt="Course 3" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Data Analyst</h5>
              <p class="card-text">3 Months, Intermediate</p>
              <p>Rating: ⭐⭐⭐⭐ (76)</p>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex justify-content-center">
          <!-- Card 4 -->
          <div class="card" style="width: 288px;">
            <img src="{{ asset('images/programming.jpeg') }}" class="card-img-top" alt="Course 4" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Deep learning</h5>
              <p class="card-text">5 Months, Beginner</p>
              <p>Rating: ⭐⭐⭐⭐⭐ (1313)</p>
            </div>
          </div>
          <!-- Card 5 -->
          <div class="card mx-3" style="width: 288px;">
            <img src="{{ asset('images/digital_marketing.jpg') }}" class="card-img-top" alt="Course 5" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Digital Marketing</h5>
              <p class="card-text">3 Months, Beginner</p>
              <p>Rating: ⭐⭐⭐⭐⭐ (957)</p>
            </div>
          </div>
          <!-- Card 6 -->
          <div class="card" style="width: 288px;">
            <img src="{{ asset('images/Cpp.jpeg') }}" class="card-img-top" alt="Course 6" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">C++</h5>
              <p class="card-text">3 Months, Intermediate</p>
              <p>Rating: ⭐⭐⭐⭐ (673)</p>
            </div>
          </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#courses" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#courses" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </button>
</div>
@endsection
