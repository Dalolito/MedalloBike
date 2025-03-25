@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')
    <div class="container">
        <!-- Header Section -->
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

        <!-- Categories Table -->
        <div class="card">
            <div class="card-body">
                @if(isset($viewData['category']) && count($viewData['category']) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>{{ __('admin.category.list.name') }}</th>
                                    <th>{{ __('admin.category.list.state') }}</th>
                                    <th>{{ __('admin.category.list.created_at') }}</th>
                                    <th>{{ __('admin.category.list.updated_at') }}</th>
                                    <th class="text-end">{{ __('admin.category.list.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($viewData['category'] as $category)
                                    <tr>
                                        <td>{{ $category->getId() }}</td>
                                        <td>{{ $category->getName() }}</td>
                                        <td>
                                            @if($category->getState() == 'available')
                                                <span class="badge bg-success">{{ __('admin.category.edit.form.state_available') }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ __('admin.category.edit.form.state_disabled') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $category->getCreatedAt() }}</td>
                                        <td>{{ $category->getUpdatedAt() }}</td>
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <!-- Show button -->
                                                <a href="{{ route('admin.category.show', ['id' => $category->getId()]) }}" 
                                                   class="btn btn-sm btn-info me-1" title="{{ __('admin.category.list.show_category') }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                
                                                <!-- Edit button -->
                                                <a href="{{ route('admin.category.edit', ['id' => $category->getId()]) }}" 
                                                   class="btn btn-sm btn-primary me-1" title="{{ __('admin.category.list.edit') }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                
                                                <!-- Enable/Disable button -->
                                                @if($category->getState() == 'available')
                                                    <a href="{{ route('admin.category.disable', ['id' => $category->getId()]) }}" 
                                                       class="btn btn-sm btn-warning" title="{{ __('admin.category.list.disable') }}">
                                                        <i class="bi bi-toggle-off"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.category.enable', ['id' => $category->getId()]) }}" 
                                                       class="btn btn-sm btn-success" title="{{ __('admin.category.list.enable') }}">
                                                        <i class="bi bi-toggle-on"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        {{ __('admin.category.list.no_categories') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection