<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0 text-primary">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-box me-2"></i>
                    {{ __('Products') }}
                </h1>
                <p class="text-muted mb-0">Manage your product inventory</p>
            </div>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    {{ __('Add New Product') }}
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Products Grid -->
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Product Image -->
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded"
                                style="max-height: 180px; max-width: 100%;">
                        </div>

                        <!-- Product Info -->
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">{{ $product->name }}</h5>
                                <span class="badge bg-primary">{{ $product->category }}</span>
                            </div>

                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit($product->description, 100) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="h5 text-success mb-0">${{ number_format($product->price, 2) }}</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted">Stock: </small>
                                    <span
                                        class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                        {{ $product->stock }}
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('products.show', $product) }}"
                                    class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>
                                    {{ __('View') }}
                                </a>
                                <a href="{{ route('products.edit', $product) }}"
                                    class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-edit me-1"></i>
                                    {{ __('Edit') }}
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i>
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">{{ __('No Products Found') }}</h4>
                            <p class="text-muted mb-4">{{ __('Start by adding your first product to the inventory.') }}
                            </p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                {{ __('Add First Product') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>

    @push('styles')
        <style>
            .card {
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
            }

            .btn-group .btn {
                flex: 1;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Auto-hide success messages after 5 seconds
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert-success');
                alerts.forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        </script>
    @endpush
</x-app-layout>
