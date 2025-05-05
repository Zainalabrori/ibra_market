{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Market Place</title>
    <link rel="icon" href="{{ asset('images/market.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            box-shadow: 0 .125rem .25rem rgba(var(--bs-primary-rgb), .075) !important;
        }

        header {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
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
            <div class="container-fluid px-3 px-lg-5">
                <!-- Logo -->
                <a class="navbar-brand me-4" href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/market.png') }}" alt="Logo" height="36">
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Content -->
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <!-- Left-side Nav Items -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <!-- Add more nav items as needed -->
                    </ul>

                    <!-- Right-side User Menu -->
                    @auth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                                    id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Online Avatar with Status Icon -->
                                    <span class="position-relative d-inline-block">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                            alt="Avatar" width="36" height="36" class="rounded-circle shadow-sm">
                                        <!-- Online Status Dot -->
                                        <span
                                        class="position-absolute p-1 bg-success border border-white rounded-circle"
                                        style="bottom: -1px; right: -1px;">
                                            <span class="visually-hidden">Online</span>
                                        </span>
                                    </span>

                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="bi bi-person me-2"></i> {{ __('Profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right me-2"></i> {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto">
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
                <div class="container-fluid px-3 px-lg-5 py-3">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow-1">
            <div class="container-fluid py-4">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-primary-dark py-4 mt-auto">
            <div class="container-fluid px-3 px-lg-5">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Market Place</h5>
                        <p class="mb-0">Your premier online shopping destination</p>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <p class="mb-0">&copy; {{ date('Y') }} Market Place. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5.3 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- Optional JavaScript for Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        // Example: Initialize a simple chart using Chart.js
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('salesChart').getContext('2d');

            const labels = Array.from({
                length: 30
            }, (_, i) => {
                const date = new Date();
                date.setDate(date.getDate() - (29 - i));
                return date.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric'
                });
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Sales ($)',
                    data: Array.from({
                        length: 30
                    }, () => Math.floor(Math.random() * 500 + 100)),
                    fill: true,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    tension: 0.3
                }]
            };

            new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Revenue ($)'
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
