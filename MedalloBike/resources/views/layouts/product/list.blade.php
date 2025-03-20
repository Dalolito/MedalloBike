<!-- Product List Layout - Only for listing products -->
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>@yield('header_title', $viewData["title"])</h1>
            <h5 class="text-muted">@yield('header_subtitle', $viewData["subtitle"])</h5>
        </div>
        <div>
            @yield('header_actions')
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
        @if(isset($viewData['products']) && count($viewData['products']) > 0)
            @foreach($viewData['products'] as $product)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <!-- Product Image -->
                        <img src="{{ asset('/img/bike.jpg') }}"
                             class="card-img-top img-card" alt="{{ $product->getTitle() }}">
                        
                        <!-- Product Info -->
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->getTitle() }}</h5>
                            <p class="card-text">{{ $viewData['labels']['price'] }}: ${{ number_format($product->getPrice(), 2) }}</p>
                            <p class="card-text">{{ $viewData['labels']['category'] }}: {{ $product->getCategoryId() }}</p>
                            <p class="card-text">{{ $viewData['labels']['brand'] }}: {{ $product->getBrand() }}</p>
                            
                            <!-- Stock Status -->
                            @if($product->getStock() > 0)
                                <p class="badge bg-success">{{ $viewData['labels']['in_stock'] }} ({{ $product->getStock() }})</p>
                            @else
                                <p class="badge bg-danger">{{ $viewData['labels']['out_of_stock'] }}</p>
                            @endif

                            @if($product->getState() == 'disabled')
                                <p class="badge bg-secondary">{{ $viewData['labels']['state_disabled'] ?? 'Disabled' }}</p>
                            @endif
                        </div>
                        
                        <!-- Product Actions - Customizable by specific views -->
                        <div class="card-footer bg-white text-center">
                            @yield('product_actions_'.$product->getId(), '')
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    @yield('empty_message', $viewData['labels']['no_products'])
                </div>
            </div>
        @endif
    </div>
    
    <!-- Pagination if needed -->
    @yield('pagination')
</div>