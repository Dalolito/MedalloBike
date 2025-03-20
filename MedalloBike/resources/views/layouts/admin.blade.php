<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

        <!-- Custom CSS -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />

        <!-- Page Title -->
        <title>@yield('title', __('admin.title'))</title> 
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="/">{{ __('app.title') }} 🚲</a> 

                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <!-- Button to View Products -->
                        <a class="nav-link active" href="{{ route('admin.product.list') }}">
                            {{ __('admin.view_products') }}
                        </a>

                        <!-- Button to Create Product -->
                        <a class="nav-link active" href="{{ route('admin.product.create') }}">
                            {{ __('admin.create_product') }}
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container my-4">
            @yield('content')
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
    </body>
</html>