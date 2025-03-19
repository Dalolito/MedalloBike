
<?php
return [
    'products' => [
        'create' => [
            'title' => 'Create New Product',
            'form' => [
                'title' => 'Title',
                'description' => 'Description',
                'category_id' => 'Category ID',
                'image' => 'Image URL',
                'brand' => 'Brand',
                'price' => 'Price',
                'stock' => 'Stock',
                'submit' => 'Save',
            ],
            'success' => 'Product created successfully!',
        ],
        'show' => [
            'description' => 'Description',
            'details' => 'Product Details',
            'brand' => 'Brand',
            'category' => 'Category',
            'stock' => 'Stock',
            'state' => 'State',
            'add_to_cart' => 'Add to Cart',
        ],
        'list' => [
            'price' => 'Price',
            'category' => 'Category',
            'show_product' => 'View Product',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'delete_confirmation' => 'Are you sure you want to delete this product?',
        ],
    ],
    'title' => 'Admin Panel',
    'actions' => 'Actions',
    'create_product' => 'Create Product',
    'view_products' => 'View Products',
];
