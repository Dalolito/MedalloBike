@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 
<div class="card"> 
  <div class="card-header"> 
    {{ __('app.products_user.cart.index.products_in_cart') }}
  </div> 
  <div class="card-body">
    <!-- Error Message -->
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Success Message -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
 
    <table class="table table-bordered table-striped text-center"> 
      <thead> 
        <tr> 
          <th scope="col">{{ __('app.products_user.cart.index.id') }}</th> 
          <th scope="col">{{ __('app.products_user.cart.index.name') }}</th> 
          <th scope="col">{{ __('app.products_user.cart.index.price') }}</th> 
          <th scope="col">{{ __('app.products_user.cart.index.quantity') }}</th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($viewData["products"] as $product) 
        <tr> 
          <td>{{ $product->getId() }}</td> 
          <td>{{ $product->getTitle() }}</td>           
          <td>${{ $product->getPrice() }}</td> 
          <td>{{ session('products')[$product->getId()] }}</td>         
        </tr> 
        @endforeach 
      </tbody> 
    </table> 
    <div class="row"> 
      <div class="text-end"> 
        <a class="btn btn-outline-secondary mb-2"><b>{{ __('app.products_user.cart.index.total_to_pay') }}</b> ${{ $viewData["total"] }}</a> 
        @if (count($viewData["products"]) > 0)
          <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">{{ __('app.products_user.cart.index.purchase') }}</a> 
          <a href="{{ route('cart.delete') }}"> 
            <button class="btn btn-danger mb-2"> 
              {{ __('app.products_user.cart.index.remove_all') }}
            </button> 
          </a> 
        @endif
      </div> 
    </div> 
  </div> 
</div> 
@endsection