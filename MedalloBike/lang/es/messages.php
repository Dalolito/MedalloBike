<?php

return [
    'success' => [
        'product_created' => 'Producto creado exitosamente.',
        'product_updated' => 'Producto actualizado exitosamente.',
        'product_disabled' => 'Producto deshabilitado exitosamente.',
        'product_enabled' => 'Producto habilitado exitosamente.',
        'review_created' => '¡Reseña creada exitosamente!',
        'review_updated' => '¡Reseña actualizada exitosamente!',
        'category_created' => 'Categoría creada exitosamente.',
        'category_updated' => 'Categoría actualizada exitosamente.',
        'category_disabled' => 'Categoría deshabilitada exitosamente.',
        'category_enabled' => 'Categoría habilitada exitosamente.',
        'purchase_completed' => '¡Felicidades, compra completada! El número de pedido es #:id',
    ],

    'error' => [
        'category_has_products' => 'No se puede eliminar una categoría con productos asociados.',
        'insufficient_funds' => 'Fondos insuficientes. Tu presupuesto es de $:budget, pero el costo total es de $:total.',
        'stock_not_available' => 'No hay suficiente stock disponible para algunos productos en tu carrito.',
        'quantity_exceeds_limit' => 'El valor debe ser menor o igual a :limit.',
    ],
];
