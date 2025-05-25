@echo off
echo Instalando MedalloBike...
echo.

echo 1. Instalando dependencias de PHP...
call composer install
call composer require barryvdh/laravel-dompdf
call composer require laravel/ui
call composer require laravel/sanctum
echo.

echo 2. Instalando dependencias de JavaScript...
call npm install
echo.

echo 3. Configurando archivo .env...
if not exist .env (
    copy .env.example .env
    echo Archivo .env creado. Por favor, edita el archivo con tus credenciales de base de datos.
    pause
)
echo.

echo 4. Generando clave de aplicación...
call php artisan key:generate
echo.

echo 5. Ejecutando migraciones...
call php artisan migrate
echo.

echo 6. Ejecutando seeders...
call php artisan db:seed
echo.

echo 7. Compilando assets...
call npm run dev
echo.

echo Instalacion completada!
echo.
echo Para iniciar el servidor de desarrollo, ejecuta:
echo php artisan serve
echo.
pause 