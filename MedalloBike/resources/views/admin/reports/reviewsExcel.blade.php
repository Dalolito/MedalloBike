<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('admin.reports.reviews.title') }}</title>
    <link rel="stylesheet" href="{{ public_path('css/excel-report.css') }}">
</head>
<body>
    <div class="header">
        <h1>{{ __('admin.reports.reviews.title') }}</h1>
        <h2>{{ __('admin.reports.reviews.subtitle') }}</h2>
        <p>{{ __('admin.reports.reviews.date_range') }}: {{ $startDate }} - {{ $endDate }}</p>
    </div>

    <div class="stats">
        <table>
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
        </table>
    </div>

    <h3>{{ __('admin.reports.reviews.by_product') }}</h3>
    <table>
        <thead>
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
            @foreach($productReviews as $product)
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
</body>
</html> 