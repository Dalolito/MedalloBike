@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('app.products_user.cart.purchase.completed') }}
        </div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                {{ __('messages.success.purchase_completed', ['id' => $viewData['order']->getId()]) }}
            </div>
        </div>
    </div>
@endsection
