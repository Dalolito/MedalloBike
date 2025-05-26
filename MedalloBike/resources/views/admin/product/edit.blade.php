<!-- Updated edit form: resources/views/admin/product/edit.blade.php -->
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
    <div class="container">
        <h1 class="my-4">{{ $viewData['title'] }}</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to Edit a Product -->
        <div class="card">
            <div class="card-header">
                <h5>{{ $viewData['title'] }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('admin.products.edit.form.title') }}</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ old('title', $viewData['product']->getTitle()) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('admin.products.edit.form.description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $viewData['product']->getDescription()) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">{{ __('admin.products.edit.form.category_id') }}</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">{{ __('admin.products.edit.form.select_category') }}</option>
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category->getId() }}"
                                    {{ old('category_id', $viewData['product']->getCategoryId()) == $category->getId() ? 'selected' : '' }}>
                                    {{ $category->getName() }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Image Display and New Image Upload -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('admin.products.edit.form.image') }}</label>
                        
                        <!-- Current Image -->
                        <div class="mb-3">
                            <label class="form-label text-muted">Imagen actual:</label>
                            <div class="border rounded p-2 text-center bg-light">
                                <img src="{{ $viewData['product']->getImageUrl() }}" 
                                     alt="Imagen actual del producto" 
                                     style="max-width: 200px; max-height: 200px;" 
                                     class="img-thumbnail">
                            </div>
                        </div>

                        <!-- New Image Upload -->
                        <label for="image" class="form-label">Cambiar imagen:</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                        <div class="form-text">
                            <i class="bi bi-info-circle"></i> 
                            Deja vacío para mantener la imagen actual. Formatos: JPG, PNG, GIF. Máximo: 2MB
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- New Image Preview -->
                        <div class="mt-3" id="image-preview-container" style="display: none;">
                            <label class="form-label">Nueva imagen (vista previa):</label>
                            <div class="border rounded p-2 text-center bg-light">
                                <img id="image-preview" src="#" alt="Vista previa de la nueva imagen" 
                                     style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="remove-image">
                                <i class="bi bi-trash"></i> Cancelar cambio
                            </button>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ __('admin.products.edit.form.brand') }}</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                            value="{{ old('brand', $viewData['product']->getBrand()) }}" required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('admin.products.edit.form.price') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" min="0"
                                value="{{ old('price', $viewData['product']->getPrice()) }}" required>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">{{ __('admin.products.edit.form.stock') }}</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" min="0"
                            value="{{ old('stock', $viewData['product']->getStock()) }}" required>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- State -->
                    <div class="mb-3">
                        <label for="state" class="form-label">{{ __('admin.products.edit.form.state') }}</label>
                        <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
                            <option value="available"
                                {{ old('state', $viewData['product']->getState()) == 'available' ? 'selected' : '' }}>
                                {{ __('admin.products.edit.form.state_available') }}
                            </option>
                            <option value="disabled"
                                {{ old('state', $viewData['product']->getState()) == 'disabled' ? 'selected' : '' }}>
                                {{ __('admin.products.edit.form.state_disabled') }}
                            </option>
                        </select>
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.product.show', ['id' => $viewData['product']->getId()]) }}"
                            class="btn btn-secondary me-md-2">
                            {{ __('admin.products.edit.form.cancel') }}
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> {{ __('admin.products.edit.form.submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/productImagePreview.js') }}"></script>
@endpush