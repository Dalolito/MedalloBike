@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
    @section('header_title', $viewData["title"])
    @section('header_subtitle', $viewData["subtitle"])

    @section('empty_message')
        <p>{{ $viewData['labels']['no_products'] }}</p>
    @endsection

    @if(isset($viewData['products']))
        @foreach($viewData['products'] as $product)
            @section('product_actions_'.$product->getId())
                <div class="d-flex justify-content-between">
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="btn btn-primary btn-sm">
                        {{ $viewData['labels']['show_product'] }}
                    </a>
                </div>
            @endsection
        @endforeach
    @endif


    @include('layouts.product.list')
@endsection