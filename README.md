# MedalloBike - Tienda Online de Productos para Ciclismo 🚲

MedalloBike es una aplicación web desarrollada con Laravel que permite gestionar un inventario de productos relacionados con el ciclismo y realizar compras en línea.

## Requisitos previos

- **XAMPP**: Asegúrate de tener XAMPP instalado en tu sistema. Puedes descargarlo desde https://www.apachefriends.org/es/download.html
- **Composer**: Asegúrate de tener Composer instalado. Si no lo tienes, sigue las instrucciones de instalación en https://getcomposer.org/
- **PHP**: Versión 8.2 o superior
- **Node.js y NPM**: Para compilar los archivos CSS y JavaScript

## Clonar el repositorio

Clona el repositorio desde GitHub:

1. Abre una terminal o CMD y navega hasta la carpeta donde deseas guardar el proyecto (por ejemplo, C:\xampp\htdocs para Windows o /Applications/XAMPP/htdocs para Mac).
2. Ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone https://github.com/tu-usuario/MedalloBike.git
```

Reemplaza `tu-usuario` con el nombre de usuario o la organización donde está alojado el repositorio.

3. Navega al directorio del proyecto:

```bash
cd MedalloBike
```

## Configuración del proyecto

1. **Coloca el proyecto en la carpeta htdocs de XAMPP**:
   - Copia la carpeta MedalloBike dentro de C:\xampp\htdocs (Windows) o /Applications/XAMPP/htdocs (Mac).

2. **Instala las dependencias de Composer**:
   - Abre una terminal o CMD y navega hasta la raíz del proyecto:
   
   ```bash
   cd C:\xampp\htdocs\MedalloBike
   ```
   
   - Ejecuta el siguiente comando para instalar las dependencias:
   
   ```bash
   composer install
   ```

3. **Instala las dependencias de NPM** (opcional, si deseas compilar los assets):

   ```bash
   npm install
   npm run dev
   ```

4. **Configura la base de datos**:
   - Inicia XAMPP y activa los servicios de Apache y MySQL.
   - Haz clic en el botón Admin de MySQL para abrir phpMyAdmin.
   - En phpMyAdmin, crea una nueva base de datos llamada `medallobikedb`.

5. **Configura el archivo .env**:
   - Copia el archivo .env.example a .env:
   
   ```bash
   cp .env.example .env
   ```
   
   - Abre el archivo .env y actualiza los siguientes valores:
   
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=medallobikedb
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   
   Si tu configuración de MySQL es diferente, actualiza los valores correspondientes.

6. **Genera una clave de aplicación**:
   - Ejecuta el siguiente comando para generar una clave de aplicación:
   
   ```bash
   php artisan key:generate
   ```

7. **Ejecuta las migraciones y los seeders**:
   - Ejecuta el siguiente comando para crear las tablas en la base de datos y popularlo con datos de prueba:
   
   ```bash
   php artisan migrate --seed
   ```

8. **Crea un enlace simbólico para los archivos de almacenamiento**:

   ```bash
   php artisan storage:link
   ```

## Ejecutar los seeders

Los seeders permiten poblar la base de datos con información de prueba para facilitar el desarrollo y las pruebas. Para ejecutar solo los seeders (suponiendo que ya has ejecutado las migraciones):

```bash
php artisan db:seed
```

Si deseas ejecutar un seeder específico:

```bash
php artisan db:seed --class=ProductsSeeder
php artisan db:seed --class=CategoriesSeeder
php artisan db:seed --class=UsersSeeder
```

Los seeders disponibles incluyen:

- **UsersSeeder**: Crea usuarios de prueba, incluyendo la cuenta de administrador.
- **CategoriesSeeder**: Añade categorías predefinidas para los productos.
- **ProductsSeeder**: Añade productos de ejemplo con sus respectivas imágenes y descripciones.
- **RoutesSeeder**: Añade rutas de ciclismo predefinidas.

## Ejecutar el proyecto

### Usando el servidor de desarrollo de Laravel:

Ejecuta el siguiente comando para iniciar el servidor de Laravel:

```bash
php artisan serve
```

Abre tu navegador y visita http://127.0.0.1:8000 para ver el proyecto en funcionamiento.

### Usando XAMPP:

- Asegúrate de que los servicios de Apache y MySQL estén activos en XAMPP.
- Abre un navegador y visita http://localhost/MedalloBike/public para acceder a la aplicación.

## Rutas principales

- **Página principal**: http://127.0.0.1:8000/ o http://localhost/MedalloBike/public/
- **Catálogo de productos**: http://127.0.0.1:8000/product/list
- **Carrito de compras**: http://127.0.0.1:8000/cart
- **Rutas de ciclismo**: http://127.0.0.1:8000/route

## Cuentas de usuario

El seeder de la base de datos crea las siguientes cuentas:

**Administrador**:
- Email: admin@medallobike.com
- Password: admin123

Para crear un usuario regular, utiliza la funcionalidad de registro en la aplicación.

## Panel de administración

El panel de administración está disponible en:

http://127.0.0.1:8000/admin/home o http://localhost/MedalloBike/public/admin/home

Desde aquí puedes:

- Gestionar productos (crear, editar, habilitar/deshabilitar)
- Gestionar categorías
- Ver estadísticas de productos más vendidos

## Características principales

- Catálogo de productos filtrable por categorías
- Sistema de autenticación de usuarios
- Carrito de compras
- Sistema de reseñas para productos
- Panel de administración para gestión de productos y categorías
- Sección de rutas de ciclismo
- Historial de compras para usuarios

## Notas adicionales

- La aplicación utiliza SQLite por defecto, pero puedes configurarla para usar MySQL cambiando la configuración en el archivo .env.
