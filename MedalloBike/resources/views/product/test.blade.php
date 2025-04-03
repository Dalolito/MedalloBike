<!-- Example for testing blade-formatter -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <!-- Mal indentado intencionalmente -->
        <div class="row">
            <div class="col-12">
                <h1>{{ $viewData['title'] }}
                </h1>
                <h5 class="text-muted">
                    {{ $viewData['subtitle'] }}</h5>
            </div>
        </div>

        <!-- Atributos HTML mal formateados -->
        <div class="card" id="test-card" data-type="example" style="margin-bottom: 20px;" class="test-class">
            <div class="card-header">
                <h5 class="mb-0">{{ __('Prueba de formato') }}</h5>
            </div>
            <div class="card-body">
                <!-- Formulario con formato inconsistente -->
                <form method="GET" action="{{ route('product.list') }}" class="d-flex" id="filter-form">
                    <select name="category" class="form-select me-2" id="category-select">
                        <option value="">Todas las categorías</option>
                        @foreach ($viewData['categories'] ?? [] as $category)
                            <option value="{{ $category->getId() }}"
                                {{ isset($viewData['selectedCategory']) && $viewData['selectedCategory'] == $category->getId()
                                    ? 'selected'
                                    : '' }}>
                                {{ $category->getName() }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
        </div>

        <!-- Condicional mal indentado -->
        @if (isset($viewData['products']) && count($viewData['products']) > 0)
            @foreach ($viewData['products'] as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top">
                        <div class="card-body">
                            <h5>{{ $product->getTitle() }}</h5>
                            <p>${{ $product->getPrice() }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">No hay productos disponibles.</div>
        @endif
    </div>
@endsection
