<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ __('admin.reports.reviews.title') }}</title>
    <link rel="stylesheet" href="{{ public_path('css/reportPdf.css') }}">
</head>

<body>
    <div class="container mt-4">
        {{-- Header Section --}}
        <div class="text-center mb-4">
            <div class="header-title">{{ __('admin.reports.reviews.title') }}</div>
            <div class="header-subtitle">{{ __('admin.reports.reviews.subtitle') }}</div>
            <div class="header-date">{{ __('admin.reports.reviews.date_range') }}: {{ $startDate }} -
                {{ $endDate }}</div>
        </div>

        {{-- General Statistics and Ratings Distribution --}}
        <div class="row g-4">
            <div class="col-md-6">
                {{-- General Statistics Card --}}
                <div class="card">
                    <div class="card-header">{{ __('admin.reports.reviews.general_stats') }}</div>
                    <div class="card-body p-0">
                        <table class="table mb-0 align-middle">
                            <tbody>
                                <tr>
                                    <th>{{ __('admin.reports.reviews.total_reviews') }}</th>
                                    <td>{{ $generalStats['total_reviews'] }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin.reports.reviews.average_rating') }}</th>
                                    <td>{{ number_format($generalStats['average_rating'], 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin.reports.reviews.total_products_reviewed') }}</th>
                                    <td>{{ $generalStats['total_products_reviewed'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">


                {{-- Reviews by Product Section --}}
                <div class="card mt-4">
                    <div class="card-header card-header-success">{{ __('admin.reports.reviews.by_product') }}</div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('admin.reports.reviews.product') }}</th>
                                    <th>{{ __('admin.reports.reviews.brand') }}</th>
                                    <th>{{ __('admin.reports.reviews.reviews_count') }}</th>
                                    <th>{{ __('admin.reports.reviews.avg_rating') }}</th>
                                    <th>{{ __('admin.reports.reviews.min_rating') }}</th>
                                    <th>{{ __('admin.reports.reviews.max_rating') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productReviews as $product)
                                    <tr>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->reviews_count }}</td>
                                        <td>{{ number_format($product->reviews_avg_qualification, 2, ',', '.') }}</td>
                                        <td>{{ number_format($product->reviews_min_qualification, 2, ',', '.') }}</td>
                                        <td>{{ number_format($product->reviews_max_qualification, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>
