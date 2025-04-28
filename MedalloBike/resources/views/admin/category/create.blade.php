<!-- Made by: Camilo Monsalve Montes -->
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
    <div class="container">
        <h1 class="my-4">{{ $viewData['title'] }}</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to Create a New Category -->
        <div class="card">
            <div class="card-header">
                <h5>{{ $viewData['title'] }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.category.save') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('admin.category.create.form.name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="{{ __('admin.category.create.form.name') }}"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ __('admin.category.create.form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
