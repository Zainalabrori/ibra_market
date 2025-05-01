{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <div class="form-container">
        <p class="text-white mb-4 text-center">
            {{ __('Forgot your password? No problem. Just enter your email and we’ll send you a reset link.') }}
        </p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email Address</label>
                <input type="email" name="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus
                       autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="d-flex flex-column align-items-center gap-3">
                <button type="submit" class="btn glass-btn w-100">
                    {{ __('Send Reset Link') }}
                </button>
            </div>

            <p class="text-center mt-3 text-white">
                <a href="{{ route('login') }}" class="text-decoration-underline">Back to Login</a>
            </p>
        </form>
    </div>
</x-guest-layout>
