{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Market Place</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap 5.3 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Custom CSS to override Bootstrap with blue color scheme -->
        <style>
            :root {
                --bs-primary: #0d6efd;
                --bs-primary-rgb: 13, 110, 253;
                --bs-body-bg: #e9f2ff;
                --bs-light: #f0f7ff;
                --bs-dark: #0a4091;
            }

            body {
                font-family: 'Figtree', sans-serif;
                background-color: var(--bs-body-bg);
            }

            .bg-primary-light {
                background-color: var(--bs-light);
            }

            .bg-primary-dark {
                background-color: var(--bs-dark);
                color: white;
            }

            .shadow-sm {
                box-shadow: 0 .125rem .25rem rgba(var(--bs-primary-rgb), .075)!important;
            }

            header {
                background-color: white;
                box-shadow: 0 2px 4px rgba(0,0,0,.05);
            }

            .navbar {
                background-color: var(--bs-primary);
            }

            .navbar-dark .navbar-nav .nav-link {
                color: rgba(255, 255, 255, 0.9);
            }

            .navbar-dark .navbar-nav .nav-link:hover {
                color: rgba(255, 255, 255, 1);
            }

            /* Additional styling for dropdown items */
            .dropdown-item:active {
                background-color: var(--bs-primary);
            }
        </style>
    </head>
    <body>
        <div class="min-vh-100 d-flex flex-column">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <!-- Logo -->
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/market.png') }}" alt="Logo" height="36">
                    </a>

                    <!-- Mobile Toggle Button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarContent" aria-controls="navbarContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navigation Content -->
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <!-- Main Navigation Links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                   href="{{ route('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            <!-- Add more navigation items as needed -->
                        </ul>

                        <!-- User Menu -->
                        @auth
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                                {{ __('Profile') }}
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    {{ __('Log Out') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm">
                    <div class="container py-3">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow-1">
                <div class="container py-4">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-primary-dark py-4 mt-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Market Place</h5>
                            <p class="mb-0">Your premier online shopping destination</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-0">&copy; {{ date('Y') }} Market Place. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Bootstrap 5.3 JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- Optional custom JavaScript -->
        <script>
            // Add your custom JavaScript here
            document.addEventListener('DOMContentLoaded', function() {
                // Example: Set CSRF token for AJAX requests
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Add to fetch or axios headers for AJAX requests
                // Example:
                /*
                window.axios = require('axios');
                window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
                */
            });
        </script>
    </body>
</html>
