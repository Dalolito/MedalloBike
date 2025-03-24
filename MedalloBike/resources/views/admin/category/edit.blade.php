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

        <!-- Form to Edit a Category -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>{{ $viewData["title"] }}</h5>
                    <a href="{{ route('admin.category.list') }}" class="btn btn-secondary">
                        {{ __('admin.category.edit.back_to_list') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.category.update', ['id' => $viewData['category']->getId()]) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('admin.category.edit.form.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
                                value="{{ old('name', $viewData['category']->getName()) }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ __('admin.category.edit.form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection