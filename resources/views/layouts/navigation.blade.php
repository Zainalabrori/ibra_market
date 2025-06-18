<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid px-3 px-lg-5">

        @php
            $dashboard = auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard');
        @endphp


        <a class="navbar-brand me-4" href="{{ $dashboard }}">
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
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                {{-- Dashboard --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('dashboard') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>

                {{-- Products --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('products') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="{{ route('products.index') }}">
                        <i class="fas fa-box me-2"></i>
                        {{ __('Products') }}
                    </a>
                </li>

                {{-- Categories --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('categories.*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="#">
                        <i class="fas fa-tags me-2"></i>
                        {{ __('Categories') }}
                    </a>
                </li>

                {{-- Orders --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('orders.*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="#">
                        <i class="fas fa-shopping-cart me-2"></i>
                        {{ __('Orders') }}
                    </a>
                </li>

                {{-- Customers --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('customers.*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="#">
                        <i class="fas fa-users me-2"></i>
                        {{ __('Customers') }}
                    </a>
                </li>

                {{-- Payments --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('payments.*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="#">
                        <i class="fas fa-credit-card me-2"></i>
                        {{ __('Payments') }}
                    </a>
                </li>

                {{-- Reports --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('reports.*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="#">
                        <i class="fas fa-chart-bar me-2"></i>
                        {{ __('Reports') }}
                    </a>
                </li>

                {{-- Settings --}}
                <li class="nav-item mx-2">
                    <a class="nav-link nav-underline px-3 py-2 {{ request()->routeIs('settings.*') ? 'active fw-bold text-primary bg-primary bg-opacity-10' : '' }}"
                        href="#">
                        <i class="fas fa-cog me-2"></i>
                        {{ __('Settings') }}
                    </a>
                </li>
            </ul>

            <!-- Right-side User Menu -->
            @auth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link d-flex align-items-center gap-2 px-3 py-2 rounded" href="#"
                            id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Online Avatar with Status Icon -->
                            <span class="position-relative d-inline-block">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                                    alt="Avatar" width="36" height="36" class="rounded-circle shadow-sm">
                                <!-- Online Status Dot -->
                                <span class="position-absolute p-1 bg-success border border-white rounded-circle"
                                    style="bottom: -1px; right: -1px;">
                                    <span class="visually-hidden">Online</span>
                                </span>
                            </span>

                            <div class="d-flex flex-column">
                                <span class="fw-medium text-truncate" style="max-width: 150px;">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="badge bg-light text-primary rounded-pill">
                                    {{ Auth::user()->role }}
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-2" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item py-2" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person me-2"></i> {{ __('Profile') }}
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2">
                                        <i class="bi bi-box-arrow-right me-2"></i> {{ __('Log Out') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link px-3 py-2 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link px-3 py-2 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
