<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0 text-primary">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-tags me-2"></i>
                    {{ __('Categories') }}
                </h1>
                <p class="text-muted mb-0">Manage your product categories</p>
            </div>
            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    {{ __('Add New Category') }}
                </a>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Categories Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $categories->total() }}</h4>
                                <small>{{ __('Total Categories') }}</small>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-tags fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $categories->where('is_active', true)->count() }}</h4>
                                <small>{{ __('Active Categories') }}</small>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-check-circle fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $categories->where('is_active', false)->count() }}</h4>
                                <small>{{ __('Inactive Categories') }}</small>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-pause-circle fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0">{{ $categories->sum('products_count') }}</h4>
                                <small>{{ __('Total Products') }}</small>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-box fa-2x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="row">
            @forelse($categories as $category)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 category-card">
                        <!-- Category Header -->
                        <div class="card-header d-flex justify-content-between align-items-center"
                             style="background-color: {{ $category->color }}15; border-color: {{ $category->color }};">
                            <div class="d-flex align-items-center">
                                <i class="{{ $category->icon }} me-2" style="color: {{ $category->color }};"></i>
                                <h5 class="mb-0">{{ $category->name }}</h5>
                            </div>
                            <div>
                                @if($category->is_active)
                                    <span class="badge bg-success">{{ __('Active') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('Inactive') }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Category Body -->
                        <div class="card-body d-flex flex-column">
                            @if($category->description)
                                <p class="text-muted mb-3">
                                    {{ Str::limit($category->description, 120) }}
                                </p>
                            @else
                                <p class="text-muted mb-3 fst-italic">
                                    {{ __('No description available') }}
                                </p>
                            @endif

                            <!-- Category Stats -->
                            <div class="row text-center mb-3">
                                <div class="col-6">
                                    <div class="border-end">
                                        <h6 class="mb-0 text-primary">{{ $category->products_count }}</h6>
                                        <small class="text-muted">{{ __('Products') }}</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0 text-success">{{ $category->slug }}</h6>
                                    <small class="text-muted">{{ __('Slug') }}</small>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-auto">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('categories.show', $category) }}"
                                       class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('categories.edit', $category) }}"
                                       class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-edit me-1"></i>
                                        {{ __('Edit') }}
                                    </a>
                                    <div class="btn-group" role="group">
                                        <button type="button"
                                                class="btn btn-outline-info btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('categories.toggle-status', $category) }}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-{{ $category->is_active ? 'pause' : 'play' }} me-2"></i>
                                                        {{ $category->is_active ? __('Deactivate') : __('Activate') }}
                                                    </button>
                                                </form>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{ route('categories.destroy', $category) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('{{ __('Are you sure? This will delete the category permanently.') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-trash me-2"></i>
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">{{ __('No Categories Found') }}</h4>
                            <p class="text-muted mb-4">{{ __('Start by adding your first category to organize your products.') }}</p>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                {{ __('Add First Category') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($categories->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

    @push('styles')
        <style>
            .category-card {
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
                border-left: 4px solid transparent;
            }

            .category-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
            }

            .btn-group .btn {
                flex: 1;
            }

            .opacity-75 {
                opacity: 0.75;
            }

            .border-end {
                border-right: 1px solid #dee2e6 !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Auto-hide success/error messages after 5 seconds
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);

            // Add dynamic border color based on category color
            document.addEventListener('DOMContentLoaded', function() {
                const categoryCards = document.querySelectorAll('.category-card');
                categoryCards.forEach(function(card) {
                    const header = card.querySelector('.card-header');
                    const style = window.getComputedStyle(header);
                    const borderColor = style.borderColor;
                    card.style.borderLeftColor = borderColor;
                });
            });
        </script>
    @endpush
</x-app-layout>
