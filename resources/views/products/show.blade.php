<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0 text-primary">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-eye me-2"></i>
                    {{ $product->name }}
                </h1>
                <p class="text-muted mb-0">View product details and information</p>
            </div>
            <div class="btn-group" role="group">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    {{ __('Back to Products') }}
                </a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>
                    {{ __('Edit Product') }}
                </a>
            </div>
        </div>

        <!-- Product Details -->
        <div class="row">
            <!-- Product Image and Basic Info -->
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-image me-2"></i>
                            {{ __('Product Image') }}
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="product-image-container mb-3">
                            <img src="{{ $product->image_url }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 400px; max-width: 100%;">
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <span class="badge bg-primary fs-6 px-3 py-2">{{ $product->category }}</span>
                            <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }} fs-6 px-3 py-2">
                                Stock: {{ $product->stock }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            {{ __('Product Information') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <strong class="text-muted">{{ __('Product Name') }}:</strong>
                            </div>
                            <div class="col-sm-8">
                                <h5 class="mb-0">{{ $product->name }}</h5>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <strong class="text-muted">{{ __('Price') }}:</strong>
                            </div>
                            <div class="col-sm-8">
                                <h4 class="text-success mb-0">${{ number_format($product->price, 2) }}</h4>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <strong class="text-muted">{{ __('Category') }}:</strong>
                            </div>
                            <div class="col-sm-8">
                                <span class="badge bg-secondary fs-6 px-3 py-2">{{ $product->category }}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <strong class="text-muted">{{ __('Stock Status') }}:</strong>
                            </div>
                            <div class="col-sm-8">
                                @if($product->stock > 10)
                                    <span class="badge bg-success fs-6 px-3 py-2">
                                        <i class="fas fa-check-circle me-1"></i>
                                        {{ __('In Stock') }} ({{ $product->stock }} {{ __('units') }})
                                    </span>
                                @elseif($product->stock > 0)
                                    <span class="badge bg-warning fs-6 px-3 py-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ __('Low Stock') }} ({{ $product->stock }} {{ __('units') }})
                                    </span>
                                @else
                                    <span class="badge bg-danger fs-6 px-3 py-2">
                                        <i class="fas fa-times-circle me-1"></i>
                                        {{ __('Out of Stock') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($product->description)
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <strong class="text-muted">{{ __('Description') }}:</strong>
                                </div>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $product->description }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <strong class="text-muted">{{ __('Created') }}:</strong>
                            </div>
                            <div class="col-sm-8">
                                <small class="text-muted">{{ $product->created_at->format('M d, Y \a\t h:i A') }}</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="text-muted">{{ __('Last Updated') }}:</strong>
                            </div>
                            <div class="col-sm-8">
                                <small class="text-muted">{{ $product->updated_at->format('M d, Y \a\t h:i A') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-cogs me-2"></i>
                            {{ __('Actions') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>
                                {{ __('Edit Product') }}
                            </a>

                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="fas fa-share me-2"></i>
                                {{ __('Share') }}
                            </button>

                            <form action="{{ route('products.destroy', $product) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('{{ __('Are you sure you want to delete this product?') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
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

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-share me-2"></i>
                        {{ __('Share Product') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">{{ __('Share this product with others:') }}</p>
                    <div class="input-group">
                        <input type="text"
                               class="form-control"
                               id="productUrl"
                               value="{{ request()->url() }}"
                               readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .product-image-container {
                background: #f8f9fa;
                border-radius: 8px;
                padding: 20px;
            }

            .card {
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

            .row.mb-4:last-child {
                margin-bottom: 0 !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            function copyToClipboard() {
                const urlInput = document.getElementById('productUrl');
                urlInput.select();
                urlInput.setSelectionRange(0, 99999);

                try {
                    document.execCommand('copy');

                    // Show success message
                    const btn = event.target.closest('button');
                    const originalContent = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-check"></i>';
                    btn.classList.remove('btn-outline-secondary');
                    btn.classList.add('btn-success');

                    setTimeout(() => {
                        btn.innerHTML = originalContent;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-outline-secondary');
                    }, 2000);
                } catch (err) {
                    console.error('Failed to copy: ', err);
                }
            }
        </script>
    @endpush
</x-app-layout>
