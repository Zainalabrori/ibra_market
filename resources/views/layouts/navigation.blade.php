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
                        <a class="nav-link d-flex align-items-center gap-2" href="#" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
