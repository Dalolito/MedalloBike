# Reglas del Repositorio

## Requerimientos y Gestión de Tareas
1. **Gestión de Requerimientos**
   - Todos los requerimientos serán gestionados en GitHub Projects.
   - Cada requerimiento debe comenzar con la palabra clave "app" (cliente) o "admin" para especificar el desarrollo.
   - El responsable del requerimiento se especificará en una columna junto al requerimiento.

## Flujo de Trabajo

1. **Creación de Ramas**  
   - Cada desarrollador debe trabajar en una rama cuyo nombre siga el formato:  
     **`nombre-desarrollador/referencia-funcionalidad`**.  
     Ejemplo: `juan/implementar-login`.  
   - El nombre de la rama debe reflejar claramente la funcionalidad en la que se está trabajando, basándose en las tareas asignadas en el **Backlog del Proyecto**.

2. **Pull Requests (PR)**  
   - Una vez finalizado el trabajo, se debe crear un **Pull Request (PR)** hacia la rama `develop`.  
   - El PR debe incluir una descripción clara de los cambios realizados y cualquier información relevante para la revisión.  
   - El arquitecto revisará el código, verificará que no haya conflictos de merge y aprobará el PR si cumple con los estándares establecidos.

3. **Estándares de Código**  
   - Todo el código subido debe cumplir con el estándar de **Laravel Pint**.  
   - Si el código no cumple con este estándar, **GitHub Actions** bloqueará la subida y devolverá un error.  
   - Asegúrate de ejecutar Laravel Pint localmente antes de subir tus cambios para evitar inconvenientes.

4. **Backlog y Asignaciones**  
   - Cada desarrollador tendrá asignadas las funcionalidades que debe implementar en el **Backlog del Proyecto**.  

# Reglas Generales para Todo el Código

## Buenas Prácticas en el Código

1. **Uso de Getters y Setters**  
   - Todos los llamados a un atributo de un modelo deben realizarse mediante **getters y setters** en cualquier parte del proyecto.  
   - Ejemplo:  
     ```php
     // Correcto
     $productName = $product->getTitle();

     // Incorrecto
     $productName = $product->title;
     ```

2. **Nombramiento de Variables**  
   - El nombramiento de variables debe seguir el formato **camelCase**.  
   - Ejemplo:  
     ```php
     $productName = 'Laptop';
     $userAge = 25;
     ```

3. **Nombramiento de Carpetas y Archivos en Views**  
   - Las carpetas y archivos en `resources/views` deben nombrarse en **singular** y en **minúsculas**.  
   - Ejemplo:  
     ```
     resources/views/product/show.blade.php
     ```

4. **Nombramiento de Archivos para Controladores y Factories**  
   - Los archivos de controladores y factories deben nombrarse con la **primera letra en mayúscula** y hacer referencia al modelo o componente.  
   - Ejemplo:  
     ```
     app/Http/Controllers/ProductController.php
     database/factories/UserFactory.php
     ```

5. **Evitar Repetición de Nombres**  
   - Los archivos dentro de carpetas de vistas **no deben repetir el nombre de la carpeta**.  
   - Ejemplo:  
     ```
     // Correcto
     resources/views/product/add.blade.php

     // Incorrecto
     resources/views/product/addProduct.blade.php
     ```  
   - Las funciones dentro de modelos y controladores **no deben repetir el nombre de la clase**.  
   - Ejemplo:  
     ```php
     // Correcto
     public function show(): View
     {
         // Lógica de la función
     }

     // Incorrecto
     public function showProduct(): View
     {
         // Lógica de la función
     }
     ```
6. **No importar nada que no se vaya a utilizar en un archivo**
   - En general no debe haber ninguna importación/use que no se este utilizando dentro del mismo archivo, esto para mejorar la eficiencia. 

7. **No usar lógica reutilizable en controladores**
   - No definir lógica reutilizable en los controladores; si es necesario, usar clases de utilidades.

# Reglas para Controladores

## Buenas Prácticas en Controladores

