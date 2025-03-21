@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
    <div class="container">
        <h1 class="my-4">{{ $viewData["title"] }}</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to Create a New Product -->
        <div class="card">
            <div class="card-header">
                <h5>{{ $viewData["title"] }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.product.save') }}">
                    @csrf

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('admin.products.create.form.title') }}</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('admin.products.create.form.title') }}" value="{{ old('title') }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('admin.products.create.form.description') }}</label>
                        <textarea class="form-control" id="description" name="description" placeholder="{{ __('admin.products.create.form.description') }}" required>{{ old('description') }}</textarea>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">{{ __('admin.products.create.form.category_id') }}</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">{{ __('admin.products.create.form.select_category') }}</option>
                            @foreach($viewData["categories"] as $category)
                                <option value="{{ $category->getId() }}" {{ old('category_id') == $category->getId() ? 'selected' : '' }}>
                                    {{ $category->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image URL -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('admin.products.create.form.image') }}</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="{{ __('admin.products.create.form.image') }}" value="{{ old('image') }}">
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ __('admin.products.create.form.brand') }}</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="{{ __('admin.products.create.form.brand') }}" value="{{ old('brand') }}" required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('admin.products.create.form.price') }}</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="{{ __('admin.products.create.form.price') }}" value="{{ old('price') }}" step="0.01" required>
                    </div>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">{{ __('admin.products.create.form.stock') }}</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="{{ __('admin.products.create.form.stock') }}" value="{{ old('stock') }}" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ __('admin.products.create.form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection