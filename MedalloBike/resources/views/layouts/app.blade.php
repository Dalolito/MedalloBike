<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
        <title>@yield('title', __('nav.title'))</title> 
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
            <div class="container">
                <a class="navbar-brand" href="/">{{ __('app.title') }} 🚲</a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" href="/">{{ __('app.home') }}</a> 
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div> 
                        @guest 
                        <a class="nav-link active" href="{{ route('login') }}">{{ __('app.login') }}</a> 
                        <a class="nav-link active" href="{{ route('register') }}">{{ __('app.register') }}</a> 
                        @else 
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active" 
                            onclick="document.getElementById('logout').submit();">{{ __('app.logout') }}</a> 
                            @csrf 
                        </form> 
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <div class="container my-4">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
    </body>
</html>
