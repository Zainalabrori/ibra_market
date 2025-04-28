<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ibra Market</title>
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/market.png') }}" type="image/x-icon">
    <!-- Custom CSS -->
    <style>
        .hero-gradient {
            background: linear-gradient(to right, #4f46e5, #2563eb);
        }

        .card-hover:hover {
            transform: translateY(-5px);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Navigation - Glassmorphism style -->
    <nav class="fixed w-full z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="#" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-800">MarketPlace</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/login"
                        class="text-gray-800 hover:text-indigo-600 font-medium transition duration-300">Login</a>
                    <a href="/register"
                        class="bg-indigo-600 text-white px-5 py-2.5 rounded-full font-medium hover:bg-indigo-700 transition duration-300 shadow-lg hover:shadow-indigo-200">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Gradient -->
    <div class="hero-gradient pt-20">
        <div class="max-w-7xl mx-auto px-6 py-20 md:py-32">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white space-y-6">
                    <span class="px-4 py-1 rounded-full bg-white bg-opacity-20 text-sm font-medium">New
                        Experience</span>
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight">Discover Amazing Products in One Place</h1>
                    <p class="text-lg md:text-xl opacity-90">Join our marketplace and connect with sellers from around
                        the world offering unique and quality products.</p>
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                        <a href="/register"
                            class="bg-white text-indigo-600 px-8 py-3 rounded-full font-medium hover:bg-gray-100 transition duration-300 shadow-lg text-center">Get
                            Started</a>
                        <a href="/about"
                            class="border border-white text-white px-8 py-3 rounded-full font-medium hover:bg-white hover:text-indigo-600 transition duration-300 text-center">Learn
                            More</a>
                    </div>
                </div>
                <div class="hidden md:block group overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/toko.png') }}" alt="Shopping Illustration" class="w-full h-auto">
                </div>
            </div>
        </div>
        <!-- Wave divider -->
        <div class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200">
                <path fill="#F9FAFB" fill-opacity="1"
                    d="M0,128L60,117.3C120,107,240,85,360,90.7C480,96,600,128,720,133.3C840,139,960,117,1080,106.7C1200,96,1320,96,1380,96L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Why Choose Our Market?</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">We've designed our marketplace with your needs in mind,
                offering a superior shopping experience.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-10">
            <div
                class="bg-white rounded-xl shadow-lg p-8 transition duration-300 card-hover border-t-4 border-indigo-600">
                <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Wide Selection</h3>
                <p class="text-gray-600">Browse thousands of products across various categories to find exactly what you
                    need.</p>
            </div>
            <div
                class="bg-white rounded-xl shadow-lg p-8 transition duration-300 card-hover border-t-4 border-indigo-600">
                <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Secure Shopping</h3>
                <p class="text-gray-600">Shop with confidence knowing that your information is protected with our secure
                    platform.</p>
            </div>
            <div
                class="bg-white rounded-xl shadow-lg p-8 transition duration-300 card-hover border-t-4 border-indigo-600">
                <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Quality Assurance</h3>
                <p class="text-gray-600">All our sellers are vetted to ensure you receive only high-quality products.
                </p>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-50 py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">What Our Customers Say</h2>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Don't just take our word for it. See what our happy
                    customers have to say.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg relative">
                    <div class="absolute -top-5 left-8">
                        <div class="bg-indigo-600 text-white h-10 w-10 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4 pt-4">
                        <div class="flex text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"I've been shopping here for months now and I'm always impressed by
                        the quality of products and service. Highly recommended!"</p>
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 rounded-full h-10 w-10 flex items-center justify-center">
                            <span class="font-bold text-indigo-600">JD</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Jane Doe</p>
                            <p class="text-sm text-gray-500">Loyal Customer</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg relative">
                    <div class="absolute -top-5 left-8">
                        <div class="bg-indigo-600 text-white h-10 w-10 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4 pt-4">
                        <div class="flex text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"The variety of products available is incredible. I found exactly
                        what I was looking for and the shipping was super fast!"</p>
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 rounded-full h-10 w-10 flex items-center justify-center">
                            <span class="font-bold text-indigo-600">JS</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">John Smith</p>
                            <p class="text-sm text-gray-500">Happy Shopper</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg relative">
                    <div class="absolute -top-5 left-8">
                        <div class="bg-indigo-600 text-white h-10 w-10 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mb-4 pt-4">
                        <div class="flex text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Customer service is exceptional. I had a small issue with my order
                        and they resolved it immediately. Will definitely shop here again!"</p>
                    <div class="flex items-center space-x-3">
                        <div class="bg-indigo-100 rounded-full h-10 w-10 flex items-center justify-center">
                            <span class="font-bold text-indigo-600">AR</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Amy Rodriguez</p>
                            <p class="text-sm text-gray-500">Frequent Buyer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="max-w-7xl mx-auto px-6 py-16 md:py-24">
        <div class="grid md:grid-cols-4 gap-8 text-center">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <span class="text-4xl font-bold text-indigo-600">1M+</span>
                <p class="text-gray-600 mt-2">Active Users</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <span class="text-4xl font-bold text-indigo-600">50K+</span>
                <p class="text-gray-600 mt-2">Products</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <span class="text-4xl font-bold text-indigo-600">100+</span>
                <p class="text-gray-600 mt-2">Countries</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <span class="text-4xl font-bold text-indigo-600">4.9</span>
                <p class="text-gray-600 mt-2">Average Rating</p>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-600 overflow-hidden relative">
        <!-- Decorative elements -->
        <div
            class="absolute top-0 left-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full translate-x-1/3 translate-y-1/3">
        </div>

        <div class="max-w-7xl mx-auto px-6 py-20 md:py-24 relative z-10">
            <div class="md:flex items-center justify-between">
                <div class="mb-10 md:mb-0 md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">Ready to Start Shopping?</h2>
                    <p class="text-xl text-indigo-100 mt-4 md:pr-10">Join thousands of satisfied customers who have
                        found their perfect items on our platform.</p>
                </div>
                <div class="md:w-1/2 text-center md:text-right">
                    <a href="/register"
                        class="inline-block bg-white text-indigo-600 hover:bg-gray-100 font-medium px-10 py-4 rounded-full shadow-lg transition duration-300 transform hover:-translate-y-1">Create
                        an Account</a>
                    <p class="text-indigo-100 mt-4">Already have an account? <a href="/login"
                            class="text-white underline">Log in</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-4 gap-10">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="ml-2 text-xl font-bold text-white">MarketPlace</span>
                    </div>
                    <p class="text-gray-400">Your one-stop destination for all your shopping needs. Quality products,
                        trusted sellers, and excellent service.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.48 0H5.52C2.472 0 0 2.472 0 5.52v12.96C0 21.528 2.472 24 5.52 24h12.96c3.048 0 5.52-2.472 5.52-5.52V5.52C24 2.472 21.528 0 18.48 0zM7.2 19.2H4.8V9.6h2.4v9.6zM6 8.208c-.792 0-1.44-.648-1.44-1.44 0-.792.648-1.44 1.44-1.44.792 0 1.44.648 1.44 1.44 0 .792-.648 1.44-1.44 1.44zM19.2 19.2h-2.4v-4.656c0-.888 0-2.04-1.248-2.04-1.248 0-1.44.984-1.44 1.992v4.704h-2.4V9.6h2.304v1.056h.048c.336-.624 1.128-1.272 2.304-1.272 2.448 0 2.904 1.608 2.904 3.696V19.2z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="/about" class="text-gray-400 hover:text-white transition duration-300">About
                                Us</a></li>
                        <li><a href="/products"
                                class="text-gray-400 hover:text-white transition duration-300">Products</a></li>
                        <li><a href="/sellers"
                                class="text-gray-400 hover:text-white transition duration-300">Sellers</a></li>
                        <li><a href="/contact"
                                class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg">Support</h4>
                    <ul class="space-y-3">
                        <li><a href="/faq" class="text-gray-400 hover:text-white transition duration-300">FAQ</a>
                        </li>
                        <li><a href="/shipping"
                                class="text-gray-400 hover:text-white transition duration-300">Shipping Policy</a></li>
                        <li><a href="/returns"
                                class="text-gray-400 hover:text-white transition duration-300">Returns</a></li>
                        <li><a href="/terms" class="text-gray-400 hover:text-white transition duration-300">Terms of
                                Service</a></li>
                        <li><a href="/privacy" class="text-gray-400 hover:text-white transition duration-300">Privacy
                                Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                    <form class="flex flex-col sm:flex-row gap-2">
                        <input type="email" placeholder="Your email"
                            class="px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-800 text-white">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 MarketPlace. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
