<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/sidebar.css') }}" rel="stylesheet" />
    <title>@yield('title', __('nav.title'))</title> 
</head>
<body>
    <!-- Overlay para móvil -->
    <div class="sidebar-overlay"></div>

    <!-- Botón de toggle para móvil -->
    <div class="sidebar-toggle-container d-lg-none">
        <button type="button" class="sidebar-toggle" data-hs-overlay="#medallo-sidebar" aria-haspopup="dialog" aria-expanded="false" aria-controls="medallo-sidebar" aria-label="Toggle navigation">
            <i class="bi bi-list me-2"></i>{{ __('app.menu') }}
        </button>
    </div>

    <!-- Sidebar -->
    <div id="medallo-sidebar" class="sidebar -translate-x-full d-lg-block" role="dialog" tabindex="-1" aria-label="Sidebar">
        <div class="sidebar-container">
            <!-- Header -->
            <header class="sidebar-header">
                <a class="sidebar-brand" href="/" aria-label="Brand">{{ __('app.title') }} 🚲</a>
                <div class="d-lg-none">
                    <!-- Botón de cierre para móvil -->
                    <button type="button" class="sidebar-close-btn" data-hs-overlay="#medallo-sidebar">
                        <i class="bi bi-x"></i>
                        <span class="visually-hidden">{{__('app.close')}}</span>
                    </button>
                </div>
            </header>
            <!-- Fin Header -->

            <!-- Body -->
            <nav class="sidebar-nav">
                <div class="accordion-group" data-hs-accordion-always-open>
                    <ul class="sidebar-nav-list">
                        <li>
                            <a class="sidebar-nav-link active-item" href="/">
                                <i class="bi bi-house-door nav-icon"></i>
                                {{ __('app.home') }}
                            </a>
                        </li>

                        <!-- Productos -->
                        <li class="hs-accordion" id="productos-accordion">
                            <button type="button" class="hs-accordion-toggle" aria-expanded="false" aria-controls="productos-accordion-collapse-1">
                                <i class="bi bi-bicycle nav-icon"></i>
                                {{ __('app.products') }}
                                <svg class="accordion-arrow accordion-up" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                                <svg class="accordion-arrow accordion-down" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>

                            <div id="productos-accordion-collapse-1" class="hs-accordion-content hidden" role="region" aria-labelledby="productos-accordion">
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a class="submenu-link" href="{{ route('product.list') }}">{{ __('app.view_product') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Cart -->
                        <li class="hs-accordion" id="cart-accordion">
                            <button type="button" class="hs-accordion-toggle" aria-expanded="false" aria-controls="cart-accordion-collapse-1">
                                <i class="bi bi-cart nav-icon"></i>
                                {{ __('app.cart') }}
                                <svg class="accordion-arrow accordion-up" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                                <svg class="accordion-arrow accordion-down" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>

                            <div id="cart-accordion-collapse-1" class="hs-accordion-content hidden" role="region" aria-labelledby="cart-accordion">
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a class="submenu-link" href="{{ route('cart.index') }}">{{ __('app.view_cart') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Fin Body -->

            <!-- Footer -->
            <footer class="sidebar-footer">
                <!-- Perfil o Inicio de sesión -->
                <div class="footer-dropdown">
                    @auth
                    <button id="footer-dropdown-toggle" type="button" class="footer-dropdown-toggle" aria-haspopup="true" aria-expanded="false" aria-label="Dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=1abc9c&color=fff" alt="Avatar">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </button>
                    
                    <!-- Menú desplegable del perfil -->
                    <div id="footer-dropdown-menu" class="footer-dropdown-menu transition-opacity opacity-0 hidden">
                        <ul class="dropdown-menu-list">
                            <li>
                                <form id="logout" action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    <a role="button" class="dropdown-item text-danger" onclick="document.getElementById('logout').submit();">
                                        <i class="bi bi-box-arrow-right nav-icon"></i> {{ __('app.logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <button id="footer-dropdown-toggle" type="button" class="footer-dropdown-toggle" aria-haspopup="true" aria-expanded="false" aria-label="Dropdown">
                        <img src="https://ui-avatars.com/api/?name=Usuario&background=1abc9c&color=fff" alt="Avatar">
                        <span>Iniciar sesión</span>
                        <svg class="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                    </button>
                    
                    <!-- Menú desplegable para iniciar sesión/registrarse -->
                    <div id="footer-dropdown-menu" class="footer-dropdown-menu transition-opacity opacity-0 hidden">
                        <ul class="dropdown-menu-list">
                            <li>
                                <a href="{{ route('login') }}" class="dropdown-item">
                                    <i class="bi bi-box-arrow-in-right nav-icon"></i> {{ __('app.login') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="dropdown-item">
                                    <i class="bi bi-person-plus nav-icon"></i> {{ __('app.register') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </footer>
            <!-- Fin Footer -->
        </div>
    </div>
    <!-- Fin Sidebar -->

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="container my-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/sidebar.js') }}"></script>
</body>
</html>