1. **Tipado de Funciones**  
   - Todas las funciones del controlador deben tener definidos los **tipados de las variables de entrada y salida**.  
   - Ejemplo:  
     ```php
     public function show(int $id): View
     {
         // Lógica de la función
     }
     ```

2. **Paso de Datos a Vistas**  
   - Para pasar datos o variables a una vista, se debe usar un **arreglo asociativo** llamado `viewData` con los campos que se desean enviar.  
   - Utiliza el método `with` en el `return`. Ejemplo:  
     ```php
     $viewData = [];
     $viewData['field'] = 'data';

     return view('view.name')->with('viewData', $viewData);
     ```

3. **Tipado de Respuestas Específicas**  
   - Para tipar la salida de una ruta, por ejemplo, se debe importar en la cabecera:  
     ```php
     use Illuminate\Http\RedirectResponse;
     ```  
   - Luego, en el tipado de salida, se debe indicar `RedirectResponse`. Ejemplo:  
     ```php
     public function redirect(): RedirectResponse
     {
         return redirect()->route('route.name');
     }
     ```

4. **Responsabilidad del Controlador**  
   - El controlador debe funcionar **únicamente como un intermediario** entre la vista y las demás aplicaciones.  
   - Acciones como consultas MySQL o verificación de datos **no deben realizarse directamente en el controlador**. Estas acciones deben llamarse desde el controlador, pero implementarse en otros componentes (por ejemplo, modelos o requests).

5. **Llamado Estándar de Vistas**  
   - La forma estándar para llamar una vista en este proyecto es:  
     ```php
     return view('view.name');
     ```

6. **No usar echo o dd() en métodos**
   - No utilizar `echo` ni `dd()` en los métodos de los controladores.

# Reglas para Modelos

## Buenas Prácticas en Modelos

1. **Relación con Tablas**  
   - Todas las tablas en la base de datos deben tener un **modelo relacionado**.  
   - El modelo debe representar fielmente la estructura y lógica de la tabla correspondiente.

2. **Seeders y Factories para Modelos**
   - Cada modelo debe tener un seeder o factory relacionado para facilitar la generación de datos de prueba.
   - Ejemplo:
     ```php
     // database/factories/ProductFactory.php
     namespace Database\Factories;

     use App\Models\Product;
     use Illuminate\Database\Eloquent\Factories\Factory;

     class ProductFactory extends Factory
     {
         protected $model = Product::class;

         public function definition()
         {
             return [
                 'title' => $this->faker->sentence,
                 'description' => $this->faker->paragraph,
                 'price' => $this->faker->randomFloat(2, 10, 1000),
             ];
         }
     }
     ```

3. **Documentación de Atributos**  
   - Al principio de la clase modelo, se debe incluir un comentario que describa todos los atributos y su significado, separando atributos primitivos y no primitivos con un espacio. Ejemplo:  
     ```php
     /**
      * PRODUCT ATTRIBUTES
      * $this->attributes['id'] - int - contiene la clave primaria del producto
      * $this->attributes['title'] - string - contiene el título del producto
      * $this->attributes['description'] - string - contiene la descripción del producto
      * $this->attributes['created_at'] - timestamp - contiene la fecha de creación
      * $this->attributes['updated_at'] - timestamp - contiene la fecha de actualización
      *
      * $this->orders - Order[] - contiene las órdenes asociadas
      * $this->reviews - Review[] - contiene las reseñas asociadas
      */
     ```

4. **Uso de `$fillable`**  
   - El modelo debe contar con una variable `protected $fillable` para definir los campos que pueden ser asignados masivamente. Ejemplo:  
     ```php
     protected $fillable = [
         'title',
         'description',
     ];
     ```

5. **Funciones GET y SET**  
   - Todos los atributos del modelo deben contar con una función **GET** y **SET**, excepto aquellos a los que se les asigna un valor automáticamente en la base de datos (por ejemplo, `id`). Ejemplo:  
     ```php
     public function getTitle(): string
     {
         return $this->attributes['title'];
     }

     public function setTitle(string $title): void
     {
         $this->attributes['title'] = $title;
     }
     ```

