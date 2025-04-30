<x-guest-layout>
    <div class="form-container">
        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <!-- Buttons -->
            <div class="d-flex flex-column align-items-center gap-3">
                <button type="submit" class="btn glass-btn w-100">Log In</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-white text-decoration-underline">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <p class="text-center mt-3">
                Don't have an account? <a href="{{ route('register') }}">Register here</a>
            </p>
        </form>
    </div>
</x-guest-layout>
