<x-guest-layout>
    <div class="form-container">
        <form method="POST" action="{{ route('password.store') }}" autocomplete="off">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $request->email) }}" required autofocus
                       autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label text-white">New Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label text-white">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="d-flex flex-column align-items-center gap-3">
                <button type="submit" class="btn glass-btn w-100">
                    {{ __('Reset Password') }}
                </button>
            </div>

            <p class="text-center mt-3 text-white">
                <a href="{{ route('login') }}" class="text-decoration-underline">Back to Login</a>
            </p>
        </form>
    </div>
</x-guest-layout>
