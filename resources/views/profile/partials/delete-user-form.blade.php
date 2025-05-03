<section>
    <header class="mb-3">
        <h2 class="h5 text-dark">Delete Account</h2>
        <p>
            {{ __("Once your account is deleted, all of its resources and data will be permanently deleted.") }}
            {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>
    </header>

    <!-- Trigger Button -->
    {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Delete Account
    </button> --}}
    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Delete Account
    </button>


    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Are you sure you want to delete your account?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="text-muted small">
                        Once your account is deleted, all of its resources and data will be permanently deleted.
                        Please enter your password to confirm.
                    </p>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                            placeholder="Enter your password"
                        >
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </div>
            </form>
        </div>
    </div>
</section>
