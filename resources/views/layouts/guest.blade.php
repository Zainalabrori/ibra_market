<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExcGlhaTdqaThsMzljcnZpMXZjdGN3ODM1azRid3cwYmJmOTdkcm8ycyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2tNvsKkc0qFdNhJmKk/giphy.gif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-container {
            max-width: 500px;
            margin: 7rem auto;
            padding: 2rem 2.5rem;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: white;
        }

        label,
        .form-check-label,
        .form-check-input,
        .form-control {
            color: white !important;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        a {
            color: #cfe2ff;
        }

        a:hover {
            color: #ffffff;
        }

        .glass-btn {
            background: rgba(255, 255, 255, 0.2);
            /* Semi transparan */
            border: 1px solid rgba(255, 255, 255, 0.4);
            /* Border transparan */
            color: white;
            /* Warna teks */
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            /* Efek blur */
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
            /* Efek bayangan */
            transition: all 0.3s ease-in-out;
        }

        .glass-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            /* Lebih terang saat hover */
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 6px 10px rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            /* Efek mengangkat */
        }

        .glass-btn:active {
            transform: translateY(1px);
            /* Efek ditekan */
        }
    </style>

</head>

<body>
    <div class="container">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
