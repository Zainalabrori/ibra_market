<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0 text-primary">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-plus me-2"></i>
                    {{ __('Add New Category') }}
                </h1>
                <p class="text-muted mb-0">Create a new category to organize your products</p>
            </div>
            <div>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    {{ __('Back to Categories') }}
                </a>
            </div>
        </div>

        <!-- Category Form -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-tag me-2"></i>
                            {{ __('Category Information') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <!-- Category Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-semibold">
                                        {{ __('Category Name') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           required
                                           oninput="generateSlug()">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category Icon -->
                                <div class="col-md-6 mb-3">
                                    <label for="icon" class="form-label fw-semibold">
                                        {{ __('Icon Class') }}
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i id="icon-preview" class="fas fa-tag"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control @error('icon') is-invalid @enderror"
                                               id="icon"
                                               name="icon"
                                               value="{{ old('icon', 'fas fa-tag') }}"
                                               placeholder="fas fa-tag"
                                               oninput="updateIconPreview()">
                                    </div>
                                    <div class="form-text text-muted">
                                        {{ __('Use FontAwesome classes (e.g., fas fa-laptop, fas fa-tshirt)') }}
                                    </div>
                                    @error('icon')
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
                                          placeholder="Enter category description...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Category Color -->
                                <div class="col-md-6 mb-3">
                                    <label for="color" class="form-label fw-semibold">
                                        {{ __('Category Color') }}
                                    </label>
                                    <div class="input-group">
                                        <input type="color"
                                               class="form-control form-control-color @error('color') is-invalid @enderror"
                                               id="color"
                                               name="color"
                                               value="{{ old('color', '#6c757d') }}"
                                               style="width: 60px;">
                                        <input type="text"
                                               class="form-control"
                                               id="color-text"
                                               value="{{ old('color', '#6c757d') }}"
                                               readonly>
                                    </div>
                                    @error('color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">{{ __('Status') }}</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="is_active"
                                               name="is_active"
                                               value="1"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            {{ __('Active Category') }}
                                        </label>
                                    </div>
                                    <div class="form-text text-muted">
                                        {{ __('Inactive categories will not be visible in product forms') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Preview Section -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('Preview') }}</label>
                                <div class="card border" id="category-preview">
                                    <div class="card-header d-flex align-items-center"
                                         style="background-color: #6c757d15; border-color: #6c757d;">
                                        <i class="fas fa-tag me-2" style="color: #6c757d;"></i>
                                        <span id="preview-name">{{ __('Category Name') }}</span>
                                        <span class="badge bg-success ms-auto">{{ __('Active') }}</span>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted mb-0" id="preview-description">
                                            {{ __('Category description will appear here...') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    {{ __('Create Category') }}
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

            .form-control-color {
                max-width: 60px;
                padding: 0.375rem 0.75rem;
            }

            #category-preview {
                transition: all 0.3s ease;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Generate slug from name
            function generateSlug() {
                const name = document.getElementById('name').value;
                const slug = name.toLowerCase()
                    .replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim();

                updatePreview();
            }

            // Update icon preview
            function updateIconPreview() {
                const iconInput = document.getElementById('icon');
                const iconPreview = document.getElementById('icon-preview');
                const previewIcon = document.querySelector('#category-preview .card-header i');

                iconPreview.className = iconInput.value || 'fas fa-tag';
                previewIcon.className = (iconInput.value || 'fas fa-tag') + ' me-2';

                updatePreview();
            }

            // Update color inputs
            document.getElementById('color').addEventListener('input', function() {
                document.getElementById('color-text').value = this.value;
                updatePreview();
            });

            // Update preview
            function updatePreview() {
                const name = document.getElementById('name').value || '{{ __("Category Name") }}';
                const description = document.getElementById('description').value || '{{ __("Category description will appear here...") }}';
                const color = document.getElementById('color').value;
                const icon = document.getElementById('icon').value || 'fas fa-tag';
                const isActive = document.getElementById('is_active').checked;

                // Update preview content
                document.getElementById('preview-name').textContent = name;
                document.getElementById('preview-description').textContent = description;

                // Update preview styling
                const previewCard = document.getElementById('category-preview');
                const header = previewCard.querySelector('.card-header');
                const previewIcon = header.querySelector('i');
                const badge = header.querySelector('.badge');

                header.style.backgroundColor = color + '15';
                header.style.borderColor = color;
                previewIcon.style.color = color;
                previewIcon.className = icon + ' me-2';

                badge.className = isActive ? 'badge bg-success ms-auto' : 'badge bg-secondary ms-auto';
                badge.textContent = isActive ? '{{ __("Active") }}' : '{{ __("Inactive") }}';
            }

            // Initialize preview
            document.addEventListener('DOMContentLoaded', function() {
                updatePreview();

                // Add event listeners
                document.getElementById('name').addEventListener('input', updatePreview);
                document.getElementById('description').addEventListener('input', updatePreview);
                document.getElementById('is_active').addEventListener('change', updatePreview);
            });

            // Form validation
            document.querySelector('form').addEventListener('submit', function(e) {
                const name = document.getElementById('name').value.trim();

                if (!name) {
                    e.preventDefault();
                    alert('{{ __("Please enter a category name.") }}');
                    return false;
                }
            });
        </script>
    @endpush
</x-app-layout>
