<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0 text-primary">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-plus me-2"></i>
                    {{ __('Add New Product') }}
                </h1>
                <p class="text-muted mb-0">Create a new product for your inventory</p>
            </div>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    {{ __('Back to Products') }}
                </a>
            </div>
        </div>

        <!-- Product Form -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-box me-2"></i>
                            {{ __('Product Information') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Product Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-semibold">
                                        {{ __('Product Name') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label fw-semibold">
                                        {{ __('Category') }} <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('category') is-invalid @enderror"
                                            id="category"
                                            name="category"
                                            required>
                                        <option value="">{{ __('Select Category') }}</option>
                                        <option value="Electronics" {{ old('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                        <option value="Clothing" {{ old('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                                        <option value="Books" {{ old('category') == 'Books' ? 'selected' : '' }}>Books</option>
                                        <option value="Home & Garden" {{ old('category') == 'Home & Garden' ? 'selected' : '' }}>Home & Garden</option>
                                        <option value="Sports" {{ old('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
                                        <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">
                                    {{ __('Description') }}
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description"
                                          name="description"
                                          rows="4"
                                          placeholder="Enter product description...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Price -->
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label fw-semibold">
                                        {{ __('Price') }} ($) <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number"
                                               class="form-control @error('price') is-invalid @enderror"
                                               id="price"
                                               name="price"
                                               value="{{ old('price') }}"
                                               step="0.01"
                                               min="0"
                                               required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Stock -->
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label fw-semibold">
                                        {{ __('Stock Quantity') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           class="form-control @error('stock') is-invalid @enderror"
                                           id="stock"
                                           name="stock"
                                           value="{{ old('stock', 0) }}"
                                           min="0"
                                           required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Image -->
                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold">
                                    {{ __('Product Image') }}
                                </label>
                                <input type="file"
                                       class="form-control @error('image') is-invalid @enderror"
                                       id="image"
                                       name="image"
                                       accept="image/*">
                                <div class="form-text text-muted">
                                    {{ __('Supported formats: JPG, PNG, GIF (Max: 2MB)') }}
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Form Actions -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    {{ __('Create Product') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .form-label {
                color: #495057;
            }

            .card {
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

            .form-control:focus, .form-select:focus {
                border-color: #0d6efd;
                box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Preview image before upload
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // You can add image preview functionality here
                    console.log('Image selected:', file.name);
                }
            });
        </script>
    @endpush
</x-app-layout>
