@extends('layouts.admin')

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

        <!-- Form to Edit a Product -->
        <div class="card">
            <div class="card-header">
                <h5>{{ $viewData["title"] }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}">
                    @csrf
                    <!-- Eliminamos @method('PUT') ya que usaremos POST directamente -->

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ $viewData["labels"]["title"] }}</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $viewData['product']->getTitle()) }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ $viewData["labels"]["description"] }}</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $viewData['product']->getDescription()) }}</textarea>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">{{ $viewData["labels"]["category_id"] }}</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">{{ $viewData["labels"]["select_category"] }}</option>
                            @foreach($viewData["categories"] as $category)
                                <option value="{{ $category->getId() }}" 
                                        {{ old('category_id', $viewData['product']->getCategoryId()) == $category->getId() ? 'selected' : '' }}>
                                    {{ $category->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image URL -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ $viewData["labels"]["image"] }}</label>
                        <input type="text" class="form-control" id="image" name="image" 
                               value="{{ old('image', $viewData['product']->getImage()) }}">
                    </div>

                    <!-- Brand -->
                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ $viewData["labels"]["brand"] }}</label>
                        <input type="text" class="form-control" id="brand" name="brand" 
                               value="{{ old('brand', $viewData['product']->getBrand()) }}" required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ $viewData["labels"]["price"] }}</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" 
                               value="{{ old('price', $viewData['product']->getPrice()) }}" required>
                    </div>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">{{ $viewData["labels"]["stock"] }}</label>
                        <input type="number" class="form-control" id="stock" name="stock" 
                               value="{{ old('stock', $viewData['product']->getStock()) }}" required>
                    </div>

                    <!-- State -->
                    <div class="mb-3">
                        <label for="state" class="form-label">{{ $viewData["labels"]["state"] }}</label>
                        <select class="form-control" id="state" name="state">
                            <option value="available" {{ old('state', $viewData['product']->getState()) == 'available' ? 'selected' : '' }}>
                                {{ $viewData["labels"]["state_available"] }}
                            </option>
                            <option value="disabled" {{ old('state', $viewData['product']->getState()) == 'disabled' ? 'selected' : '' }}>
                                {{ $viewData["labels"]["state_disabled"] }}
                            </option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.product.show', ['id' => $viewData['product']->getId()]) }}" class="btn btn-secondary me-md-2">
                            {{ __('admin.products.edit.form.cancel') }}
                        </a>
                        <button type="submit" class="btn btn-primary">
                            {{ $viewData["labels"]["submit"] }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection