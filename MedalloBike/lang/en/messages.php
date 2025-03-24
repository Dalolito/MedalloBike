<?php

return [
    'success' => [
        'product_created' => 'Product created successfully.',
        'product_updated' => 'Product updated successfully.',
        'product_disabled' => 'Product disabled successfully.',
        'product_enabled' => 'Product enabled successfully.',
        'review_created' => 'Review Created succesfully!',
        'review_updated' => 'Review updated succesfully!',
        'category_created' => 'Category created successfully.',
        'category_updated' => 'Category updated successfully.',
        'category_disabled' => 'Category disabled successfully.',
        'category_enabled' => 'Category enabled successfully.',
        'purchase_completed' => 'Congratulations, purchase completed. Order number is #:id',
    ],

    'error' => [
        'category_has_products' => 'Cannot delete category with associated products.',
        'insufficient_funds' => 'Insufficient funds. Your budget is $:budget, but the total cost is $:total',
        'stock_not_available' => 'Not enough stock available for some products in your cart.',
        'quantity_exceeds_limit' => 'The value must be less than or equal to :limit.',
    ],
];
