@extends('layouts.admin')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="row">
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $product->getTitle() }}</h5>
        <p class="card-text">{{ __('admin.products.list.price') }}: ${{ number_format($product->getPrice(), 2) }}</p>
        <p class="card-text">{{ __('admin.products.list.category') }}: {{ $product->getCategoryId() }}</p>
        <p class="card-text">{{ __('admin.products.create.form.brand') }}: {{ $product->getBrand() }}</p>
        <a href="" class="btn btn-primary">
            {{ __('admin.products.list.view_product') }}
        </a>
        <a href="" class="btn btn-warning">
            {{ __('admin.products.list.edit') }}
        </a>
        <form action="" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="">
                {{ __('admin.products.list.delete') }}
            </button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection