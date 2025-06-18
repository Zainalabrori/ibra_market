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

    <!-- Add this to your layout head section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        .nav-underline {
            border-bottom: 3px solid transparent;
            transition: border-color 0.3s;
        }

        .nav-underline:hover {
            border-bottom: 3px solid rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex flex-column">
        <!-- Navigation -->
        @include('layouts.navigation')

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