6. **Getters para timestamps**
   - Crear getters para `created_at` y `updated_at`.
   - Ejemplo:
     ```php
     public function getCreatedAt()
     {
         return $this->attributes['created_at'];
     }
     
     public function getUpdatedAt()
     {
         return $this->attributes['updated_at'];
     }
     ```

7. **Relaciones entre Modelos**
   - Si el modelo está relacionado con otros modelos, implementar funciones BelongsTo y HasMany para acceder a los objetos relacionados.
   - Ejemplo:
     ```php
     public function reviews()
     {
         return $this->hasMany(Review::class);
     }
     
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
     ```

# Reglas para las Rutas

## Buenas Prácticas en la Definición de Rutas

1. **Formato de Rutas**  
   - Las rutas deben seguir el formato **string** para definir el controlador y el método. Ejemplo:  
     ```php
     Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
     ```

2. **Evitar Repetición de Código**  
   - Para evitar repetir código, se recomienda almacenar en una variable **string** la parte de la ruta que se repita en varias rutas. Ejemplo:  
     ```php
     $controllerRoute = 'App\Http\Controllers\HomeController';
     Route::get('/', $controllerRoute . '@index')->name('home.index');
     ```

3. **Responsabilidad del Archivo de Rutas**  
   - El archivo de rutas **solo debe encargarse del nombramiento de la ruta** y siempre debe llevar a un controlador.  
   - No debe realizar funciones adicionales como pasar variables o ejecutar lógica.

4. **Rutas para Eliminación**  
   - Las rutas que lleven a un controlador con la función de eliminar (por ejemplo, `delete`) deben usar el método **`delete`**. Ejemplo:  
     ```php
     Route::delete('/delete/{id}', 'App\Http\Controllers\ProductController@delete')->name('product.delete');
     ```

5. **Rutas para Formularios**  
   - Las rutas que vengan de formularios (por ejemplo, una ruta que lleve a un controlador `save`) deben usar el método **`post`**. Ejemplo:  
     ```php
     Route::post('/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
     ```

6. **Organización de Rutas por Grupos**
   - Cada grupo de rutas debe estar en un archivo separado.

# Reglas para las Vistas

## Buenas Prácticas en las Vistas

1. **Formato de las Vistas**  
   - Todas las vistas deben estar en formato **`.blade.php`**.  
   - Ejemplo: `resources/views/home.blade.php`.

2. **Extensión del Layout**  
   - Las vistas en la carpeta principal `views` (excepto las que están en admin, partials y layouts) deben extender del layout principal **`layouts.app`**.
   - Las vistas en la carpeta `admin` deben extender de **`layouts.admin`**.
   - Ejemplo:  
     ```blade
     @extends('layouts.app')

     @section('content')
         <!-- Contenido de la vista -->
     @endsection
     ```

4. **Evitar Lógica en las Vistas**  
   - No se debe usar **lenguaje PHP** (como consultas MySQL o lógica compleja) dentro de las vistas.  
   - No abrir y cerrar etiquetas PHP en las vistas.
   - La lógica debe manejarse en los controladores, servicios o repositorios.

5. **Localización de Textos**  
   - No se debe "quemar" texto directamente en las vistas. En su lugar, se debe utilizar el sistema de **localización** de Laravel.  
   - Los mensajes deben definirse en los archivos de idioma dentro de `resources/lang`.  
   - Para llamar un mensaje en una vista Blade, se usa la función `__()`. Ejemplo:  
     ```blade
     <p>{{ __('messages.userCreated') }}</p>
     ```  
   - Ejemplo de archivo de idioma:  
     ```php
     // resources/lang/es/messages.php
     return [
         'userCreated' => 'Usuario creado exitosamente',
     ];
     ```
   - Excepción: No es necesario usar localización para información extraída de variables/objetos.

6. **Identación en HTML**  
   - Para el código HTML en las vistas, se debe usar un **identado de cuatro espacios**.  
   - Ejemplo:  
     ```blade
     <div>
       <p>{{ __('messages.welcome') }}</p>
       <ul>
         <li>Item 1</li>
         <li>Item 2</li>
       </ul>
     </div>
     ```
