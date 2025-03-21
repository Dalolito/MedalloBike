@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')
    @section('product_actions')
        <a href="{{ route('admin.product.edit', ['id' => $viewData['product']->getId()]) }}" class="btn btn-primary me-2">
            {{ $viewData['labels']['edit'] }}
        </a>
        <a href="{{ route('product.list') }}" class="btn btn-secondary">
            {{ $viewData['labels']['back_to_list'] }}
        </a>
        @endif
    @endsection

    @include('layouts.product.show')
@endsection