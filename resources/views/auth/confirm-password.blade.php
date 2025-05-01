<x-guest-layout>
    <div class="form-container">
        <div class="mb-4 text-white">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" autocomplete="off">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" name="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="d-flex flex-column align-items-center gap-3">
                <button type="submit" class="btn glass-btn w-100">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
