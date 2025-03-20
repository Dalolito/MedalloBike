<!-- Product Show Layout - Reusable layout for showing product details -->
<div class="container my-5">
    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="product-image-container text-center">
                <img src="{{ asset('/img/bike.jpg') }}" class="card-img-top img-card">
            </div>
            
            <!-- Area for additional image content -->
            @yield('additional_image_content')
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="product-title">{{ $viewData['product']->getTitle() }}</h1>
            <p class="product-price">${{ number_format($viewData['product']->getPrice(), 2) }}</p>

            <!-- Product Description -->
            <div class="product-description mb-4">
                <h3>{{ $viewData['labels']['description'] }}</h3>
                <p>{{ $viewData['product']->getDescription() }}</p>
            </div>

            <!-- Additional Details -->
            <div class="product-details mb-4">
                <h3>{{ $viewData['labels']['details'] }}</h3>
                <ul class="list-unstyled">
                    <li><strong>{{ $viewData['labels']['brand'] }}:</strong> {{ $viewData['product']->getBrand() }}</li>
                    <li><strong>{{ $viewData['labels']['category'] }}:</strong> {{ $viewData['product']->getCategoryId() }}</li>
                    <li><strong>{{ $viewData['labels']['stock'] }}:</strong> {{ $viewData['product']->getStock() }}</li>
                    <li><strong>{{ $viewData['labels']['state'] }}:</strong> 
                        @if($viewData['product']->getState() == 'available')
                            <span class="badge bg-success">{{ $viewData['labels']['state_available'] }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $viewData['labels']['state_disabled'] }}</span>
                        @endif
                    </li>
                    
                    <!-- Yield for view-specific additional details -->
                    @yield('additional_details')
                </ul>
            </div>

            <!-- Action Buttons - Customizable by specific views -->
            <div class="mt-4">
                @yield('product_actions')
            </div>
            
            <!-- Additional content area after buttons -->
            @yield('after_actions')
        </div>
    </div>
    
    <!-- Extra content section at the bottom -->
    @yield('bottom_content')
</div>