# Laravel 10

## Requisitos

- [PHP8^|"Xammp"](https://www.apachefriends.org/es/download.html).
- [Composer](https://getcomposer.org/).
- [Node.js](https://nodejs.org/).
- [Npm](https://docs.npmjs.com/).
- [Git](https://git-scm.com/).
- [Laravel](https://laravel.com/docs/10.x).

###### Problemas/Soluciones

> Actualizar Composer que requiere laravel : Utilizar Consola como Admin.

>Typee: en la Consola:
```console
    composer clearcache
```
**`Nota:` Borra la cache de composer .**

>Typee: en la Consola:
```console
    composer selfupdate
```
**`Nota:` Actualiza composer .**

> Al instalar Laravel hay que asegurarse que en el archivo `php.ini` que esta en la carpeta `C:\xampp\php\php.ini` este hay que descomentar la extension `extension=zip`.

<a name="top"></a>

## Indice de Contenidos.

- [Instalación](#item1)
- [Rutas en laravel](#item2)
- [Controladores en laravel](#item3)
- [Vistas en laravel](#item4)
- [Bases de datos en laravel](#item5)
- [Generando migraciones](#item6)
- [Introducción a Eloquent ORM](#item7)
- [Seeders en laravel](#item8)
- [Factory's en laravel](#item9)
- [Generador de Consultas de Eloquent](#item10)

<a name="item1"></a>

## Instalación

###### Instalación de Laravel

>Typee: en la Consola:
```console
    composer create-project laravel/laravel example-app
```
**`Nota:` El nombre `example-app` lo cambiamos por el nombre de nuestra aplicación.**

###### Inicializar Git

>Typee: en la Consola:
```console
    git init
```
###### Subir Repositorio a GitHub

> Accedemos a [github](https://github.com/) y creamos un nuevo repositorio una vez creado copiamos la url de dicho repositorio.

>Typee: en la Consola:
```console
    git remote add origin URL
```
>Typee: en la Consola:
```console
    git config --global user.email "email"
```
>Typee: en la Consola:
```console
    git config --global user.name "nombre"
```
**`Nota:` Si no tenemos agregado el nombre y el email en la configuración de git.**

>Typee: en la Consola:
```console
    git add .
```

**`Nota:` Preparamos los archivos que queremos subir.**
>Typee: en la Consola:
```console
    git commit -m "Instalación del Proyecto"
```
**`Nota:` Creamos el Comentario y guardamos los archivo modificados o nuevos de nuestro repositorio en local.**

>Typee: en la Consola:
```console
    git push -f origin master
```
**`Nota:` Subimos los archivos o repositorio local al servidor de github.**

[Subir](#top)

<a name="item2"></a>
## Rutas en laravel

>Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` el archivo donde se registran las rutas web.

```php
Route::get('/', function () {
    return 'Hola mundo';
});
```
>Nueva ruta
```php
Route::get('cursos', function () {
    return 'Bienvenido a la pagina cursos';
});
```
>Mandar variable en las rutas
```php
Route::get('cursos/{curso}', function ($curso) {
    return "Bienvenido al cursos: $curso";
});
```
>Mandar mas variable en las rutas
```php
Route::get('cursos/{curso}/{categoria}', function ($curso, $categoria) {
    return "Bienvenido al cursos: $curso, de la categoria: $categoria";
});
```
>Unificar rutas `variable?`Opcional
```php
Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
    if($categoria){
        return "Bienvenido al cursos: $curso, de la categoria: $categoria";
    } else {
        return "Bienvenido al cursos: $curso";
    }
});
```

[Subir](#top)

<a name="item3"></a>

## Controladores en Laravel

###### Crear Controlador

>Typee: en la Consola:
```console
    php artisan make:controller HomeController
```
>Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y creamos un función `__invoke` dentro de la Clase `HomController`.

```php
    public function __invoke()
    {
        return 'Hola mundo';
    }
```

###### Asignar Controlador a una ruta
>Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` y importamos el controlador escribimos lo siguiente  .

```php
use App\Http\Controllers\HomeController;
```
> Cambiamos la ruta `/`.

```php
Route::get('/',HomeController::class);
```
>Typee: en la Consola:
```console
    php artisan make:controller CursoController
```
>Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y escribimos dentro de la Clase `HomController`.

```php
    public function index()
    {
         return 'Bienvenido a la pagina cursos';
    }
    public function create()
    {
         return 'Bienvenido a la pagina de crear cursos';
    }
    public function show($curso)
    {
        return "Bienvenido al curso: $curso";
    }
```
>Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` y importamos el controlador escribimos lo siguiente  .

```php
use App\Http\Controllers\CursoController;
```
> Cambiamos la ruta `cursos`.

```php
Route::get('cursos',[CursoController::class,'index']);
```
> Cambiamos la ruta `cursos/{curso}`.

```php
Route::get('cursos/create',[CursoController::class,'create']);
```
> Cambiamos la ruta `cursos/{curso}/{categoria?}`.

```php
Route::get('cursos/{curso}',[CursoController::class,'show']);
```

###### Agrupar rutas por Controlador

>Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php`  escribimos lo siguiente  .

```php
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos','index');
    Route::get('cursos/create','create');
    Route::get('cursos/{curso}','show');
});
```
**`Nota:`Disponible desde la version 9^ Laravel.**

[Subir](#top)

<a name="item4"></a>

## Vistas en Laravel

>Creamos y Abrimos el archivo `Home.php`  en la carpeta `resources\views\home.php` escribimos lo siguiente  .

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola mundo</h1>
</body>
</html>
```
>Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y escribimos dentro de la función `__invoke`.

```php
return view('home');
```

>Creamos y Abrimos el archivo `index.php`  en la carpeta `resources\views\cursos\index.php` escribimos lo siguiente  .

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a la pagina cursos</h1>
</body>
</html>
```
>Abrimos el archivo `CursoController.php` que esta en la carpeta `app\Http\Controllers\CursoController.php` y escribimos dentro de la función `index`.

```php
return view('cursos.index');
```

>Creamos y Abrimos el archivo `show.php`  en la carpeta `resources\views\cursos\show.php` escribimos lo siguiente  .

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido al curso <?php echo $curso; ?></h1>
</body>
</html>
```

>Abrimos el archivo `CursoController.php` que esta en la carpeta `app\Http\Controllers\CursoController.php` y escribimos dentro de la función `show`.

```php
return view('cursos.show',['curso' => $curso]);
return view('cursos.show',[compact('curso')]); // Si el nombre de la variable es igual.
```
###### Sistema de plantillas Blade

>Creamos y Abrimos el archivo `plantilla.blade.php`  en la carpeta `resources\views\layouts\plantilla.blade.php` escribimos lo siguiente  .

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
```

>Cambiamos el nombre y Abrimos el archivo `home.php` a `home.blade.php`  que esta en la carpeta `resources\views\home.php` y escribimos.

```php
@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
    <h1>Hola mundo</h1>
@endsection
```
**`Nota:` Modificamos los demás archivos de las vistas.**

>Cambiamos el nombre y Abrimos el archivo `show.php` a `show.blade.php`  que esta en la carpeta `resources\views\cursos\show.php` y escribimos.

```php
@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Bienvenido al curso {{$curso}} </h1>
@endsection
```

[Subir](#top)


<a name="item5"></a>

## Bases de datos en laravel

>Crear Base de datos Laravel soporta estos tipos de bases MariaDB 10.3+, MySQL 5.7+, PostgreSQL 10.0+, SQLite 3.8.8+, SQL Server 2017+.

###### Conectando Laravel a la Base de datos

>Abrimos el archivo `.env`  en la carpeta `/` y en el apartado de base de datos escribimos

```
DB_CONNECTION=mysql // Motor Base de datos
DB_HOST=127.0.0.1 // Url del localhost
DB_PORT=3306 // puerto del servidor
DB_DATABASE=laravel // Nombre de la base de datos
DB_USERNAME=root // Nombre del usuario del servidor
DB_PASSWORD= // Password del servidor
```

[Subir](#top)

<a name="item6"></a>

## Generando migraciones

###### Ejecutar migraciones

>Typee: en la Consola:
```console
    php artisan migrate
```
###### Creación de migraciones

>Typee: en la Consola:
```console
    php artisan make:migration cursos
```
>Abrimos el archivo `XXXX_XX_XX_XXXXXX_cursos.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_cursos.php` y en la función `up` escribimos lo siguiente.

```php
        Schema::create('cursos',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
```

**`Nota:` [Tipos de columnas disponibles](https://laravel.com/docs/10.x/migrations#available-column-types).**

>Y en la función `down` escribimos lo siguiente.

```php
        Schema::dropIfExists('cursos');
```
>Typee: en la Consola:
```console
    php artisan migrate
```

###### Revertir ultima migración

>Typee: en la Consola:
```console
    php artisan migrate:rollback
```

>Eliminamos el archivo `XXXX_XX_XX_XXXXXX_cursos.php`.

>Typee: en la Consola:
```console
    php artisan migrate
```

>Typee: en la Consola:
```console
    php artisan make:migration create_cursos_table
```
**`Nota:` Es la forma correcta de creación de una tabla.**

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_cursos_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_cursos_table.php` y en la función `up` añadimos lo siguiente.

```php
            $table->string('name');
            $table->text('description');
```

>Typee: en la Consola:
```console
    php artisan migrate
```

###### Modificar una tabla ya migrada

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_users_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_users_table.php` y en la función `up` añadimos lo siguiente.

```php
        $table->string('avatar');
```

>Typee: en la Consola:
```console
    php artisan migrate:fresh
```

**`Nota:` El comando `php artisan migrate:fresh` borra las tablas y seguido ejecuta el método `up` No es recomendable en producción.**

>Typee: en la Consola:
```console
    php artisan migrate:refresh
```
**`Nota:` El comando `php artisan migrate:refresh` ejecuta el método `down` y seguido ejecuta el método `up` No es recomendable en producción.**

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_users_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_users_table.php` y en la función `up` eliminamos lo siguiente.

```php
        $table->string('avatar');
```

>Typee: en la Consola:
```console
    php artisan migrate:rollback
```

>Typee: en la Consola:
```console
    php artisan migrate
```

###### Creamos migración de añadido

>Typee: en la Consola:
```console
    php artisan make:migration add_avatar_to_users_table
```

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php` y en la función `up` escribimos lo siguiente.

```php
        $table->string('avatar')->nullable()->after('email');
```

**`Nota:` Le indicamos la opción `nullable` para si la tabla ya contiene datos no nos de un error a la hora de hacer la migración y la opción `after` es para indicarle en que posición queremos el nuevo campo.**

>Y en la función `down` escribimos lo siguiente.

```php
         $table->dropColumn('avatar');
```

**`Nota:`Elimina el campo `avatar` de la tabla.**

###### Modificar propiedades de los campos

>Añadir dependencia a Composer.

>Typee: en la Consola:
```console
    composer require doctrine/dbal
```

>Creamos migración de añadido/modificación

>Typee: en la Consola:
```console
    php artisan make:migration cambiar_propiedades_to_users_table
```

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php` y en la función `up` escribimos lo siguiente.

```php
        $table->string('name', 150)->change()->nullable();
```

>Y en la función `down` escribimos lo siguiente.

```php
        $table->string('name', 255)->nullable(false)->change();
```

[Subir](#top)

<a name="item7"></a>

## Introducción a Eloquent ORM

###### Crear un modelo

>Typee: en la Consola:
```console
    php artisan make:model Curso
```
>Utilizaremos tinker para ejecutar métodos de los modelos desde consola.

>Typee: en la Consola:
```console
    php artisan tinker
```
**`Nota:` Para salir de tinker escribimos `exit`.**

###### Agregar un nuevo objeto

>Especificamos el uso del Modelo Curso

>Typee: en la Consola:
```tinker
    use App\Models\Curso;
```

>Creamos el Objeto

>Typee: en la Consola:
```tinker
    $curso = new Curso;
```

>Llenar las propiedades al Objeto

>Typee: en la Consola:
```tinker
    $curso->name = 'Laravel';
    $curso->description = 'El mejor framework de PHP';
```

>Llamar al Objeto

>Typee: en la Consola:
```tinker
    $curso
```
>Guardar Objeto a la base de datos

>Typee: en la Consola:
```tinker
    $curso->save();
```
>Modificar Objeto

>Typee: en la Consola:
```tinker
    $curso->description = 'El mejor framework del mundo';
```

###### Cambiar la tabla al modelo

>Abrimos el archivo `Curso.php` en la carpeta `app\Models\Curso.php` y dentro de la clase `curso` escribimos lo siguiente.

```php
    protected $table = "users";
```

[Subir](#top)

<a name="item8"></a>

## Seeders en laravel

>Eliminamos todas la tablas de la base de datos

>Typee: en la Consola:
```console
php artisan migrate:reset
```

>Eliminamos el archivo `XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php`.

>Eliminamos el archivo `XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php`.

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_cursos_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_cursos_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->text('categoria');
```
>Abrimos el archivo `DatabaseSeeder.php`  en la carpeta `database\seeders\DatabaseSeeder.php` y en la función `run` escribimos lo siguiente.

```php
        $curso = new Curso();
        $curso->name = "Laravel";
        $curso->description = "El mejor Framework PHP";
        $curso->categoria = "Desarrollo Web";
        $curso->save();
```

>Importamos el modelo user
```php
use App\Models\Curso;
```

>Typee: en la Consola:
```console
php artisan migrate:fresh
```

###### Ejecutamos los seeders

>Typee: en la Consola:
```console
php artisan db:seed
```
###### Creamos un seeder del Curso

>Typee: en la Consola:
```console
php artisan make:seeder CursoSeeder
```

>Abrimos el archivo `CursoSeeder.php`  en la carpeta `database\seeders\CursoSeeder.php` y en la función `run` escribimos lo siguiente.

```php
        $curso = new Curso();
        $curso->name = "Laravel";
        $curso->description = "El mejor Framework PHP";
        $curso->categoria = "Desarrollo Web";
        $curso->save();
```

>Importamos el modelo user
```php
use App\Models\Curso;
```

>Abrimos el archivo `DatabaseSeeder.php`  en la carpeta `database\seeders\DatabaseSeeder.php` y en la función `run` escribimos lo siguiente.

```php
$this->call(CursoSeeder::class);
```

>Typee: en la Consola:
```console
php artisan migrate:fresh --seed
```

**`Notas:` Ejecutamos el refresco de la base de datos y con `--seed` ejecutamos los seeders en la misma sentencia.**

[Subir](#top)

<a name="item9"></a>

## Factory's en laravel

###### Creamos un factory del Curso

>Typee: en la Consola:
```console
php artisan make:factory CursoFactory
```

>Eliminamos el archivo `CursoFactory.php`  en la carpeta `database\factories\CursoFactory.php`.

>Indicamos el modelo al crear el factory

>Typee: en la Consola:
```console
php artisan make:factory CursoFactory --model=Curso
```

>Abrimos el archivo `CursoFactory.php`  en la carpeta `database\factories\CursoFactory.php` y en la función `definition` dentro del array `return` escribimos lo siguiente.

```php
        'name' => $this->faker->sentence(),
        'description' => $this->faker->paragraph(),
        'categoria' => $this->faker->randomElement(["Desarrollo web", "Diseño web"])
```

**`Nota:` [Tipos de columnas disponibles faker](https://fakerphp.github.io/).**

>Abrimos el archivo `CursoSeeder.php`  en la carpeta `database\seeders\CursoSeeder.php` y en la función `run` remplazamos y escribimos lo siguiente.

```php
Curso::factory(50)->create();
```

**`Nota:` También se puede prescindir del archivo `CursoSeeder` si añadimos la instrucción `Curso::factory(50)->create();` en el archivo `DatabaseSeeder.php` y importarmos la clase del modelo `use App\Models\Curso;`.**

[Subir](#top)

<a name="item10"></a>

## Generador de Consultas de Eloquent

###### Consultar datos desde Tinker

>Typee: en la Consola:
```console
php artisan tinker
```
>Especificamos el uso del Modelo Curso

>Typee: en la Consola:
```tinker
use App\Models\Curso;
```
>Consultamos todos los registros del modelo Curso

>Typee: en la Consola:
```tinker
$curso = Curso::all();
```

>Consultamos todos los registros que contengan la categoria `Diseño web`.

>Typee: en la Consola:
```tinker
$curso = Curso::where('categoria', 'Diseño web')->orderBy('id', 'desc')->get();
```

**`Note:` Con el parámetro adicional `orderBy` indicamos el orden y con el parámetro `get` hace que lo muestre como una colección de datos.**

>Consultamos un registro que contengan la categoria `Diseño web`.

>Typee: en la Consola:
```tinker
$curso = Curso::where('categoria', 'Diseño web')->orderBy('id', 'asc')->first();
```

>Consultamos por los campos indicados.

>Typee: en la Consola:
```tinker
$curso = Curso::select('name', 'description')->get();
```

>Consultamos  por los campos indicados cambiando el nombre de la propiedad.

>Typee: en la Consola:
```tinker
$curso = Curso::select('name as title', 'description')->get();
```

>Consultamos  por la cantidad de registros a mostrar.

>Typee: en la Consola:
```tinker
$curso = Curso::select('name as title', 'description')->take(1)->get();
```

>Consultamos por id.

>Typee: en la Consola:
```tinker
$curso = Curso::find(5);
```

>Consultamos por id mayor de que.

>Typee: en la Consola:
```tinker
$curso = Curso::where('id', '>', '45')->get();
```

>Consultamos registros que contenga dicha palabra.

>Typee: en la Consola:
```tinker
$curso = Curso::where('name', 'like', '% voluptate %')->get();
```

[Subir](#top)
