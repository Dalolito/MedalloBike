<!-- Made by: David Lopera Londoño -->
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

        <!-- Form to Create a New Product -->
        <div class="card">
            <div class="card-header">
                <h5>{{ $viewData['title'] }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('admin.products.create.form.title') }}</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="{{ __('admin.products.create.form.title') }}" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description"
                            class="form-label">{{ __('admin.products.create.form.description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            placeholder="{{ __('admin.products.create.form.description') }}" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id"
                            class="form-label">{{ __('admin.products.create.form.category_id') }}</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">{{ __('admin.products.create.form.select_category') }}</option>
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category->getId() }}"
                                    {{ old('category_id') == $category->getId() ? 'selected' : '' }}>
                                    {{ $category->getName() }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('admin.products.create.form.image') }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
                        <div class="form-text">
                            <i class="bi bi-info-circle"></i> 
                            Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB
                        </div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <!-- Image Preview -->
                        <div class="mt-3" id="image-preview-container" style="display: none;">
                            <label class="form-label">Vista previa:</label>
                            <div class="border rounded p-2 text-center bg-light">
                                <img id="image-preview" src="#" alt="Vista previa de la imagen" 
                                     style="max-width: 250px; max-height: 250px;" class="img-thumbnail">
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="remove-image">
                                <i class="bi bi-trash"></i> Remover imagen
                            </button>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ __('admin.products.create.form.brand') }}</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                            placeholder="{{ __('admin.products.create.form.brand') }}" value="{{ old('brand') }}"
                            required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('admin.products.create.form.price') }}</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                placeholder="0.00" value="{{ old('price') }}" step="0.01" min="0" required>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">{{ __('admin.products.create.form.stock') }}</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock"
                            placeholder="0" value="{{ old('stock') }}" min="0" required>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary me-md-2">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> {{ __('admin.products.create.form.submit') }}
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