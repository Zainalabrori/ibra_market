<section class="form-container">
    <header class="mb-4">
        <h2 class="h4 fw-semibold">{{ __('Profile Information') }}</h2>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Email verification resend form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Update profile form -->
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name) }}"
                   required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email"
                   id="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $user->email) }}"
                   required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-white-50 small">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="btn btn-link p-0 text-decoration-underline text-white-50">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <div class="mt-2 text-success small">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="mb-0 text-success small">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
