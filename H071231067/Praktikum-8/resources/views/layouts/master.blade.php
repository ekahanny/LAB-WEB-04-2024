<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TechTutor - Advance Your Career</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body data-bs-theme="dark">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <p>TechTutor</p>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <main class="py-5">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer bg-black text-light py-4">
    <div class="container text-center">
      <p>© 2024 TechTutor. All Rights Reserved.</p>
      <p>
        <a href="#" class="text-white mx-2">Privacy Policy</a>
        <a href="#" class="text-white mx-2">Terms of Service</a>
      </p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
