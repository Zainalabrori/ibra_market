<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0 text-primary">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-edit me-2"></i>
                    {{ __('Edit Product') }}
                </h1>
                <p class="text-muted mb-0">Update product information</p>
            </div>
            <div class="btn-group" role="group">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    {{ __('Back to Products') }}
                </a>
                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-info">
                    <i class="fas fa-eye me-2"></i>
                    {{ __('View Product') }}
                </a>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="row">
            <!-- Form Section -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-box me-2"></i>
                            {{ __('Product Information') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                           value="{{ old('name', $product->name) }}"
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
                                        <option value="Electronics" {{ old('category', $product->category) == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                        <option value="Clothing" {{ old('category', $product->category) == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                                        <option value="Books" {{ old('category', $product->category) == 'Books' ? 'selected' : '' }}>Books</option>
                                        <option value="Home & Garden" {{ old('category', $product->category) == 'Home & Garden' ? 'selected' : '' }}>Home & Garden</option>
                                        <option value="Sports" {{ old('category', $product->category) == 'Sports' ? 'selected' : '' }}>Sports</option>
                                        <option value="Other" {{ old('category', $product->category) == 'Other' ? 'selected' : '' }}>Other</option>
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
                                          placeholder="Enter product description...">{{ old('description', $product->description) }}</textarea>
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
                                               value="{{ old('price', $product->price) }}"
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
                                           value="{{ old('stock', $product->stock) }}"
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
                                    {{ __('Leave empty to keep current image. Supported formats: JPG, PNG, GIF (Max: 2MB)') }}
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Form Actions -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    {{ __('Update Product') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Current Product Info Sidebar -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            {{ __('Current Product') }}
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{ $product->image_url }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 200px; max-width: 100%;">
                        </div>
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted small mb-2">{{ Str::limit($product->description, 80) }}</p>
                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <span class="badge bg-primary">{{ $product->category }}</span>
                            <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                Stock: {{ $product->stock }}
                            </span>
                        </div>
                        <h5 class="text-success">${{ number_format($product->price, 2) }}</h5>
                        <small class="text-muted">
                            {{ __('Last updated') }}: {{ $product->updated_at->format('M d, Y') }}
                        </small>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-bolt me-2"></i>
                            {{ __('Quick Actions') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye me-2"></i>
                                {{ __('View Details') }}
                            </a>
                            <button type="button" class="btn btn-outline-warning btn-sm" onclick="duplicateProduct()">
                                <i class="fas fa-copy me-2"></i>
                                {{ __('Duplicate') }}
                            </button>
                            <form action="{{ route('products.destroy', $product) }}"
                                  method="POST"
                                  onsubmit="return confirm('{{ __('Are you sure you want to delete this product?') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                    <i class="fas fa-trash me-2"></i>
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
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

            .btn-group .btn {
                white-space: nowrap;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Preview image before upload
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Update the preview image if you want to show live preview
                        console.log('New image selected:', file.name);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Duplicate product functionality
            function duplicateProduct() {
                if (confirm('{{ __("Create a copy of this product?") }}')) {
                    // You can implement duplicate functionality here
                    // For now, redirect to create page with current product data
                    const createUrl = '{{ route("products.create") }}';
                    const params = new URLSearchParams({
                        duplicate: '{{ $product->id }}',
                        name: '{{ $product->name }} (Copy)',
                        category: '{{ $product->category }}',
                        description: '{{ $product->description }}',
                        price: '{{ $product->price }}',
                        stock: 0
                    });
                    window.location.href = createUrl + '?' + params.toString();
                }
            }

            // Auto-save draft functionality (optional)
            let saveTimer;
            const formInputs = document.querySelectorAll('input, textarea, select');

            formInputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearTimeout(saveTimer);
                    saveTimer = setTimeout(function() {
                        // You can implement auto-save draft functionality here
                        console.log('Auto-saving draft...');
                    }, 2000);
                });
            });

            // Form validation
            document.querySelector('form').addEventListener('submit', function(e) {
                const name = document.getElementById('name').value.trim();
                const price = document.getElementById('price').value;
                const stock = document.getElementById('stock').value;

                if (!name || !price || !stock) {
                    e.preventDefault();
                    alert('{{ __("Please fill in all required fields.") }}');
                    return false;
                }

                if (parseFloat(price) < 0) {
                    e.preventDefault();
                    alert('{{ __("Price cannot be negative.") }}');
                    return false;
                }

                if (parseInt(stock) < 0) {
                    e.preventDefault();
                    alert('{{ __("Stock cannot be negative.") }}');
                    return false;
                }
            });
        </script>
    @endpush
</x-app-layout>
