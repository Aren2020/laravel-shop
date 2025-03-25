<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0"><a href="{{ route('home') }}" class="h4 mb-0">Shopy</a></h1>
            <nav>
                <a href="{{ route('home') }}" class="text-white mx-2">Home</a>
                <a href="{{ route('product.index') }}" class="text-white mx-2">Products</a>
                <a href="{{ route('category.index') }}" class="text-white mx-2">Categories</a>
                <a href="{{ route('about') }}" class="text-white mx-2">About</a>
                <a href="{{ route('contact') }}" class="text-white mx-2">Contact</a>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="bg-light py-3 mt-4 text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Shopy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
