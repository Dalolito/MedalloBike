# MedalloBike

Sistema de gestión para una tienda de bicicletas desarrollado en Laravel.

## Requisitos Previos

- PHP >= 8.1
- Composer
- MySQL
- Node.js y NPM
- XAMPP (recomendado)

## Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/tu-usuario/MedalloBike.git
cd MedalloBike
```

2. **Instalar dependencias de PHP**
```bash
composer install
composer require barryvdh/laravel-dompdf
composer require laravel/ui
composer require laravel/sanctum
```

3. **Instalar dependencias de JavaScript**
```bash
npm install
```

4. **Configurar el archivo .env**
```bash
cp .env.example .env
```
Editar el archivo .env con tus credenciales de base de datos:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medallobike
DB_USERNAME=root
DB_PASSWORD=
```

5. **Generar clave de aplicación**
```bash
php artisan key:generate
```

6. **Ejecutar migraciones**
```bash
php artisan migrate
```

7. **Ejecutar seeders (opcional)**
```bash
php artisan db:seed
```

8. **Compilar assets**
```bash
npm run dev
```

## Paquetes Adicionales

El proyecto utiliza los siguientes paquetes:

- `barryvdh/laravel-dompdf`: Para generar reportes en PDF
- `laravel/ui`: Para la autenticación
- `laravel/sanctum`: Para la API

## Estructura del Proyecto

- `app/`: Contiene la lógica principal de la aplicación
- `resources/`: Vistas y assets
- `database/`: Migraciones y seeders
- `routes/`: Definición de rutas
- `config/`: Archivos de configuración

## Características Principales

- Gestión de productos
- Sistema de carrito de compras
- Gestión de usuarios
- Sistema de reseñas
- Generación de reportes en PDF
- Rutas de ciclismo

## Desarrollo

Para iniciar el servidor de desarrollo:
```bash
php artisan serve
```

Para compilar assets en modo desarrollo:
```bash
npm run dev
```

## Licencia

Este proyecto está bajo la Licencia MIT.
