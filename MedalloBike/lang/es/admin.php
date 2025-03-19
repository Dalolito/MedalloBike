
<?php
return [
    'products' => [
        'create' => [
            'title' => 'Crear Nuevo Producto',
            'form' => [
                'title' => 'Título',
                'description' => 'Descripción',
                'category_id' => 'ID de Categoría',
                'image' => 'URL de la Imagen',
                'brand' => 'Marca',
                'price' => 'Precio',
                'stock' => 'Stock',
                'submit' => 'Guardar',
            ],
            'success' => '¡Producto creado exitosamente!',
        ],
        'show' => [
            'description' => 'Descripción',
            'details' => 'Detalles del Producto',
            'brand' => 'Marca',
            'category' => 'Categoría',
            'stock' => 'Stock',
            'state' => 'Estado',
            'add_to_cart' => 'Agregar al Carrito',
        ],
        'list' => [
            'price' => 'Precio',
            'category' => 'Categoría',
            'show_product' => 'Ver Producto',
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'delete_confirmation' => '¿Estás seguro de que deseas eliminar este producto?',
        ],
    ],
    'title' => 'Panel de Administración',
    'actions' => 'Acciones',
    'create_product' => 'Crear Producto',
    'view_products' => 'Ver Productos',
];
