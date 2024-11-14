<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cookie Management')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-cookie { background-color: #f8e6c1; } 
        .navbar-cookie { background-color: #d69f5b; }
        .footer-text { color: #6c757d; }
        .navbar-alert {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .nav-item-spacing .nav-link {
            margin-right: 15px; 
        }
    </style>
</head>
<body class="bg-cookie text-dark d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-cookie fixed-top" >
        <div class="container position-relative">
            <a class="navbar-brand" href="#" style="font-family: 'Poppins', sans-serif;">Toko Cookies dilsky</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" >
                <ul class="navbar-nav ms-auto nav-item-spacing">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" style="color:#f8e6c1; font-family: 'Poppins', sans-serif;">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}" style="color:#f8e6c1; font-family: 'Poppins', sans-serif;">Cookie Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}" style="color:#f8e6c1; font-family: 'Poppins', sans-serif;">Flavors & Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventory-logs.index') }}" style="color:#f8e6c1; font-family: 'Poppins', sans-serif;">Baking Logs</a>
                    </li>
                </ul>
            </div>
            

            @if(session('success'))
                <div class="alert alert-success navbar-alert text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger navbar-alert text-center" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="navbar-cookie text-center py-3 mt-auto">
        <p class="mb-0 footer-text" style="color: black ; font-family: 'Poppins', sans-serif;">© 2024 Web Toko Cookies dilsky</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
