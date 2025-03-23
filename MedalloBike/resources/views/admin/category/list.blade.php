@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>{{ $viewData["title"] }}</h1>
            <h5 class="text-muted">{{ $viewData["subtitle"] }}</h5>
        </div>
        <div>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                {{ __('admin.create_category') }}
            </a>
        </div>
    </div>

    <div class="row">
        @if(isset($viewData['category']) && count($viewData['category']) > 0)
            @foreach ($viewData['category'] as $category)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->getName() }}</h5>
                    </div>
                    
                    <div class="card-footer bg-white text-center">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.category.show', ['id' => $category->getId()]) }}" class="btn btn-primary btn-sm">
                                {{ __('admin.category.list.show_category') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('admin.category.list.no_categories') }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection