<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Website</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#ffffff;">
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid" style="font-family: 'Poppins', sans-serif; color: #37502d;">
            <a class="navbar-brand" href="#">
                <img src="image/logo.png" alt="Logo" width="50px" height="50px" class="d-inline-block">
                Fore
            </a>


                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
                        <span class="navbar-toggler-icon""></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav" style="display: flex; gap: 50px; color:#37502d; font-weight:bold;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>

            
                
        

            </div>
        </nav>

<main class="container my-5">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center py-3 " >
    <p>&copy; {{ date('Y') }}  FORE COFFE, All Rights Reserved</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>