<?php

return [
    'title' => 'MedalloBike',
    'home' => 'Inicio',
    'login' => 'Iniciar Sesión',
    'register' => 'Registrarse',
    'logout' => 'Cerrar Sesión',
    'help' => 'Ayuda',
    'about' => 'Acerca de',
    'new' => 'Nuevo',
    'menu' => 'Menú',
    'close' => 'Cerrar',
    'products' => 'Productos',
    'cart' => 'Carrito',
    'view_cart' => 'Ver Carrito',
    'create_product' => 'Crear Producto',
    'view_product' => 'Ver Productos',
    'categories' => 'Categorías',
    'create_category' => 'Crear Categoría',
    'view_category' => 'Ver Categorías',

    'myaccount' => [
        'title' => 'Mi Cuenta',
        'orders' => [
            'title' => 'Mis Pedidos - Tienda Online',
            'subtitle' => 'Mis Pedidos',
            'view_orders' => 'Ver Pedidos',
            'order_number' => 'Pedido',
            'date' => 'Fecha',
            'total' => 'Total',
            'item_id' => 'ID del Artículo',
            'product_name' => 'Nombre del Producto',
            'price' => 'Precio',
            'quantity' => 'Cantidad',
            'no_orders' => 'Parece que aún no has comprado nada en nuestra tienda =(',
        ],
    ],
    'review' => [
        'form' => [
            'qualification' => 'Calificación',
            'submit' => 'Enviar Reseña',
            'label_review' => 'Tu Reseña',
            'add_review' => 'Escribir una Reseña',
            'login_to_review' => 'Por favor',
            'select_rating' => 'Seleccionar calificación',
            'review_placeholder' => 'Comparte tu experiencia con este producto...',
            'rating' => [
                'excellent' => 'Excelente',
                'very_good' => 'Muy Bueno',
                'good' => 'Bueno',
                'fair' => 'Regular',
                'poor' => 'Malo',
            ],
        ],
        'list' => [
            'title' => 'Reseñas de Clientes',
            'rating' => 'Calificación',
            'no_reviews' => 'Aún no hay reseñas. ¡Sé el primero en compartir tu opinión!',
            'date' => 'Fecha',
            'view_all' => 'Ver Todas las Reseñas',
        ],
    ],
    'hero' => [
        'title' => 'Descubre Tu Bicicleta Perfecta',
        'subtitle' => 'Bicicletas y accesorios de calidad para todas tus aventuras ciclistas',
        'shop_now' => 'Comprar Ahora',
        'explore_routes' => 'Explorar Rutas',
    ],

    'products_user' => [
        'show' => [
            'title_suffix' => 'Tienda Online',
            'description' => 'Descripción',
            'details' => 'Detalles del Producto',
            'brand' => 'Marca',
            'category' => 'Categoría',
            'stock' => 'Stock',
            'state' => 'Estado',
            'add_to_cart' => 'Agregar al Carrito',
            'back_to_list' => 'Volver a la Lista',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'date_format' => 'd-m-Y H:i:s',
        ],
        'list' => [
            'title' => 'Productos - Tienda Online',
            'subtitle' => 'Lista de productos',
            'price' => 'Precio',
            'category' => 'Categoría',
            'brand' => 'Marca',
            'show_product' => 'Ver Producto',
            'in_stock' => 'En Stock',
            'out_of_stock' => 'Agotado',
            'no_products' => 'No hay productos disponibles aún.',
            'filter_by_category' => 'Filtrar por Categoría',
            'all_categories' => 'Todas las Categorías',
            'filter' => 'Filtrar',
        ],
        'cart' => [
            'quantity' => 'Cantidad',
            'add_to_cart' => 'Añadir al carrito',
            'index' => [
                'title' => 'Carrito - Tienda Online',
                'subtitle' => 'Carrito de Compras',
                'products_in_cart' => 'Productos en el Carrito',
                'id' => 'ID',
                'name' => 'Nombre',
                'price' => 'Precio',
                'quantity' => 'Cantidad',
                'total_to_pay' => 'Total a pagar:',
                'purchase' => 'Comprar',
                'remove_all' => 'Eliminar todos los productos del Carrito',
            ],
            'purchase' => [
                'title' => 'Compra - Tienda Online',
                'subtitle' => 'Estado de la Compra',
                'completed' => 'Compra Completada',
            ],
        ],
    ],

    'routes_user' => [
        'show' => [
            'title_suffix' => 'Rutas - MedalloBike',
            'description' => 'Descripción',
            'details' => 'Detalles de la Ruta',
            'zone' => 'Zona',
            'difficulty' => 'Dificultad',
            'coordinates' => 'Coordenadas',
            'start' => 'Inicio',
            'end' => 'Fin',
            'add_review' => 'Agregar una Reseña',
            'back_to_list' => 'Volver a la Lista de Rutas',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',
            'date_format' => 'd-m-Y H:i:s',
        ],
        'list' => [
            'title' => 'Rutas - MedalloBike',
            'subtitle' => 'Lista de Rutas',
            'name' => 'Nombre de la Ruta',
            'zone' => 'Zona',
            'difficulty' => 'Dificultad',
            'coordinateStar'=>'Inicio',
            'coordinateEnd'=>'Final',
            'show_route' => 'Ver Ruta',
            'no_routes' => 'No hay rutas disponibles aún.',
            'filter_by_zone' => 'Filtrar por Zona',
            'all_zones' => 'Todas las Zonas',
            'filter' => 'Filtrar',
        ],
    ],
];
