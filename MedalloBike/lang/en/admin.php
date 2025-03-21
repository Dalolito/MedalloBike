
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
            'title_suffix' => 'Online Store',
            'description' => 'Description',
            'details' => 'Product Details',
            'brand' => 'Brand',
            'category' => 'Category',
            'stock' => 'Stock',
            'state' => 'State',
            'add_to_cart' => 'Add to Cart',
            'back_to_list' => 'Back to List',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'date_format' => 'Y-m-d H:i:s',
        ],
        'list' => [
            'title' => 'Products - Online Store',
            'subtitle' => 'List of products',
            'price' => 'Price',
            'category' => 'Category',
            'show_product' => 'View Product',
            'edit' => 'Edit',
            'enable' => 'enable',
            'disable' => 'Disable',
            'delete' => 'Delete',
            'delete_confirmation' => 'Are you sure you want to delete this product?',
            'in_stock' => 'In Stock',
            'out_of_stock' => 'Out of Stock',
            'no_products' => 'No products available yet. Click "Create Product" to add your first product.',
        ],
        'edit' => [
            'title' => 'Edit Product',
            'form' => [
                'title' => 'Title',
                'description' => 'Description',
                'category_id' => 'Category',
                'select_category' => 'Select a category',
                'image' => 'Image URL',
                'brand' => 'Brand',
                'price' => 'Price',
                'stock' => 'Stock',
                'state' => 'Product State',
                'state_available' => 'Available',
                'state_disabled' => 'Disabled',
                'submit' => 'Update Product',
                'cancel' => 'Cancel',
            ],
        ],
    ],
    'category' => [
        'list' => [
            'title' => 'Categories - Online Store',
            'subtitle' => 'List of categories',
            'create_category' => 'Create Category',
            'name' => 'Name',
            'show_category' => 'View Category',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'delete_confirmation' => 'Are you sure you want to delete this category?',
            'no_categories' => 'No categories available yet. Click "Create Category" to add your first category.',
        ],
    ],
    'title' => 'Admin Panel',
    'actions' => 'Actions',
    'create_product' => 'Create Product',
    'view_products' => 'View Products',
    'create_category' => 'Create Category',
    'view_categories' => 'View Categories',
];
