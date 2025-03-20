@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
    <!-- Sections specific to admin view -->
    @section('product_actions')
        <a href="{{ route('admin.product.edit', ['id' => $viewData['product']->getId()]) }}" class="btn btn-primary me-2">
            {{ $viewData['labels']['edit'] }}
        </a>
        <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">
            {{ $viewData['labels']['back_to_list'] }}
        </a>
        
        @if($viewData['product']->getState() == 'available')
            <a class="btn btn-danger ms-2" href="{{ route('admin.product.disable', ['id' => $viewData['product']->getId()]) }}">
                {{ $viewData['labels']['disable'] }}
            </a>
        @else
            <a class="btn btn-success ms-2" href="{{ route('admin.product.enable', ['id' => $viewData['product']->getId()]) }}">
                {{ $viewData['labels']['enable'] }}
            </a>
        @endif
    @endsection
    
    @section('additional_details')
        <!-- Additional fields specific to admin view -->
        <li><strong>{{ $viewData['labels']['created_at'] }}:</strong> {{ $viewData['product']->getCreatedAt() }}</li>
        <li><strong>{{ $viewData['labels']['updated_at'] }}:</strong> {{ $viewData['product']->getUpdatedAt() }}</li>
    @endsection
    
    <!-- Include the layout after defining all sections -->
    @include('layouts.product.show')
@endsection