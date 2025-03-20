@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
    <!-- Definimos las secciones antes de incluir el layout -->
    @section('header_title', $viewData["title"])
    @section('header_subtitle', $viewData["subtitle"])

    @section('header_actions')
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
            {{ $viewData['labels']['create_product'] }}
        </a>
    @endsection

    @section('empty_message')
        <p>{{ $viewData['labels']['no_products'] }}</p>
    @endsection

    <!-- Definimos las acciones para cada producto -->
    @if(isset($viewData['products']))
        @foreach($viewData['products'] as $product)
            @section('product_actions_'.$product->getId())
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.product.show', ['id' => $product->getId()]) }}" class="btn btn-primary btn-sm">
                        {{ $viewData['labels']['show_product'] }}
                    </a>
                    
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" 
                                id="dropdownMenuButton{{ $product->getId() }}" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $viewData['labels']['actions'] }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $product->getId() }}">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}">
                                    {{ $viewData['labels']['edit'] }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                        {{ $viewData['labels']['disable'] }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endsection
        @endforeach
    @endif


    @include('layouts.product.list')
@endsection