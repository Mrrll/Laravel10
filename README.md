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

> Typee: en la Consola:

```console
    composer clearcache
```

**`Nota:` Borra la cache de composer .**

> Typee: en la Consola:

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
- [Mutadores y Accesores](#item11)
- [Crud en laravel](#item12)
- [Request en laravel](#item13)
- [Asignación Masiva](#item14)
- [Agrupar Rutas con Route Resource](#item15)
- [Url's amigables](#item16)
- [Navegabilidad web](#item17)
- [Enviar emails con laravel](#item18)
- [Formulario de Contacto](#item19)
- [Kits de inicio](#item20)
- [Implementar Bootstrap](#item21)
- [Componentes Blade](#item22)
- [Middleware](#item23)
- [Autentificación](#item24)
- [Notificaciones](#item25)
- [Relación uno a uno (One To One)](#item26)
- [Interfaz Perfil de usuario](#item27)
- [Relación uno a muchos (One To Many)](#item28)
- [Interfaz Posts](#item29)
- [Relación muchos a muchos (Many To Many)](#item30)
- [Agregando iconos (Fontawesome)](#item31)
- [Dashboard simple](#item32)
- [Relación muchos a muchos (Many To Many) Parte 2](#item33)
- [Roles y Permissions Implementación](#item34)


<a name="item1"></a>

## Instalación

###### Instalación de Laravel

> Typee: en la Consola:

```console
composer create-project laravel/laravel example-app
```

**`Nota:` El nombre `example-app` lo cambiamos por el nombre de nuestra aplicación.**

###### Inicializar Git

> Typee: en la Consola:

```console
git init
```

###### Subir Repositorio a GitHub

> Accedemos a [github](https://github.com/) y creamos un nuevo repositorio una vez creado copiamos la url de dicho repositorio.

> Typee: en la Consola:

```console
git remote add origin URL
```

> Typee: en la Consola:

```console
git config --global user.email "email"
```

> Typee: en la Consola:

```console
git config --global user.name "nombre"
```

**`Nota:` Si no tenemos agregado el nombre y el email en la configuración de git.**

> Typee: en la Consola:

```console
git add .
```

**`Nota:` Preparamos los archivos que queremos subir.**

> Typee: en la Consola:

```console
git commit -m "Instalación del Proyecto"
```

**`Nota:` Creamos el Comentario y guardamos los archivo modificados o nuevos de nuestro repositorio en local.**

> Typee: en la Consola:

```console
git push -f origin master
```

**`Nota:` Subimos los archivos o repositorio local al servidor de github.**

[Subir](#top)

<a name="item2"></a>

## Rutas en laravel

> Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` el archivo donde se registran las rutas web.

```php
Route::get('/', function () {
  return 'Hola mundo';
});
```

> Nueva ruta

```php
Route::get('cursos', function () {
  return 'Bienvenido a la pagina cursos';
});
```

> Mandar variable en las rutas

```php
Route::get('cursos/{curso}', function ($curso) {
  return "Bienvenido al cursos: $curso";
});
```

> Mandar mas variable en las rutas

```php
Route::get('cursos/{curso}/{categoria}', function ($curso, $categoria) {
  return "Bienvenido al cursos: $curso, de la categoria: $categoria";
});
```

> Unificar rutas `variable?`Opcional

```php
Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
  if ($categoria) {
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

> Typee: en la Consola:

```console
php artisan make:controller HomeController
```

> Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y creamos un función `__invoke` dentro de la Clase `HomController`.

```php
    public function __invoke()
    {
        return 'Hola mundo';
    }
```

###### Asignar Controlador a una ruta

> Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` y importamos el controlador escribimos lo siguiente .

```php
use App\Http\Controllers\HomeController;
```

> Cambiamos la ruta `/`.

```php
Route::get('/', HomeController::class);
```

> Typee: en la Consola:

```console
php artisan make:controller CursoController
```

> Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y escribimos dentro de la Clase `HomController`.

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

> Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` y importamos el controlador escribimos lo siguiente .

```php
use App\Http\Controllers\CursoController;
```

> Cambiamos la ruta `cursos`.

```php
Route::get('cursos', [CursoController::class, 'index']);
```

> Cambiamos la ruta `cursos/{curso}`.

```php
Route::get('cursos/create', [CursoController::class, 'create']);
```

> Cambiamos la ruta `cursos/{curso}/{categoria?}`.

```php
Route::get('cursos/{curso}', [CursoController::class, 'show']);
```

###### Agrupar rutas por Controlador

> Abrimos el archivo `routes.php` que esta en la carpeta `routes\web.php` escribimos lo siguiente .

```php
Route::controller(CursoController::class)->group(function () {
  Route::get('cursos', 'index');
  Route::get('cursos/create', 'create');
  Route::get('cursos/{curso}', 'show');
});
```

**`Nota:`Disponible desde la version 9^ Laravel.**

[Subir](#top)

<a name="item4"></a>

## Vistas en Laravel

> Creamos y Abrimos el archivo `Home.php` en la carpeta `resources\views\home.php` escribimos lo siguiente .

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

> Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y escribimos dentro de la función `__invoke`.

```php
return view('home');
```

> Creamos y Abrimos el archivo `index.php` en la carpeta `resources\views\cursos\index.php` escribimos lo siguiente .

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

> Abrimos el archivo `CursoController.php` que esta en la carpeta `app\Http\Controllers\CursoController.php` y escribimos dentro de la función `index`.

```php
return view('cursos.index');
```

> Creamos y Abrimos el archivo `show.php` en la carpeta `resources\views\cursos\show.php` escribimos lo siguiente .

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
</html>```

> Abrimos el archivo `CursoController.php` que esta en la carpeta `app\Http\Controllers\CursoController.php` y escribimos dentro de la función `show`.

```php
return view('cursos.show', ['curso' => $curso]);
return view('cursos.show', [compact('curso')]); // Si el nombre de la variable es igual.
```

###### Sistema de plantillas Blade

> Creamos y Abrimos el archivo `plantilla.blade.php` en la carpeta `resources\views\layouts\plantilla.blade.php` escribimos lo siguiente .

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

> Cambiamos el nombre y Abrimos el archivo `home.php` a `home.blade.php` que esta en la carpeta `resources\views\home.php` y escribimos.

```php
@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
    <h1>Hola mundo</h1>
@endsection
```

**`Nota:` Modificamos los demás archivos de las vistas.**

> Cambiamos el nombre y Abrimos el archivo `show.php` a `show.blade.php` que esta en la carpeta `resources\views\cursos\show.php` y escribimos.

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

> Crear Base de datos Laravel soporta estos tipos de bases MariaDB 10.3+, MySQL 5.7+, PostgreSQL 10.0+, SQLite 3.8.8+, SQL Server 2017+.

###### Conectando Laravel a la Base de datos

> Abrimos el archivo `.env` en la carpeta `/` y en el apartado de base de datos escribimos

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

> Typee: en la Consola:

```console
php artisan migrate
```

###### Creación de migraciones

> Typee: en la Consola:

```console
php artisan make:migration cursos
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_cursos.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_cursos.php` y en la función `up` escribimos lo siguiente.

```php
Schema::create('cursos', function (Blueprint $table) {
  $table->id();
  $table->string('name');
  $table->text('description');
  $table->timestamps();
});
```

**`Nota:` [Tipos de columnas disponibles](https://laravel.com/docs/10.x/migrations#available-column-types).**

> Y en la función `down` escribimos lo siguiente.

```php
Schema::dropIfExists('cursos');
```

> Typee: en la Consola:

```console
php artisan migrate
```

###### Revertir ultima migración

> Typee: en la Consola:

```console
php artisan migrate:rollback
```

> Eliminamos el archivo `XXXX_XX_XX_XXXXXX_cursos.php`.

> Typee: en la Consola:

```console
php artisan migrate
```

> Typee: en la Consola:

```console
php artisan make:migration create_cursos_table
```

**`Nota:` Es la forma correcta de creación de una tabla.**

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_cursos_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_cursos_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->string('name');
$table->text('description');
```

> Typee: en la Consola:

```console
php artisan migrate
```

###### Modificar una tabla ya migrada

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_users_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->string('avatar');
```

> Typee: en la Consola:

```console
php artisan migrate:fresh
```

**`Nota:` El comando `php artisan migrate:fresh` borra las tablas y seguido ejecuta el método `up` No es recomendable en producción.**

> Typee: en la Consola:

```console
php artisan migrate:refresh
```

**`Nota:` El comando `php artisan migrate:refresh` ejecuta el método `down` y seguido ejecuta el método `up` No es recomendable en producción.**

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_users_table.php` y en la función `up` eliminamos lo siguiente.

```php
$table->string('avatar');
```

> Typee: en la Consola:

```console
php artisan migrate:rollback
```

> Typee: en la Consola:

```console
php artisan migrate
```

###### Creamos migración de añadido

> Typee: en la Consola:

```console
php artisan make:migration add_avatar_to_users_table
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php` y en la función `up` escribimos lo siguiente.

```php
$table
  ->string('avatar')
  ->nullable()
  ->after('email');
```

**`Nota:` Le indicamos la opción `nullable` para si la tabla ya contiene datos no nos de un error a la hora de hacer la migración y la opción `after` es para indicarle en que posición queremos el nuevo campo.**

> Y en la función `down` escribimos lo siguiente.

```php
$table->dropColumn('avatar');
```

**`Nota:`Elimina el campo `avatar` de la tabla.**

###### Modificar propiedades de los campos

> Añadir dependencia a Composer.

> Typee: en la Consola:

```console
composer require doctrine/dbal
```

> Creamos migración de añadido/modificación

> Typee: en la Consola:

```console
php artisan make:migration cambiar_propiedades_to_users_table
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php` y en la función `up` escribimos lo siguiente.

```php
$table
  ->string('name', 150)
  ->change()
  ->nullable();
```

> Y en la función `down` escribimos lo siguiente.

```php
$table
  ->string('name', 255)
  ->nullable(false)
  ->change();
```

[Subir](#top)

<a name="item7"></a>

## Introducción a Eloquent ORM

###### Crear un modelo

> Typee: en la Consola:

```console
php artisan make:model Curso
```

> Utilizaremos tinker para ejecutar métodos de los modelos desde consola.

> Typee: en la Consola:

```console
php artisan tinker
```

**`Nota:` Para salir de tinker escribimos `exit`.**

###### Agregar un nuevo objeto

> Especificamos el uso del Modelo Curso

> Typee: en la Consola:

```tinker
use App\Models\Curso;
```

> Creamos el Objeto

> Typee: en la Consola:

```tinker
$curso = new Curso;
```

> Llenar las propiedades al Objeto

> Typee: en la Consola:

```tinker
$curso->name = 'Laravel';
$curso->description = 'El mejor framework de PHP';
```

> Llamar al Objeto

> Typee: en la Consola:

```tinker
$curso
```

> Guardar Objeto a la base de datos

> Typee: en la Consola:

```tinker
$curso->save();
```

> Modificar Objeto

> Typee: en la Consola:

```tinker
$curso->description = 'El mejor framework del mundo';
```

###### Cambiar la tabla al modelo

> Abrimos el archivo `Curso.php` en la carpeta `app\Models\Curso.php` y dentro de la clase `curso` escribimos lo siguiente.

```php
    protected $table = "users";
```

[Subir](#top)

<a name="item8"></a>

## Seeders en laravel

> Eliminamos todas la tablas de la base de datos

> Typee: en la Consola:

```console
php artisan migrate:reset
```

> Eliminamos el archivo `XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_cambiar_propiedades_to_users_table.php`.

> Eliminamos el archivo `XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_add_avatar_to_users_table.php`.

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_cursos_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_cursos_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->text('categoria');
```

> Abrimos el archivo `DatabaseSeeder.php` en la carpeta `database\seeders\DatabaseSeeder.php` y en la función `run` escribimos lo siguiente.

```php
$curso = new Curso();
$curso->name = 'Laravel';
$curso->description = 'El mejor Framework PHP';
$curso->categoria = 'Desarrollo Web';
$curso->save();
```

> Importamos el modelo user

```php
use App\Models\Curso;
```

> Typee: en la Consola:

```console
php artisan migrate:fresh
```

###### Ejecutamos los seeders

> Typee: en la Consola:

```console
php artisan db:seed
```

###### Creamos un seeder del Curso

> Typee: en la Consola:

```console
php artisan make:seeder CursoSeeder
```

> Abrimos el archivo `CursoSeeder.php` en la carpeta `database\seeders\CursoSeeder.php` y en la función `run` escribimos lo siguiente.

```php
$curso = new Curso();
$curso->name = 'Laravel';
$curso->description = 'El mejor Framework PHP';
$curso->categoria = 'Desarrollo Web';
$curso->save();
```

> Importamos el modelo user

```php
use App\Models\Curso;
```

> Abrimos el archivo `DatabaseSeeder.php` en la carpeta `database\seeders\DatabaseSeeder.php` y en la función `run` escribimos lo siguiente.

```php
$this->call(CursoSeeder::class);
```

> Typee: en la Consola:

```console
php artisan migrate:fresh --seed
```

**`Notas:` Ejecutamos el refresco de la base de datos y con `--seed` ejecutamos los seeders en la misma sentencia.**

[Subir](#top)

<a name="item9"></a>

## Factory's en laravel

###### Creamos un factory del Curso

> Typee: en la Consola:

```console
php artisan make:factory CursoFactory
```

> Eliminamos el archivo `CursoFactory.php` en la carpeta `database\factories\CursoFactory.php`.

> Indicamos el modelo al crear el factory

> Typee: en la Consola:

```console
php artisan make:factory CursoFactory --model=Curso
```

> Abrimos el archivo `CursoFactory.php` en la carpeta `database\factories\CursoFactory.php` y en la función `definition` dentro del array `return` escribimos lo siguiente.

```php
        'name' => $this->faker->sentence(),
        'description' => $this->faker->paragraph(),
        'categoria' => $this->faker->randomElement(["Desarrollo web", "Diseño web"])
```

**`Nota:` [Tipos de columnas disponibles faker](https://fakerphp.github.io/).**

> Abrimos el archivo `CursoSeeder.php` en la carpeta `database\seeders\CursoSeeder.php` y en la función `run` remplazamos y escribimos lo siguiente.

```php
Curso::factory(50)->create();
```

**`Nota:` También se puede prescindir del archivo `CursoSeeder` si añadimos la instrucción `Curso::factory(50)->create();` en el archivo `DatabaseSeeder.php` y importamos la clase del modelo `use App\Models\Curso;`.**

[Subir](#top)

<a name="item10"></a>

## Generador de Consultas de Eloquent

###### Consultar datos desde Tinker

> Typee: en la Consola:

```console
php artisan tinker
```

> Especificamos el uso del Modelo Curso

> Typee: en la Consola:

```tinker
use App\Models\Curso;
```

> Consultamos todos los registros del modelo Curso

> Typee: en la Consola:

```tinker
$curso = Curso::all();
```

> Consultamos todos los registros que contengan la categoria `Diseño web`.

> Typee: en la Consola:

```tinker
$curso = Curso::where('categoria', 'Diseño web')->orderBy('id', 'desc')->get();
```

**`Note:` Con el parámetro adicional `orderBy` indicamos el orden y con el parámetro `get` hace que lo muestre como una colección de datos.**

> Consultamos un registro que contengan la categoria `Diseño web`.

> Typee: en la Consola:

```tinker
$curso = Curso::where('categoria', 'Diseño web')->orderBy('id', 'asc')->first();
```

> Consultamos por los campos indicados.

> Typee: en la Consola:

```tinker
$curso = Curso::select('name', 'description')->get();
```

> Consultamos por los campos indicados cambiando el nombre de la propiedad.

> Typee: en la Consola:

```tinker
$curso = Curso::select('name as title', 'description')->get();
```

> Consultamos por la cantidad de registros a mostrar.

> Typee: en la Consola:

```tinker
$curso = Curso::select('name as title', 'description')->take(1)->get();
```

> Consultamos por id.

> Typee: en la Consola:

```tinker
$curso = Curso::find(5);
```

> Consultamos por id mayor de que.

> Typee: en la Consola:

```tinker
$curso = Curso::where('id', '>', '45')->get();
```

> Consultamos registros que contenga dicha palabra.

> Typee: en la Consola:

```tinker
$curso = Curso::where('name', 'like', '% voluptate %')->get();
```

[Subir](#top)

<a name="item11"></a>

## Mutadores y Accesores

###### Crear Mutador

> Abrimos el archivo `User.php` en la carpeta `app\Models\User.php` y importamos la clase `Attribute`.

```php
use Illuminate\Database\Eloquent\Casts\Attribute;
```

> Y creamos un método protegido dentro de la clase User.

```php
    protected function name(): Attribute {
        return new Attribute(
            set:function($value){
                return strtolower($value);
            }
        );
    }
```

###### Crear Accesor

> Y creamos un método protegido dentro de la clase User.

```php
    protected function name(): Attribute {
        return new Attribute(
            get:function($value){
                return ucwords($value);
            },
        );
    }
```

**`Nota:` El Mutador actúa antes del ingreso a la base de datos y el Accesor actúa cuando se muestra dicho dato.**

**`Nota:` También podemos usar el método flecha gracias a php8^ `get:fn($value) => ucwords($value)`.**

[Subir](#top)

<a name="item12"></a>

## Crud en laravel

###### Listar y leer registros

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en la función `index` escribimos lo siguiente.

```php
$cursos = Curso::paginate();
return view('cursos.index', compact('cursos'));
```

**`Nota:` Importamos el modelo Curso `use App\Models\Curso;`.**

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\cursos\index.blade.php` y dentro de `@section('content')` escribimos lo siguiente.

```php
    <a href="{{route('cursos.create')}}">Crear Curso</a>
    <ul>
        @foreach ($cursos as $curso)
            <li><a href="{{route('cursos.show', $curso->id)}}">{{$curso->name}}</a></li>
        @endforeach
    </ul>
    {{$cursos->links()}}
```

**`Nota:` Importamos el CDN de `Tailwind`.**

> Abrimos el archivo `plantilla.blade.php` en la carpeta `resources\views\layouts\plantilla.blade.php` y importamos el CDN.

```php
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
```

**`Nota:` Seguimos sin el CDN de `Tailwind`.**

> Crear nombre identificativo a las rutas.

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::get('cursos', 'index')->name('cursos.index');
Route::get('cursos/create', 'create')->name('cursos.create');
Route::get('cursos/{curso}', 'show')->name('cursos.show');
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en la función `show` escribimos lo siguiente.

```php
    public function show($id)
    {
        $curso = Curso::find($id);
        return view('cursos.show', compact('curso'));
    }
```

> Abrimos el archivo `show.blade.php` en la carpeta `resources\views\cursos\show.blade.php` y escribimos lo siguiente.

```php
@section('title', 'Cursos '. $curso->name)

@section('content')
    <h1>Bienvenido al curso {{$curso->name}} </h1>
    <a href="{{route('cursos.index')}}">Volver a Cursos</a>
    <p><strong>Categoria : </strong>{{$curso->categoria}}</p>
    <p>{{$curso->description}}</p>
@endsection
```

###### Agregar registros

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en la función `create` escribimos lo siguiente.

```php
return view('cursos.create');
```

> Creamos el archivo `create.blade.php` en la carpeta `resources\views\cursos\create.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Cursos create ')

@section('content')
    <h1>Bienvenido a la pagina de crear cursos</h1>
    <form action="{{route('cursos.store')}}" method="post">
        @csrf
        <label>
            Nombre :
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        <br>
        <label>
            Descripción :
            <br>
            <textarea name="description" rows="5">{{old('description')}}</textarea>
        </label>
        <br>
        <label>
            Categoria :
            <br>
            <input type="text" name="categoria" value="{{old('categoria')}}">
        </label>
        <br>
        <button type="submit">Enviar Formulario</button>
    </form>
@endsection
```

**`Nota :` Enviar Token `@csrf`.**

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::post('cursos/create', 'store')->name('cursos.store');
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y escribimos lo siguiente.

```php
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();

        return redirect()->route('cursos.show', $curso);
    }
```

> Y cambiamos en la función `index` lo siguiente.

```php
$cursos = Curso::orderBy('id', 'desc')->paginate(10);
```

###### Actualizar registros

> Abrimos el archivo `show.blade.php` en la carpeta `resources\views\cursos\show.blade.php` y añadimos lo siguiente.

```php
<br>
    <a href="{{route('cursos.edit', $curso)}}">Editar Cursos</a>
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y escribimos lo siguiente.

```php
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }
```

> Creamos el archivo `edit.blade.php` en la carpeta `resources\views\cursos\edit.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Cursos edit')

@section('content')
    <h1>Bienvenido a la pagina de editar cursos</h1>
    <form action="{{route('cursos.update', $curso)}}" method="post">
        @csrf
        @method('put')
        <label>
            Nombre :
            <br>
            <input type="text" name="name" value="{{$curso->name}}">
        </label>
        <br>
        <label>
            Descripción :
            <br>
            <textarea name="description" rows="5" >{{$curso->description}}</textarea>
        </label>
        <br>
        <label>
            Categoria :
            <br>
            <input type="text" name="categoria" value="{{$curso->categoria}}">
        </label>
        <br>
        <button type="submit">Editar Formulario</button>
    </form>
@endsection
```

**`Nota :`El método `old` es capaz de guardar el ultimo o incluir datos `{{old('name', $curso->name)}}` .**

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::put('cursos/{curso}', 'update')->name('cursos.update');
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y escribimos lo siguiente.

```php
    public function update(Request $request, Curso $curso)
    {
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show', $curso);
    }
```

###### Validar registros

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en la función `store` escribimos lo siguiente.

```php
$request->validate([
  'name' => 'required|max:10',
  'description' => 'required|min5',
  'categoria' => 'required',
]);
```

> Abrimos el archivo `create.blade.php` en la carpeta `resources\views\cursos\create.blade.php` y añadimos debajo de los `label` lo siguiente.

```php
        @error('name')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        @error('description')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        @error('categoria')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
```

**`Nota :` Repetimos código remplazado lo pertinente o no agregando par el formulario `Edit` .**

**`Nota :` [Lista de validaciones](https://laravel.com/docs/10.x/validation#available-validation-rules).**

###### Traduciendo mensajes de validación

> Typee: en la Consola:

```console
composer require laravel-lang/common
```

**`Nota :` Si tu proyecto no tiene la instalación del lenguaje.**

> Typee: en la Consola:

```console
php artisan lang:add es
```

**`Nota :` Añade a tu proyecto el lenguaje.**

> Typee: en la Consola:

```console
composer install
```

**`Nota :` Para instalar paquetes desde composer.json.**

**`Nota :`[laravel-lang](https://laravel-lang.com/installation/).**

> Abrimos el archivo `app.php` en la carpeta `config\app.php` y en `locale` añadimos lo siguiente.

```php
'locale' => 'es'>
```

###### Eliminar registro

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` añadimos lo siguiente.

```php
Route::delete('cursos/{curso}', 'destroy')->name('cursos.destroy');
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` añadimos lo siguiente.

```php
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
```

> Abrimos el archivo `show.blade.php` en la carpeta `resources\views\cursos\show.blade.php` añadimos lo siguiente.

```php
    <form action="{{route('cursos.destroy', $curso)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Eliminar Curso</button>
    </form>
```

[Subir](#top)

<a name="item13"></a>

## Request en laravel

> Typee: en la Consola:

```console
php artisan make:request StoreCursoRequest
```

> Abrimos el archivo `StoreCursoRequest.php` en la carpeta `app\Http\Requests\StoreCursoRequest.php` y en `authorize` añadimos lo siguiente.

```php
return true;
```

> Y en `rules` escribimos lo siguiente.

```php
            'name' => 'required|max:10',
            'description' => 'required|min:5',
            'categoria' => 'required',
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en `store` eliminamos lo siguiente.

```php
$request->validate([
  'name' => 'required|max:10',
  'description' => 'required|min:5',
  'categoria' => 'required',
]);
```

> Y en `store` cambiamos lo siguiente.

```php
public function store(StoreCursoRequest $request)
```

**`Nota :` Importamos la Clase `use App\Http\Requests\StoreCursoRequest;` .**

> Abrimos el archivo `StoreCursoRequest.php` en la carpeta `app\Http\Requests\StoreCursoRequest.php` y en `authorize` añadimos lo siguiente.

```php
    public function attributes()
    {
        return [
            'name' => 'nombre del curso'
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Debe de ingresar una descripción del curso.'
        ];
    }
```

**`Nota :` Cambiar Atributos y Mensajes desde el Request .**

[Subir](#top)

<a name="item14"></a>

## Asignación Masiva

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en `store` eliminamos lo siguiente.

```php
$curso = new Curso();
$curso->name = $request->name;
$curso->description = $request->description;
$curso->categoria = $request->categoria;
$curso->save();
```

> Y añadimos lo siguiente.

```php
$curso = Curso::create($request->all());
```

> Abrimos el archivo `Curso.php` en la carpeta `app\Models\Curso.php` y dentro de la clase `Curso` añadimos lo siguiente.

```php
    protected $fillable = [
        'name','description','categoria'
    ];
    protected $guarded = ['status'];
```

**`Nota :` Con `$fillable` Añadimos los campos que pueden ser almacenados masivamente y con `$guarded` Excluimos los campos.**

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en `update` eliminamos lo siguiente.

```php
$request->validate([
  'name' => 'required',
  'description' => 'required',
  'categoria' => 'required',
]);

$curso->name = $request->name;
$curso->description = $request->description;
$curso->categoria = $request->categoria;
$curso->save();
```

> Y en `update` cambiamos lo siguiente.

```php
public function update(StoreCursoRequest $request, Curso $curso)
```

**`Nota :` Importamos la Clase `use App\Http\Requests\StoreCursoRequest;` .**

> Y añadimos lo siguiente.

```php
$curso->update($request->all());
```

[Subir](#top)

<a name="item15"></a>

## Agrupar Rutas con Route Resource

> Typee: en la Consola:

```console
php artisan r:l
```

**`Nota :` Lista las ruta de la app.**

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y eliminamos lo siguiente.

```php
Route::controller(CursoController::class)->group(function () {
  Route::get('cursos', 'index')->name('cursos.index');
  Route::get('cursos/create', 'create')->name('cursos.create');
  Route::post('cursos/create', 'store')->name('cursos.store');
  Route::get('cursos/{curso}', 'show')->name('cursos.show');
  Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
  Route::put('cursos/{curso}', 'update')->name('cursos.update');
  Route::delete('cursos/{curso}', 'destroy')->name('cursos.destroy');
});
```

> Y añadimos lo siguiente.

```php
Route::resource('cursos', CursoController::class);
```

**`Nota :` Agrupa las rutas gracias a la convención de los nombres.**

###### Cambiar nombres de sub-rutas utilizando resource

> Abrimos el archivo `AppServiceProvider.php` en la carpeta `app\Providers\AppServiceProvider.php` y en la función `boot` escribimos lo siguiente.

```php
Route::resourceVerbs([
  'create' => 'crear',
  'edit' => 'editar',
]);
```

**`Nota :` Importamos la clase `use Illuminate\Support\Facades\Route;`.**

###### Cambiar nombres de rutas utilizando resource

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::resource('asignaturas', CursoController::class)->names('cursos');
```

###### Cambiar nombres de las variables utilizando resource

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::resource('asignaturas', CursoController::class)
  ->parameter('asignaturas', 'curso')
  ->names('cursos');
```

[Subir](#top)

<a name="item16"></a>

## Url's amigables

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_cursos_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_cursos_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->string('slug');
```

> Abrimos el archivo `CursoFactory.php` en la carpeta `database\factories\CursoFactory.php` y en la función `definition` cambiamos lo siguiente.

```php
$name = $this->faker->sentence();
return [
  'name' => $name,
  'slug' => Str::slug($name, '-'),
  'description' => $this->faker->paragraph(),
  'categoria' => $this->faker->randomElement(['Desarrollo web', 'Diseño web']),
];
```

**`Nota :` Importamos la clase `use Illuminate\Support\Str;`.**

> Typee: en la Consola:

```console
php artisan migrate:fresh --seed
```

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\cursos\index.blade.php` y cambiamos lo siguiente.

```php
<a href="{{route('cursos.show', $curso)}}">{{$curso->name}}</a>
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y en la función `show` cambiamos lo siguiente.

```php
   public function show(Curso $curso)
   {
       return view('cursos.show', compact('curso'));
   }
```

> Abrimos el archivo `Curso.php` en la carpeta `app\Models\Curso.php` y añadimos lo siguiente.

```php
   public function getRouteKeyName()
   {
       return 'slug';
   }
```

**`Nota :` Importante después de añadir `slug` la creación como la actualización del curso no se realizara, se tiene que modificar los métodos `store` y `update`.**

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y añadimos lo siguiente.

> Y en el función `store` escribimos lo siguiente.

```php
$curso = Curso::create(
  $request->all() + ['slug' => Str::slug($request['name'], '-')]
);
```

> Y en el función `update` escribimos lo siguiente.

```php
$curso->update($request->all() + ['slug' => Str::slug($request['name'], '-')]);
```

> Y importamos la clase `use Illuminate\Support\Str;`.

[Subir](#top)

<a name="item17"></a>

## Navegabilidad web

> Abrimos el archivo `plantilla.blade.php` en la carpeta `resources\views\layouts\plantilla.blade.php` y dentro del `head` escribimos lo siguiente.

```php
    <style>
        .active {
            color: red;
            font-weight: bold;
        }
    </style>
```

> Y dentro del `body` escribimos lo siguiente.

```php
   <header>
       <h1>Laravel 10</h1>
       <nav>
           <ul>
               <li>
                   <a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a>
               </li>
               <li>
                   <a href="{{route('cursos.index')}}" class="{{request()->routeIs('cursos.*') ? 'active' : ''}}">Cursos</a>
               </li>
               <li>
                   <a href="{{route('nosotros')}}" class="{{request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a>
               </li>
           </ul>
       </nav>
   </header>
```

**`Nota :` El método `@dump` imprime en pantalla código php y los métodos `request()->routeIs('cursos.index')` determinan si estamos en una vista.**

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('/', HomeController::class)->name('home');
Route::view('nosotros', 'nosotros')->name('nosotros');
```

**`Nota :` El método `view` se utiliza para mostrar una vista que no conecte con la base de datos.**

> Creamos el archivo `nosotros.php` en la carpeta `resources\views\nosotros.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Nosotros')

@section('content')
    <h1>Nosotros</h1>
@endsection
```

###### Trocear Código Blade

> Creamos el archivo `header.blade.php` en la carpeta `resources\views\layouts\partials\header.blade.php` y escribimos lo siguiente.

```php
<header>
        <h1>Laravel 10</h1>
        <nav>
            <ul>
                <li>
                    <a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a>
                    {{-- @dump(request()->routeIs('home')); --}}
                </li>
                <li>
                    <a href="{{route('cursos.index')}}" class="{{request()->routeIs('cursos.*') ? 'active' : ''}}">Cursos</a>
                    {{-- @dump(request()->routeIs('cursos.index')); --}}
                </li>
                <li>
                    <a href="{{route('nosotros')}}" class="{{request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a>
                    {{-- @dump(request()->routeIs('nosotros')); --}}
                </li>
            </ul>
        </nav>
</header>
```

> Abrimos el archivo `plantilla.blade.php` en la carpeta `resources\views\layouts\plantilla.blade.php` y borramos lo siguiente.

```php
<header>
        <h1>Laravel 10</h1>
        <nav>
            <ul>
                <li>
                    <a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a>
                    {{-- @dump(request()->routeIs('home')); --}}
                </li>
                <li>
                    <a href="{{route('cursos.index')}}" class="{{request()->routeIs('cursos.*') ? 'active' : ''}}">Cursos</a>
                    {{-- @dump(request()->routeIs('cursos.index')); --}}
                </li>
                <li>
                    <a href="{{route('nosotros')}}" class="{{request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a>
                    {{-- @dump(request()->routeIs('nosotros')); --}}
                </li>
            </ul>
        </nav>
</header>
```

> Y lo remplazamos por lo siguiente.

```php
@include 'layouts.partials.header';
```

[Subir](#top)

<a name="item18"></a>

## Enviar emails con laravel

> Abrimos el archivo `.env` en la carpeta `/.env` y completamos las siguiente variables.

```php
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS="null"
MAIL_FROM_NAME="${APP_NAME}"
```

**`Nota :` Utilizaremos [mailtrap.io](https://mailtrap.io) para recibir los correos.**

###### Crear un mailable

> Typee: en la Consola:

```console
php artisan make:mail ContactanosMailable
```

> Abrimos el archivo `ContactanosMailable.php` en la carpeta `app\Mail\ContactanosMailable.php` dentro de la función `envelope` y escribimos lo siguiente.

```php
subject = "Información de Contacto",
```

**`Nota :` Asunto del mensaje.**

> Y en la función `content` y escribimos lo siguiente.

```php
view: 'emails.contactanos',
```

**`Nota :` Nueva vista blade .**

> Creamos el archivo `contactanos.blade.php` en la carpeta `resources\views\emails\contactanos.blade.php` y escribimos lo siguiente.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Correo electrónico</h1>
    <p>Este es el primer correo que mandaré por laravel</p>
</body>
</html>
```

> Abrimos el archivo `web` en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('contactanos', function () {
  $correo = new ContactanosMailable();
  Mail::to('ejemplo@ejemplo.com')->send($correo);
  return 'Mensaje enviado';
});
```

> Añadimos las clases

```php
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
```

[Subir](#top)

<a name="item19"></a>

## Formulario de Contacto

> Abrimos el archivo `header.blade.php` en la carpeta `resources\views\layouts\partials\header.blade.php` y escribimos lo siguiente.

```php
<li>
    <a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.*') ? 'active' : ''}}">Contáctanos</a>
</li>
```

> Typee: en la Consola:

```console
php artisan make:controller ContactanosController
```

> Abrimos el archivo `ContactanosController.php` en la carpeta `app\Http\Controllers\ContactanosController.php` y escribimos lo siguiente.

```php
    public function index()
    {
        return view('contactanos.index');
    }
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);
        $correo = new ContactanosMailable($request->all());
        Mail::to('ejemplo@ejemplo.com')->send($correo);
        return redirect()->route('contactanos.index')->with('info', 'Mensaje Enviado');
    }
```

> Añadimos las clases

```php
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y borramos lo siguiente.

```php
Route::get('contactanos', function () {
  $correo = new ContactanosMailable();
  Mail::to('ejemplo@ejemplo.com')->send($correo);
  return 'Mensaje enviado';
});
```

> Y escribimos lo siguiente.

```php
Route::get('contactanos', [ContactanosController::class, 'index'])->name(
  'contactanos.index'
);
```

> Y escribimos lo siguiente.

```php
Route::post('contactanos', [ContactanosController::class, 'store'])->name(
  'contactanos.store'
);
```

> Creamos el archivo `index.blade.php` en la carpeta `resources\views\contactanos\index.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Contactanos')

@section('content')
    <h1>Déjanos un mensaje</h1>
    <form action="{{route('contactanos.store')}}" method="post">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        @error('name')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Correo:
            <br>
            <input type="text" name="correo">
        </label>
        @error('correo')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Mensaje:
            <br>
            <textarea name="mensaje" rows="4"></textarea>
        </label>
        @error('mensaje')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Enviar Mensaje</button>
    </form>
    @if (session('info'))
        <script>
            alert("{{session('info')}}");
        </script>
    @endif
@endsection
```

> Abrimos el archivo `ContactanosMailable.php` en la carpeta `app\Mail\ContactanosMailable.php` y escribimos lo siguiente.

```php
    public $contacto;
    /**
     * Create a new message instance.
     */
    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }
```

> Abrimos el archivo `contactanos.blade.php` en la carpeta `resources\views\emails\contactanos.blade.php` y escribimos lo siguiente.

```php
    <p><strong>Nombre: </strong>{{$contacto['name']}}</p>
    <p><strong>Correo: </strong>{{$contacto['correo']}}</p>
    <p><strong>Mensaje: </strong>{{$contacto['mensaje']}}</p>
```

[Subir](#top)

<a name="item20"></a>

## Kits de inicio

**`Nota:` El kit de inicio [Breeze](https://github.com/Mrrll/Breeze) y el kit de inicio [Jetstream](https://github.com/Mrrll/Jetstream) lo podemos ver desde los links a los repositorios GitHub.**

[Subir](#top)

<a name="item21"></a>

## Implementar Bootstrap

###### Instalación de Bootstrap

> Typee: en la Consola:

```console
npm install bootstrap @popperjs/core
```

> Instalamos Sass

> Typee: en la Consola:

```console
npm install sass --save-dev
```

> Creamos o renombramos la carpeta `css` de `resources\css` a `scss` y creamos o renombramos el archivo `app.css` a `app.scss`.

> Abrimos el archivo `app.scss` de la carpeta `resources\scss\app.scss` y escribimos lo siguiente.

```scss
@import '~bootstrap/scss/bootstrap';
```

> Abrimos el archivo `app.js` de la carpeta `resources\js\app.js` y escribimos lo siguiente.

```js
import * as bootstrap from 'bootstrap'
```

> Abrimos el archivo `vite.config.js` de la carpeta `/` y escribimos lo siguiente.

```js
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import path from 'path'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/scss/app.scss', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
    },
  },
})
```

> Abrimos el archivo `plantilla.blade.php` de la carpeta `resources\views\layouts\plantilla.blade.php/` y dentro del `head` escribimos lo siguiente.

```php
@vite(['resources/scss/app.scss', 'resources/js/app.js']);
```

> Podemos inicializar los servidores Frontend y Backend

> Typee: en la Consola:

```console
php artisan serve
npm run dev
```

**`Nota :` Agradecimientos por el aporte y información a `Kim Hallberg` por su tutorial [Como usar bootstrap con laravel y vite](https://devdojo.com/thinkverse/how-to-use-bootstrap-with-laravel-and-vite).**

###### Ejemplo de modificación de vistas con Bootstrap

> Abrimos el archivo `AppServiceProvider.php` de la carpeta `app\Providers\AppServiceProvider.php` y dentro del `boot` escribimos lo siguiente.

```php
Paginator::useBootstrap();
```

> Y importamos la clase `Paginator`.

```php
use Illuminate\Pagination\Paginator;
```

**`Nota :` Agradecimientos por el aporte y información a `codeanddeploy` por su tutorial [Laravel 9 Pagination Example using Bootstrap 5](https://codeanddeploy.com/blog/laravel/laravel-8-pagination-example-using-bootstrap-5).**

> Abrimos el archivo `header.blade.php` de la carpeta `resources\views\layouts\partials\header.blade.php` y modificamos la etiqueta `nav` escribimos lo siguiente.

```php
<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Laravel 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cursos.*') ? 'active' : '' }}" href="{{ route('cursos.index') }}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item {{ route('contactanos.index') }}">
                        <a class="nav-link {{ request()->routeIs('contactanos.*') ? 'active' : '' }}" href="{{ route('contactanos.index') }}">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
```

> Abrimos el archivo `index.blade.php` de la carpeta `resources\views\cursos\index.blade.php` y escribimos lo siguiente.

```php
    <main class="container">
        <h1>Bienvenido a la pagina cursos</h1>
        <a class="btn btn-success" href="{{ route('cursos.create') }}">Crear Curso</a>
        <ul>
            @foreach ($cursos as $curso)
                <li>
                    <a href="{{ route('cursos.show', $curso) }}">{{ $curso->name }}</a>
                </li>
            @endforeach
        </ul>
        {{ $cursos->links() }}
    </main>
```

> Abrimos el archivo `index.blade.php` de la carpeta `resources\views\contactanos\index.blade.php` y escribimos lo siguiente.

```php
    <main class="container center_container">
        <div class="card" style="width: 18rem;">
            <form action="{{ route('contactanos.store') }}" method="post">
                <div class="card-header text-center">
                    <h5>Déjanos un mensaje</h5>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-0">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Iñigo Casper" name="name">
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Correo:</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="correo">
                        @error('correo')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Mensaje:</label>
                        <textarea class="form-control" rows="3" name="mensaje"></textarea>
                        @error('mensaje')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </div>
            </form>
        </div>
    </main>
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Enviado!</strong> Su email a sido enviado con éxito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
```

> Creamos el archivo `form.blade.php` de la carpeta `resources\views\cursos\partials\form.blade.php` y escribimos lo siguiente.

```php
<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'cursos.edit' ? 'Editar curso' : 'Crear curso' }}
        </h5>
    </div>
    <div class="card-body">
        <div class="mb-0">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" placeholder="Html 5"
                value="{{ Route::currentRouteName() == 'cursos.edit' ? old('name', $curso->name) : old('name') }}" name="name">
            @error('name')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" rows="3" name="description"> {{ Route::currentRouteName() == 'cursos.edit' ? old('description', $curso->description) : old('description') }}</textarea>
            @error('description')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Categoria:</label>
            <input type="text" class="form-control" placeholder="Desarrollo web"
                value="{{ Route::currentRouteName() == 'cursos.edit' ? old('categoria', $curso->categoria) : old('categoria') }}" name="categoria">
            @error('categoria')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'cursos.edit' ? 'Editar Curso' : 'Crear Curso' }}</button>
    </div>
</div>
```

> Abrimos el archivo `edit.blade.php` de la carpeta `resources\views\cursos\edit.blade.php` y escribimos lo siguiente.

```php
    <main class="container center_container container-float">
        <a class="btn btn-success btn-float btn-position-top-0-left-0 m-2" href="{{route('cursos.show', $curso)}}">Volver</a>
        <form action="{{route('cursos.update', $curso)}}" method="post">
            @csrf
            @method('put')
            @include('cursos.partials.form')
        </form>
    </main>
```

> Abrimos el archivo `create.blade.php` de la carpeta `resources\views\cursos\create.blade.php` y escribimos lo siguiente.

```php
    <main class="container center_container container-float">
        <a class="btn btn-success btn-float btn-position-top-0-left-0 m-2" href="{{ route('cursos.index') }}">Volver</a>
        <form action="{{route('cursos.store')}}" method="post">
            @csrf
            @include('cursos.partials.form')
        </form>
    </main>
```

> Abrimos el archivo `show.blade.php` de la carpeta `resources\views\cursos\show.blade.php` y escribimos lo siguiente.

```php
    <main class="container">
        <h1>Bienvenido al curso {{$curso->name}} </h1>
        <a class="btn btn-success ml-2" href="{{route('cursos.index')}}">Volver a Cursos</a>
        <a class="btn btn-warning" href="{{route('cursos.edit', $curso)}}">Editar Cursos</a>
        <p><strong>Categoria : </strong>{{$curso->categoria}}</p>
        <p>{{$curso->description}}</p>
        <form action="{{route('cursos.destroy', $curso)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Eliminar Curso</button>
        </form>
    </main>
```

> Creamos el archivo `footer.blade.php` de la carpeta `resources\views\layouts\partials\footer.blade.php` y escribimos lo siguiente.

```php
<footer class="bg-light text-center text-lg-start border-top">
  <div class="text-center p-3">
    © 2023 Copyright:
    <a class="text-dark" href="#">Un Footer</a>
  </div>
</footer>
```

> Abrimos o creamos el archivo `app.css` de la carpeta `resources\css\app.css` y escribimos lo siguiente.

```css
.center_container {
  display: flex;
  align-items: center;
  justify-content: center;
}
body {
  display: grid;
  min-height: 100vh;
  grid-template-rows: auto 1fr auto;
}
.container-float {
  position: relative;
}
.btn-float {
  position: absolute;
}
.btn-position-top-0-left-0 {
  top: 0;
  left: 0;
}
```

> Abrimos `app.scss` de la carpeta `resources\scss\app.scss` y escribimos lo siguiente.

```scss
@import '/resources/css/app.css';
```

[Subir](#top)

<a name="item22"></a>

## Componentes Blade

> Typee: en la Consola:

```console
php artisan make:component Alert
```

> Abrimos el archivo `ContactanosController.php` de la carpeta `app\Http\Controllers\ContactanosController.php` y modificamos lo siguiente.

```php
return redirect()
  ->route('contactanos.index')
  ->with('success', 'Mensaje Enviado');
```

> Abrimos el archivo `index.blade.php` de la carpeta `resources\views\contactanos\index.blade.php` y modificamos lo siguiente.

```php
    @php
    $type = 'success';
    @endphp
    @if (session('success'))
        <x-alert :type="$type">
            <x-slot name="title">
                Enviado!
            </x-slot>
            Su mensaje a sido enviado con éxito.
        </x-alert>
    @endif
```

> Abrimos el archivo `alert.blade.php` de la carpeta `resources\views\components\alert.blade.php` y escribimos lo siguiente.

```php
<div {{ $attributes->merge(['class' => "alert $clases alert-dismissible fade show"]) }} role="alert">
    <strong>{{ $title }}</strong> {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
```

> Abrimos el archivo `Alert.php` de la carpeta `app\View\Components\Alert.php` y escribimos lo siguiente.

```php
    public $clases;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'info') // Pasar Atributos
    {
        switch ($type) {
         case 'info':
             $clases = 'alert-info';
             break;
         case 'success':
             $clases = 'alert-success';
             break;
         case 'warning':
             $clases = 'alert-warning';
             break;
         case 'danger':
             $clases = 'alert-danger';
             break;
         default:
             # code...
             break;
        }
        $this->clases = $clases;
    }
```

[Subir](#top)

<a name="item23"></a>

## Middleware

> Abrimos el archivo `web.php` de la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('prueba', function () {
  return 'Has accedido correctamente a esta ruta';
});
Route::get('no-autorizado', function () {
  return 'Usted no es mayor de edad';
});
```

> Typee: en la Consola:

```console
php artisan make:middleware CheckAge
```

**`Nota :`Registrar middleware en nuestra app.**

> Abrimos el archivo `Kernel.php` de la carpeta `app\Http\Kernel.php` y en la sección `protected $middlewareAliases` escribimos lo siguiente.

```php
'age' => \App\Http\Middleware\CheckAge::class,
```

> Abrimos el archivo `web.php` de la carpeta `routes\web.php` y modificamos lo siguiente.

```php
Route::get('prueba', function () {
  return 'Has accedido correctamente a esta ruta';
})->middleware('age');
```

> Abrimos el archivo `CheckAge.php` de la carpeta `app\Http\Middleware\CheckAge.php` y en la función `handle` escribimos lo siguiente.

```php
if ($request->age >= 18) {
  return $next($request);
} else {
  return redirect('no-autorizado');
}
```

[Subir](#top)

<a name="item24"></a>

## Autentificación

###### Registro del usuario

> Creamos el archivo `register.blade.php` de la carpeta `resources\views\auth\register.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')
@section('title', 'Sign Up')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{ session('message')['message'] }}
            </x-alert>
        @endif
        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Registro</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Username:</label>
                        <input type="text" class="form-control" placeholder="User Name" value="{{ old('name') }}"
                            name="name">
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@example.com"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="pass1">
                        @error('password')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Repite Password:</label>
                        <input type="password" class="form-control" id="pass2">
                        <div id="pass2message" class="d-none invalid">
                            <small>*Los passwords no coinciden.</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </main>
@endsection
```

> Creamos el archivo `RegisterController.php`.

> Typee: en la Consola:

```console
php artisan make:controller Auth/RegisterController
```

> Abrimos el archivo `RegisterController.php` de la carpeta `app\Http\Controllers\Auth\RegisterController.php` y dentro de la clase escribimos lo siguiente.

```php
    public function index()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            event(new Registered($user)); // ! Comentar esta linea hasta que se configure la validación de email.

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('cursos.index');
            }
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' =>
                    'Ha ocurrido un error revise los datos y vuelva a intentarlo si no se soluciona contacte con su administrador.',
            ]);
        }
    }
```

> Y importamos las clases

```php
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
```

> Creamos el archivo `RegisterRequest.php`.

> Typee: en la Consola:

```console
php artisan make:request RegisterRequest
```

> Abrimos el archivo `RegisterRequest.php` de la carpeta `app\Http\Requests\RegisterRequest.php` y dentro de la función `authorize` lo cambiamos.

```php
return true;
```

> Y dentro de la función `rules` escribimos lo siguiente.

```php
return [
  'name' => 'required',
  'email' => 'required|email|unique:users,email',
  'password' => 'required',
];
```

> Abrimos el archivo `web.php` de la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::resource('register', RegisterController::class);
```

> Creamos el archivo `interface.js` de la carpeta `resources\js\interface.js` y escribimos lo siguiente.

```js
let $password1 = document.getElementById('pass1')
let $password2 = document.getElementById('pass2')
let $pass2message = document.getElementById('pass2message')
let timeout

if ($password2 != null) {
  $password2.addEventListener('keydown', () => {
    clearTimeout(timeout)
    timeout = setTimeout(() => {
      if ($password1.value == $password2.value) {
        $pass2message.classList.replace('d-block', 'd-none')
      } else {
        $pass2message.classList.replace('d-none', 'd-block')
      }
      clearTimeout(timeout)
    }, 1000)
  })
}
```

> Abrimos el archivo `app.js` de la carpeta `resources\js\app.js` y escribimos lo siguiente.

```js
import './interface'
```

> Abrimos o creamos el archivo `app.css` de la carpeta `resources\css\app.css` y escribimos lo siguiente.

```css
.invalid {
  color: red;
}
```

###### Acceso y cierre de sesión del usuario

> Creamos el archivo `login.blade.php` de la carpeta `resources\views\auth\login.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')
@section('title', 'Sign In')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{ session('message')['message'] }}
            </x-alert>
        @endif
        <form action="{{ route('login.authenticate') }}" method="post">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Acceso</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@example.com"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Password: <small class="text-primary">
                            <a href="{{ route('password.request') }}">Has olvidado tu contraseña?</a>
                        </small></label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="form-check form-switch d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="remember">
                        <label class="form-check-label ms-1" for="flexSwitchCheckDefault">Acuérdate de mí !!!</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Access</button>
                </div>
            </div>
        </form>
    </main>
@endsection
```

> Creamos el archivo `LoginController.php`.

> Typee: en la Consola:

```console
php artisan make:controller Auth/LoginController
```

> Abrimos el archivo `LoginController.php` de la carpeta `app\Http\Controllers\Auth\LoginController.php` y dentro de la clase escribimos lo siguiente.

```php
    public function index()
    {
        return view('auth.login');
    }
    public function Authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('cursos.index');
        }
        return redirect()
            ->route('login')
            ->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => 'Las credenciales son incorrectas!!!',
            ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
```

> Y importamos las clases

```php
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
```

> Creamos el archivo `LoginRequest.php`.

> Typee: en la Consola:

```console
php artisan make:request LoginRequest
```

> Abrimos el archivo `LoginRequest.php` de la carpeta `app\Http\Requests\LoginRequest.php` y dentro de la función `authorize` lo cambiamos.

```php
return true;
```

> Y dentro de la función `rules` escribimos lo siguiente.

```php
return [
  'email' => 'required|email',
  'password' => 'required',
];
```

> Abrimos el archivo `web.php` de la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::controller(LoginController::class)->group(function () {
  Route::get('login', 'index')->name('login');
  Route::post('login', 'Authenticate')->name('login.authenticate');
});
```

> Y Protegemos las rutas que necesiten autentificación.

```php
Route::group(
  ['middleware' => ['auth', 'auth.session', 'verified']],
  function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('cursos', CursoController::class);
  }
);
```

> Abrimos el archivo `header.blade.php` de la carpeta `resources\views\layouts\partials\header.blade.php` y escribimos lo siguiente.

```php
<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Laravel 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-lg justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cursos.*') ? 'active' : '' }}" href="{{ route('cursos.index') }}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item {{ route('contactanos.index') }}">
                        <a class="nav-link {{ request()->routeIs('contactanos.*') ? 'active' : '' }}" href="{{ route('contactanos.index') }}">Contáctanos</a>
                    </li>
                </ul>
                <hr class="hidden-lg">
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('logout') }}">Cerrar Sesión</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login.*') ? 'active' : '' }}" aria-current="page" href="{{ route('login') }}">Acceso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register.*') ? 'active' : '' }}" href="{{ route('register.index') }}">Registrarse</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
```

###### Verificación de email

**`Nota :` No se va a poder enviar ningún email antes de configurar las rutas también debe de haber configurado las credenciales de email en el archivo `.env` .**

> Creamos el archivo `verify-email.blade.php` de la carpeta `resources\views\auth\verify-email.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')
@section('title', 'Email verify')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{ session('message')['message'] }}
            </x-alert>
        @endif
        <div class="alert alert-warning" role="alert">
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <h4 class="alert-heading">Verificar email!</h4>
                <p><strong>Se le ha enviado un mensaje a su correo electrónico revise bandeja de entrada!</strong> Usted
                    debe de estar <strong>verificado</strong>, para que pueda visualizar el contenido de este sitio web,
                    pudiendo acceder a los artículos, contenidos exclusivos y las ventajas para nuestros usuarios, Usted
                    esta a un solo paso de poder disfrutar de una experiencia única,<strong> Adelante !!</strong></p>
                <hr>
                <p class="mb-0">Si el mensaje no le ha llegado asegúrese de que no este en la <strong>bandeja de spam</strong>, si no haga click en el siguiente botón y <strong>verifique su email</strong>. Tenga en cuenta que el enlace del mensaje caducara en 60 minutos. <button class="btn btn-warning"type="submit">Enviar mensaje de verificación</button></p>
            </form>
        </div>
    </main>
@endsection
```

> Abrimos el archivo `web.php` de la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})
  ->middleware('auth')
  ->name('verification.notice');

Route::get('/email/verification', function (EmailVerificationRequest $request) {
  $request->fulfill();
  return redirect('cursos');
})
  ->middleware(['auth', 'signed'])
  ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  try {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', [
      'type' => 'success',
      'title' => 'Éxito !',
      'message' =>
        'Enlace de verificación a sido enviado correctamente!!! Revise su bandeja de entrada.',
    ]);
  } catch (\Throwable $th) {
    return back()->with('message', [
      'type' => 'danger',
      'title' => 'Error !',
      'message' =>
        'Ha ocurrido un error revise los datos y vuelva a intentarlo si no se soluciona contacte con su administrador.',
    ]);
  }
})
  ->middleware(['auth', 'throttle:6,1'])
  ->name('verification.send');
```

> Y importamos las clases.

```php
use Illuminate\Http\Request;
use App\Http\Requests\EmailVerificationRequest;
```

> Creamos el archivo `EmailVerificationRequest.php`.

> Typee en consola:

```php
php artisan make:request EmailVerificationRequest
```

> Creamos el archivo `EmailVerificationRequest.php` de la carpeta `app\Http\Requests\EmailVerificationRequest.php` y escribimos lo siguiente.

```php
<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class EmailVerificationRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (
      !hash_equals(
        (string) $this->user()->getKey(),
        (string) $this->query('id')
      )
    ) {
      return false;
    }

    if (
      !hash_equals(
        sha1($this->user()->getEmailForVerification()),
        (string) $this->query('hash')
      )
    ) {
      return false;
    }

    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
        //
      ];
  }

  /**
   * Fulfill the email verification request.
   *
   * @return void
   */
  public function fulfill()
  {
    if (!$this->user()->hasVerifiedEmail()) {
      $this->user()->markEmailAsVerified();

      event(new Verified($this->user()));
    }
  }

  /**
   * Configure the validator instance.
   *
   * @param  \Illuminate\Validation\Validator  $validator
   * @return void
   */
  public function withValidator(Validator $validator)
  {
    return $validator;
  }
}
```

**`Nota :` Este archivo no debería de haberlo ni creado ni modificado pero la solicitud http que llegaba a la ruta no me reconocía los datos enviados por alguna forma que no logro entender ya que debería de funcionar sin tener que modificarlo.**

> Abrimos el archivo `User.php` de la carpeta `app\Models\User.php` en la función `authorize` y escribimos lo siguiente.

```php
class User extends Authenticatable implements MustVerifyEmail
```

```php
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
```

> Y importamos la clase.

```php
use Illuminate\Contracts\Auth\MustVerifyEmail;
```

###### Reset de la password del usuario.

> Creamos el archivo `forgot-password.blade.php` de la carpeta `resources\views\auth\forgot-password.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')
@section('title', 'Forgot Password')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{session('status')}}
            </x-alert>
        @endif
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Forgot Password</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@example.com"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </main>
@endsection
```

> Creamos el archivo `reset-password.blade.php` de la carpeta `resources\views\auth\reset-password.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')
@section('title', 'Reset Password')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{ session('message')['message'] }}
            </x-alert>
        @endif
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Reset Password</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@example.com"
                            value="{{ old('email', $email) }}" name="email">
                        @error('email')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="pass1">
                        @error('password')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Repite Password:</label>
                        <input type="password" class="form-control" id="pass2" name="password_confirmation">
                        <div id="pass2message" class="d-none invalid">
                            <small>*Los passwords no coinciden.</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </main>
@endsection
```

> Abrimos el archivo `web.php` de la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('/forgot-password', function () {
  return view('auth.forgot-password');
})
  ->middleware('guest')
  ->name('password.request');

Route::post('/forgot-password', function (Request $request) {
  $request->validate(['email' => 'required|email']);

  $status = Password::sendResetLink($request->only('email'));

  return $status === Password::RESET_LINK_SENT
    ? back()->with([
      'status' => __($status),
      'message' => [
        'type' => 'success',
        'title' => 'Éxito !',
      ],
    ])
    : back()->withErrors(['email' => __($status)]);
})
  ->middleware('guest')
  ->name('password.email');

Route::get('/reset-password/{token}', function (
  Request $request,
  string $token
) {
  return view('auth.reset-password', [
    'token' => $token,
    'email' => (string) $request->query('email'),
  ]);
})
  ->middleware('guest')
  ->name('password.reset');

Route::post('/reset-password', function (Request $request) {
  $request->validate([
    'token' => 'required',
    'email' => 'required|email',
    'password' => 'required|confirmed',
  ]);
  $status = Password::reset(
    $request->only('email', 'password', 'password_confirmation', 'token'),
    function (User $user, string $password) {
      $user
        ->forceFill([
          'password' => Hash::make($password),
        ])
        ->setRememberToken(Str::random(60));

      $user->save();

      event(new PasswordReset($user));
    }
  );

  return $status === Password::PASSWORD_RESET
    ? redirect()
      ->route('login')
      ->with('status', __($status))
    : back()->withErrors(['email' => [__($status)]]);
})
  ->middleware('guest')
  ->name('password.update');
```

> Y importamos las clases.

```php
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
```

[Subir](#top)

<a name="item25"></a>

## Notificaciones

###### Generación de notificaciones

> Typee: en la Consola:

```console
php artisan make:notification NewRegistered
```

> Abrimos el archivo `NewRegistered.php` en la carpeta `app\Notifications\NewRegistered.php` en la función `` y escribimos lo siguiente.

```php
return (new MailMessage())
  ->view('plantilla.blade', ['datos' => 'paso de datos'])
  ->subject(Lang::get('Welcome'))
  ->greeting(Lang::get('Hello!'))
  ->line(Lang::get('The introduction to the notification.'))
  ->action(Lang::get('Notification Action'), url('/'))
  ->line(Lang::get('Thank you for using our application!'))
  ->lineIf($this->amount > 0, "Amount paid: {$this->amount}")
  ->error()
  ->from('barrett@example.com', 'Barrett Blair');
```

> Abrimos el archivo `es.json` en la carpeta `lang\es.json` en la función `` y añadimos lo siguiente.

```json
    "Welcome": "Bienvenido",
    "The introduction to the notification.": "La introducción a la notificación.",
    "Notification Action": "Acción de notificación",
    "Thank you for using our application!": "¡Gracias por usar nuestra aplicación!"
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::get('notificacion', function () {
  $user->notify(new NewRegistered());
  return 'Mensaje enviado!';
});
```

###### Personalización de las plantillas

> Typee: en la Consola:

```console
php artisan vendor:publish --tag=laravel-notifications
```

**`Nota :` Una vez ejecutado la instrucción de arriba, se nos habrá creado una carpeta y encontraremos un archivo llamado `email.blade.php` en la carpeta `resources\views\vendor\notifications\email.blade.php` en este archivo podremos modificar la plantilla entera si borramos todo su contenido y creamos el nuestro propio.**

###### Personalización de los componentes

> Typee: en la Consola:

```console
php artisan vendor:publish --tag=laravel-mail
```

**`Nota :` Una vez ejecutado la instrucción de arriba, se nos habrá creado una carpeta y encontraremos varios archivos en la carpeta `resources\views\vendor\mail\html\` en estos archivo podremos modificar los componentes de la plantilla anterior.**

**`Nota :` Los cambios que realicemos afectaran a todos las notificaciones que enviemos por el método `toMail` siempre que no indiquemos una vista en la creación en `new MailMessage`.**

[Subir](#top)

<a name="item26"></a>

## Relación uno a uno (One To One)

###### Creamos la tabla Profiles

> Typee: en la Consola:

```console
php artisan make:migration create_profiles_table
```

###### Creamos el modelo Profile

> Typee: en la Consola:

```console
php artisan make:model Profile
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_profiles_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_profiles_table.php` en la función `up` y escribimos lo siguiente.

```php
Schema::create('profiles', function (Blueprint $table) {
  $table->id();
  $table->string('title', 45);
  $table->text('biography');
  $table->string('website', 45);

  $table->unsignedBigInteger('user_id')->unique();
  $table
    ->foreign('user_id')
    ->references('id')
    ->on('users')
    ->onDelete('cascade')
    ->onUpdate('cascade');

  $table->timestamps();
});
```

> Typee: en la Consola:

```console
php artisan migrate
```

> Abrimos el archivo `User.php` en la carpeta `app\Models\User.php` y añadimos lo siguiente.

```php
    // Relación uno a uno
    public function profile()
    {
        // $profile = Profile::where('user_id', $this->id)->first();
        // return $profile;
        // $profile = Profile::where('foreing_key', $this->local_key)->first();
        // return $this->hasOne('App\Models\Profile', 'foreing_key', 'local_key' );
        return $this->hasOne(Profile::class);
    }
```

> Abrimos el archivo `Profile.php` en la carpeta `app\Models\Profile.php` y añadimos lo siguiente.

```php
    // Relación uno a uno (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
```

> Para acceder a perfil y viceversa.

```php
$user = User::find(1); // Buscamos el usuario cuyo id sea 1
$user->profile; // Y accedemos al perfil del usuario.
$profile = Profile::find(1); // Buscamos el perfil cuyo id sea 1
$profile->user; // Y accedemos al usuario del perfil.
```

[Subir](#top)

<a name="item27"></a>

## Interfaz Perfil de usuario

###### Creamos Controlador Profile

> Typee: en la Consola:

```console
php artisan make:controller ProfileController
```

###### Creamos Request Profile

> Typee: en la Consola:

```console
php artisan make:request ProfileRequest
```

> Abrimos el archivo `ProfileRequest` de la carpeta `app\Http\Requests\ProfileRequest.php` y en la función `authorize` cambiamos lo siguiente.

```php
if ($this->user_id == auth()->user()->id) {
  return true;
} else {
  return false;
}
```

> Y en la función `rules` escribimos lo siguiente.

```php
return [
  'title' => 'required|max:45',
  'biography' => 'required|min:5',
  'website' => 'required|max:45',
];
```

> Creamos el archivo `profile.blade.php` en la carpeta `resources\views\users\profile.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Perfil de Usuario')

@section('content')
    <main class="container center_container flex-column">
        @include('layouts.components.alert')
         @php
            if (empty($profile)) {
                $profile = '';
            }
        @endphp
        <form action="{{ request()->routeIs('profile.crate') ? route('profile.store') : route('profile.update', $profile)}}" method="post">
            @csrf
            @if (request()->routeIs('profile.edit'))
                @method('put')
            @endif
            @include('users.partials.form_profile')
        </form>
    </main>
@endsection
```

> Creamos el archivo `alert.blade.php` en la carpeta `resources\views\layouts\components\alert.blade.php` y escribimos lo siguiente.

```php
@if (session('message'))
    <x-alert class="m-2" type="{{ session('message')['type'] }}">
        <x-slot name="title">
            {{ session('message')['title'] }}
        </x-slot>
        {{ session('message')['message'] }}
    </x-alert>
@endif
```

> Creamos el archivo `form_profile.blade.php` en la carpeta `resources\views\users\partials\form_profile.blade.php` y escribimos lo siguiente.

```php
<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'profile.edit' ? 'Editar perfil' : 'Crear perfil' }}
        </h5>
    </div>
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="card-body">
        <div class="mb-0">
            <label class="form-label">Titulo:</label>
            <input type="text" class="form-control" placeholder="Diseñador"
                value="{{ Route::currentRouteName() == 'profile.edit' ? old('title', $profile->title) : old('title') }}" name="title">
            @error('title')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Biografia:</label>
            <textarea class="form-control" rows="3" name="biography"> {{ Route::currentRouteName() == 'profile.edit' ? old('biography', $profile->biography) : old('biography') }}</textarea>
            @error('biography')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Sitio web:</label>
            <input type="text" class="form-control" placeholder="Desarrollo web"
                value="{{ Route::currentRouteName() == 'profile.edit' ? old('website', $profile->website) : old('website') }}" name="website">
            @error('website')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'profile.edit' ? 'Editar Perfil' : 'Crear Perfil' }}</button>
    </div>
</div>
```

> Abrimos el archivo `header.blade.php` en la carpeta `resources\views\layouts\partials\header.blade.php` y re-escribimos.

```php
@php
    $links_pages = [
        [
            'name' => 'Home',
            'route' => route('home'),
            'active' => request()->routeIs('home') ? 'active disabled' : '',
        ],
        [
            'name' => 'Cursos',
            'route' => route('cursos.index'),
            'active' => request()->routeIs('cursos.*') ? 'active' : '',
        ],
        [
            'name' => 'Nosotros',
            'route' => route('nosotros'),
            'active' => request()->routeIs('nosotros') ? 'active disabled' : '',
        ],
        [
            'name' => 'Contáctanos',
            'route' => route('contactanos.index'),
            'active' => request()->routeIs('contactanos.*') ? 'active disabled' : '',
        ],
    ];
    $links_users = [
        [
            'name' => 'Perfil',
            'route' => ! empty( auth()->user()->profile) ? route('profile.edit', auth()->user()->profile) : route('profile.create'),
            'active' => request()->routeIs('profile.*') ? 'active disabled' : '',
        ],
        [
            'name' => 'Cerrar Sesión',
            'route' => route('logout'),
            'active' => '',
        ],
    ];
    $links_auths = [
        [
            'name' => 'Acceso',
            'route' => route('login'),
            'active' => request()->routeIs('login') ? 'active disabled' : '',
        ],
        [
            'name' => 'Registrarse',
            'route' => route('register.index'),
            'active' => request()->routeIs('register.*') ? 'active disabled' : '',
        ],
    ];
@endphp
<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Laravel 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-lg justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach ($links_pages as $link_page)
                        <li class="nav-item">
                            <a class="nav-link {{ $link_page['active'] }}" aria-current="page"
                                href="{{ $link_page['route'] }}">{{ $link_page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <hr class="hidden-lg">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-link d-none d-lg-block">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-display="static"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($links_users as $link_user)
                                    <li class="nav-item">
                                        <a href="{{ $link_user['route'] }}"
                                            class="nav-link dropdown-item {{ $link_user['active'] }}">{{ $link_user['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <ul class="navbar-nav d-lg-none">
                            @foreach ($links_users as $link_user)
                                <li class="nav-item">
                                    <a class="nav-link {{ $link_user['active'] }}" aria-current="page"
                                        href="{{ $link_user['route'] }}">{{ $link_user['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        @foreach ($links_auths as $link_auth)
                            <li class="nav-item">
                                <a class="nav-link {{ $link_auth['active'] }}" aria-current="page"
                                    href="{{ $link_auth['route'] }}">{{ $link_auth['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
```

> Abrimos el archivo `Profile.php` en la carpeta `app\Models\Profile.php` y añadimos lo siguiente.

```php
    protected $fillable = [
        'title',
        'biography',
        'website',
    ];
```

> Abrimos el archivo `ProfileController.php` en la carpeta `app\Http\Controllers\ProfileController.php` y añadimos lo siguiente.

```php
    public function create()
    {
        return view('users.profile');
    }
    public function store(ProfileRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $profile = new Profile($request->all());
            $user->profile()->save($profile);
            return redirect()
                ->route('profile.edit')
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El perfil a sido guardado correctamente.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function edit()
    {
        $profile = auth()->user()->profile;
        return view('users.profile', compact('profile'));

    }
    public function update(ProfileRequest $request)
    {
        try {
            $profile->update($request->all());
            return back()->with('message', [
                'type' => 'success',
                'title' => 'Éxito !',
                'message' => 'El perfil a sido actualizado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` en la grupo de rutas protegidas `['middleware' => ['auth', 'auth.session', 'verified']]` y añadimos lo siguiente

```php
Route::resource('profile', ProfileController::class)->except([
  'index',
  'show',
  'destroy',
]);
```

[Subir](#top)

<a name="item28"></a>

## Relación uno a muchos (One To Many)

###### Creación del modelo Category y la migración categories

> Typee: en la Consola:

```console
php artisan make:model Category -m
```

**`Nota :` Podemos crear una Migración,Controlador,Seeder,Factory `-mcsf` y para crear todo `-a`.**

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_categories_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_categories_table.php` en la función `up` y añadimos lo siguiente.

```php
Schema::create('categories', function (Blueprint $table) {
  $table->id();
  $table->string('name', 45)->unique();
  $table->timestamps();
});
```

###### Creación del modelo Post y la migración Posts

> Typee: en la Consola:

```console
php artisan make:model Post -m
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_posts_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_posts_table.php` en la función `up` y añadimos lo siguiente.

```php
Schema::create('posts', function (Blueprint $table) {
  $table->id();
  $table->string('name');
  $table->string('slug')->unique();
  $table->text('body');
  $table->unsignedBigInteger('user_id')->nullable();
  $table->unsignedBigInteger('category_id')->nullable();
  $table
    ->foreign('user_id')
    ->references('id')
    ->on('users')
    ->onDelete('set null');
  $table
    ->foreign('category_id')
    ->references('id')
    ->on('categories')
    ->onDelete('set null');
  $table->timestamps();
});
```

> Abrimos el archivo `User.php` en la carpeta `app\Models\User.php` y añadimos lo siguiente.

```php
    // Relación uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
```

> Abrimos el archivo `Post.php` en la carpeta `app\Models\Post.php` y añadimos lo siguiente.

```php
    // Relación uno a muchos (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
```

> Abrimos el archivo `Category.php` en la carpeta `app\Models\Category.php` y añadimos lo siguiente.

```php
    // Relación uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
```

> Abrimos el archivo `Post.php` en la carpeta `app\Models\Post.php` y añadimos lo siguiente.

```php
    // Relación uno a muchos (inversa)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
```

> Y añadimos lo siguiente.

```php
    protected $guarded = [];

    // Buscar modelo por el campo slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
```

> Typee: en la Consola:

```console
php artisan migrate
```

###### Creación del modelo Vídeo y la migración Vídeos

> Typee: en la Consola:

```console
php artisan make:model Video -m
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_videos_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_videos_table.php` en la función `up` y escribimos lo siguiente.

```php
Schema::create('videos', function (Blueprint $table) {
  $table->id();
  $table->string('name', 45);
  $table->text('description');
  $table->string('url', 45);
  $table->unsignedBigInteger('user_id')->nullable();
  $table
    ->foreign('user_id')
    ->references('id')
    ->on('users')
    ->onDelete('set null');
  $table->timestamps();
});
```

> Abrimos el archivo `User.php` en la carpeta `app\Models\User.php` y añadimos lo siguiente.

```php
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
```

> Abrimos el archivo `Video.php` en la carpeta `app\Models\Video.php` y añadimos lo siguiente.

```php
    protected $guarded = [];

    // Buscar modelo por el campo slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Relación uno a muchos (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
```

> Typee: en la Consola:

```console
php artisan migrate
```

[Subir](#top)

<a name="item29"></a>

## Interfaz Posts

###### Creamos seeder de categorías

> Typee: en la Consola:

```console
php artisan make:seeder CategoriesSeeder
```

> Abrimos el archivo `CategoriesSeeder.php` en la carpeta `database\seeders\CategoriesSeeder.php` en la función `run` y escribimos lo siguiente.

```php
DB::table('categories')->insert([
  'name' => 'Desarrollador web',
  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('categories')->insert([
  'name' => 'Diseño web',
  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
```

> Y importamos las clases siguientes.

```php
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
```

> Abrimos el archivo `DatabaseSeeder.php` en la carpeta `database\seeders\DatabaseSeeder.php` en la función `run` y añadimos lo siguiente.

```php
$this->call(CategoriesSeeder::class);
```

> Typee: en la Consola:

```console
php artisan migrate:fresh --seed
```

###### Creamos el controlador de Post

> Typee: en la Consola:

```console
php artisan make:controller PostController --resource
```

**`Nota :` Creamos el controlador con los métodos (index,create,store,show,edit,update,destroy) con la opción `--resource`.**

> Abrimos el archivo `PostController.php` en la carpeta `app\Http\Controllers\PostController.php` y escribimos lo siguiente.

```php
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('blog.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }
    public function store(PostRequest $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request['title'], '-')]);
            Post::create($request->all());
            return redirect()
                ->route('blog.index')
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El post a sido guardado correctamente.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('blog.edit', compact(['post','categories']));
    }
    public function update(PostRequest $request, Post $post)
    {
        try {
            $request->merge(['slug' => Str::slug($request['title'], '-')]);
            $post->update($request->all());
            return redirect()
                ->route('blog.index')
                ->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El post a sido actualizado correctamente.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()
            ->route('blog.index')
            ->with('message', [
                    'type' => 'info',
                    'title' => 'Éxito !',
                    'message' => 'El post a sido eliminado correctamente.',
                ]);
        } catch (\Throwable $th) {
             return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
```

###### Creamos el request de Post

> Typee: en la Consola:

```console
php artisan make:request PostRequest
```

> Abrimos el archivo `PostRequest.php` en la carpeta `app\Http\Requests\PostRequest.php` en la función `authorize` y escribimos lo siguiente.

```php
if ($this->user_id == auth()->user()->id) {
  return true;
} else {
  return false;
}
```

> Y en la función `rules` escribimos lo siguiente.

```php
return [
  'title' => 'required|max:45',
  'body' => 'required|min:5',
  'category_id' => 'required|integer',
  'user_id' => 'required|integer',
];
```

> Y en la función añadimos lo siguiente.

```php
    public function messages()
    {
        return [
            'category_id.integer' => 'Debe de seleccionar una categoría.'
        ];
    }
```

**`Nota :` El método message es para indicar una frase de respuesta según la validación.**

###### Creamos las vistas del Post

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\blog\index.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Blog')

@section('content')
    <main class="container-lg">
        @include('layouts.components.alert')
        <h1>Bienvenido a los blogs</h1><a class="btn btn-success" href="{{ route('blog.create') }}">Crear Post</a>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 d-flex justify-content-center">
            @if (!empty($posts))
                @foreach ($posts as $post)
                    <div class="col m-2" style="padding-left: 0px;padding-right: 0px;">
                        <div class="card" style="width: 100%">
                            {{-- <img src="..." class="card-img-top" alt="..."> --}}
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="100"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Capa de imagen"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#868e96"></rect><text x="30%"
                                    y="50%" fill="#dee2e6" dy=".3em">Falta imagen</text>
                            </svg>
                            <div class="card-body" style="max-width:400px">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                                <p class="card-text text-truncate">
                                    {{ $post->body }}
                                </p>
                                <a href="{{ route('blog.show', $post) }}" class="btn btn-primary">Leer mas...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <h2>No hay ningún post en estos momentos.</h2>
            @endif
        </div>
    </main>
@endsection
```

> Abrimos el archivo `form.blade.php` en la carpeta `resources\views\blog\partials\form.blade.php` y escribimos lo siguiente.

```php
<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'blog.edit' ? 'Editar post' : 'Crear post' }}
        </h5>
    </div>
    <div class="card-body">
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="mb-0">
            <label class="form-label">Titulo:</label>
            <input type="text" class="form-control" placeholder="Diseñador"
                value="{{ Route::currentRouteName() == 'blog.edit' ? old('title', $post->title) : old('title') }}"
                name="title">
            @error('title')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Cuerpo:</label>
            <textarea class="form-control" rows="3" name="body"> {{ Route::currentRouteName() == 'blog.edit' ? old('body', $post->body) : old('body') }}</textarea>
            @error('body')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Categoria:</label>
            <select class="form-select form-select-sm" aria-label="Ejemplo de .form-select-sm" name="category_id">
                <option selected>Elige una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}} </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'blog.edit' ? 'Editar blog' : 'Crear blog' }}</button>
            <a class="btn btn-danger" href="{{  Route::currentRouteName() == 'blog.edit' ? route('blog.show', $post) : route('blog.index') }}">Cancelar</a>
    </div>
</div>
```

> Abrimos el archivo `create.blade.php` en la carpeta `resources\views\blog\create.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Crear Post')

@section('content')
    <main class="container center_container flex-column">
        @include('layouts.components.alert')
        <form action="{{ route('blog.create') }}" method="post">
            @csrf
            @include('blog.partials.form')
        </form>
    </main>
@endsection
```

> Abrimos el archivo `show.blade.php` en la carpeta `resources\views\blog\show.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Post | ' . $post->title)
@section('content')
    <main class="container-lg">
        @include('layouts.components.alert')
        <div class="card">
            <div class="card-header text-center">
                Bienvenido al post {{ $post->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->category->name }}</h5>
                <p class="card-text">{{ $post->body }} </p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between">
                <div class="row row-cols-3">
                    <a class="btn btn-warning" href="{{ route('blog.edit', $post) }}">Editar</a>
                    <form action="{{ route('blog.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger text-nowrap" type="submit">Eliminar Post</button>
                    </form>
                </div>
                <a class="btn btn-primary" href="{{ route('blog.index', $post) }}">Volver</a>
            </div>
        </div>
    </main>
@endsection
```

> Abrimos el archivo `edit.blade.php` en la carpeta `resources\views\blog\edit.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Editar Post')

@section('content')
    <main class="container center_container flex-column">
        @include('layouts.components.alert')
        <form action="{{ route('blog.update', $post) }}" method="post">
            @csrf
            @method('put')
            @include('blog.partials.form')
        </form>
    </main>
@endsection
```

> Abrimos el archivo `header.blade.php` en la carpeta `resources\views\layouts\partials\header.blade.php` en el array `$links_pages` y escribimos lo siguiente.

```php
        [
            'name' => 'Blog',
            'route' => route('blog.index'),
            'active' => request()->routeIs('blog.*') ? 'active' : '',
        ],
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` en la grupo de rutas protegidas `['middleware' => ['auth', 'auth.session', 'verified']]` y escribimos lo siguiente.

```php
Route::resource('blog', PostController::class)->parameters(['blog' => 'post']);
```

**`Nota :` Indicamos el método `parameters` para indicar el nombre del modelo que queremos referenciar.**

[Subir](#top)

<a name="item30"></a>

## Relación muchos a muchos (Many To Many)

###### Creación del modelo Rol y la migración Roles

> Typee: en la Consola:

```console
php artisan make:model Role -m
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_roles_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_roles_table.php` en la función `up` y añadimos lo siguiente.

```php
Schema::create('roles', function (Blueprint $table) {
  $table->id();
  $table->string('name', 45)->unique();
  $table->string('slug', 45)->unique();
  $table->timestamps();
});
```

###### Creación tabla pivote de la relación muchos a muchos.

> Typee: en la Consola:

```console
php artisan make:migration create_role_user_table
```

> Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_role_user_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_role_user_table.php` en la función `up` y añadimos lo siguiente.

```php
Schema::create('role_user', function (Blueprint $table) {
  $table->unsignedBigInteger('role_id');
  $table->unsignedBigInteger('user_id');
  $table
    ->foreign('role_id')
    ->references('id')
    ->on('roles')
    ->onDelete('cascade');
  $table
    ->foreign('user_id')
    ->references('id')
    ->on('users')
    ->onDelete('cascade');
});
```

> Typee: en la Consola:

```console
php artisan migrate
```

> Abrimos el archivo `User.php` en la carpeta `app\Models\User.php` y añadimos lo siguiente.

```php
    // Relación muchos a muchos
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
```

> Abrimos el archivo `Role.php` en la carpeta `app\Models\Role.php` y añadimos lo siguiente.

```php
    protected $guarded = [];
    // Relación muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
```

[Subir](#top)

<a name="item31"></a>

## Agregando iconos (Fontawesome)

> Typee: en la Consola:

```console
npm install --save @fortawesome/fontawesome-free
```

> Typee: en la Consola:

```console
npm install
```

> Abrimos el archivo `app.scss` en la carpeta `resources\scss\app.scss` y añadimos lo siguiente.

```scss
@import '@fortawesome/fontawesome-free/css/all.css';
```

> Utilizamos esta instrucción para mostrar los iconos.

```php
<i class="fa-solid fa-user"></i>
```

**`Nota :` Mas iconos [Lista de Iconos](https://fontawesome.com/search?o=r&m=free).**

> Abrimos el archivo `header.blade.scss` en la carpeta `resources\views\layouts\partials\header.blade.php` y añadimos lo siguiente.

```php
@php
    $links_pages = [
        [
            'name' => 'Home',
            'route' => route('home'),
            'active' => request()->routeIs('home') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-house fa-lg',
            'icono_color' => '#1100ff'
        ],
        [
            'name' => 'Cursos',
            'route' => route('cursos.index'),
            'active' => request()->routeIs('cursos.*') ? 'active' : '',
            'icono' => 'fa-solid fa-book fa-lg',
            'icono_color' => '#27aa94'
        ],
        [
            'name' => 'Blog',
            'route' => route('blog.index'),
            'active' => request()->routeIs('blog.*') ? 'active' : '',
            'icono' => 'fa-solid fa-blog fa-lg',
            'icono_color' => '#0ac720'
        ],
        [
            'name' => 'Contáctanos',
            'route' => route('contactanos.index'),
            'active' => request()->routeIs('contactanos.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-address-card fa-lg',
            'icono_color' => '#ff9500'
        ],
        [
            'name' => 'Nosotros',
            'route' => route('nosotros'),
            'active' => request()->routeIs('nosotros') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-circle-info fa-lg',
            'icono_color' => '#ffde05'
        ],

    ];
    $links_users = [
        [
            'name' => 'Perfil',
            'route' => ! empty( auth()->user()->profile) ? route('profile.edit', auth()->user()->profile) : route('profile.create'),
            'active' => request()->routeIs('profile.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-id-badge',
            'icono_color' => '#b7c3d7'
        ],
        [
            'name' => 'Cerrar Sesión',
            'route' => route('logout'),
            'active' => '',
            'icono' => 'fa-solid fa-arrow-right-from-bracket',
            'icono_color' => '#e27474'
        ],
    ];
    $links_auths = [
        [
            'name' => 'Acceso',
            'route' => route('login'),
            'active' => request()->routeIs('login') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-lock-open',
            'icono_color' => '#932a6c'
        ],
        [
            'name' => 'Registrarse',
            'route' => route('register.index'),
            'active' => request()->routeIs('register.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-right-to-bracket',
            'icono_color' => '#36c44d'
        ],
    ];
@endphp
<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <i class="fa-brands fa-laravel fa-2xl me-1" style="color: #ff0000;"></i>
            <a class="navbar-brand">Laravel 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-lg justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach ($links_pages as $link_page)
                        <li class="nav-item">
                            <a class="nav-link {{ $link_page['active'] }}" aria-current="page"
                                href="{{ $link_page['route'] }}">
                                <i class="{{ $link_page['icono'] }}" style="color: {{$link_page['icono_color']}};"></i> {{ $link_page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <hr class="hidden-lg">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-link d-none d-lg-block">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-display="static"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-2xl" style="color: #8a0000;"></i>
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($links_users as $link_user)
                                    <li class="nav-item">
                                        <a href="{{ $link_user['route'] }}"
                                            class="nav-link dropdown-item {{ $link_user['active'] }}">
                                            <i class="{{ $link_user['icono'] }}" style="color: {{$link_user['icono_color']}};"></i>
                                            {{ $link_user['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <ul class="navbar-nav d-lg-none">
                            @foreach ($links_users as $link_user)
                                <li class="nav-item">
                                    <a class="nav-link {{ $link_user['active'] }}" aria-current="page"
                                        href="{{ $link_user['route'] }}">{{ $link_user['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        @foreach ($links_auths as $link_auth)
                            <li class="nav-item">
                                <a class="nav-link {{ $link_auth['active'] }}" aria-current="page"
                                    href="{{ $link_auth['route'] }}">
                                    <i class="{{ $link_auth['icono'] }}" style="color: {{$link_auth['icono_color']}};"></i>
                                    {{ $link_auth['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
```

[Subir](#top)

<a name="item32"></a>

## Dashboard simple

###### Creamos un Layout del Dashboard

> Creamos el archivo `dashboard.blade.php` en la carpeta `resources\views\layouts\dashboard.blade.php` y escribimos lo siguiente.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="body-dashboard">
    @include('layouts.partials.header')
    @include('layouts.partials.aside')
    @yield('content-dashboard')
    @include('layouts.partials.footer')
</body>
</html>
```

###### Cambiamos y añadimos algunos estilos

> Abrimos el archivo `app.css` en la carpeta `resources\css\app.css` y escribimos lo siguiente.

> En la clase `Body` lo dejamos de esta manera.

```css
.body {
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: auto 1fr auto;
  grid-template-areas:
    'header'
    'main'
    'footer';
  min-height: 100vh;
}
```

> Y añadimos las siguientes clases.

```css
.body-dashboard {
  display: grid;
  grid-template-columns: auto 1fr;
  grid-template-rows: auto 1fr auto;
  grid-template-areas:
    'aside header'
    'aside main '
    'footer footer';
  min-height: 100vh;
}

.header-dashboard {
  grid-area: header;
}

.aside-dashboard {
  grid-area: aside;
}

.main-dashboard {
  grid-area: main;
}

.footer-dashboard {
  grid-area: footer;
}

@media (max-width: 576px) {
  .body-dashboard {
    display: grid;
    grid-template-rows: auto 1fr auto;
    min-height: 100vh;
  }
}
.aside-first-grid {
  display: grid;
  grid-template-columns: 1fr auto auto;
  grid-template-rows: auto;
  grid-template-areas: 'inptsearch btnsearch btnclose';
}
.inptsearch {
  grid-area: inptsearch;
}
.btnsearch {
  grid-area: btnsearch;
}
.btnclose {
  grid-area: btnclose;
  align-self: center;
  justify-self: center;
}
.hover-link:hover {
  background-color: #6c757d !important;
}
.dropdown-item:hover,
.dropdown-item:focus {
  background-color: #6c757d !important;
}
.btn-circle {
  width: 48px !important;
  height: 48px !important;
  border-radius: 50% !important;
  border: solid 1px #6c757d !important;
}
.btn-circle:hover {
  background-color: #6c757d !important;
}
```

###### Creamos algunos componentes

> Typee: en la Consola:

```console
php artisan make:component Aside
```

> Abrimos el archivo `Aside.php` en la carpeta `app\View\Components\Aside.php` y lo dejamos de la siguiente manera.

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    public $links;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
        [
            'name' => 'Cursos',
            'active' =>  '',
            'icono' => 'fa-solid fa-book fa-lg',
            'icono_color' => '#27aa94',
            'name_collapse' => 'collapseHeightCursos',
            'items' => [
                [
                    'name' => 'Mis Cursos',
                    'route' => route('cursos.mycursos'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-book fa-lg',
                    'icono_color' => '#27aa94',
                ],
                [
                    'name' => 'Crear Cursos',
                    'route' => route('cursos.create'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-book fa-lg',
                    'icono_color' => '#27aa94',
                ]
            ]
        ],
        [
            'name' => 'Blogs',
            'active' =>  '',
            'icono' => 'fa-solid fa-blog fa-lg',
            'icono_color' => '#0ac720',
            'name_collapse' => 'collapseHeightBlogs',
            'items' => [
                [
                    'name' => 'Mis Post',
                    'route' => route('blog.mypost'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-blog fa-lg',
                    'icono_color' => '#0ac720',
                ],
                [
                    'name' => 'Crear Post',
                    'route' => route('blog.create'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-blog fa-lg',
                    'icono_color' => '#0ac720',
                ],
            ]
        ],
    ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.aside');
    }
}
```

**`Nota :` En este archivo lo utilizaremos para crear los links de navegación del menu dashboard.**

> Abrimos el archivo `aside.blade.php` en la carpeta `resources\views\components\aside.blade.php` y escribimos lo siguiente.

```php
<aside class="aside-dashboard bg-dark text-light d-none d-lg-block" id="aside_dashboard" style="width:80px;">
    <div class="container-fluid">
        {{-- Botón Cierre y Campo Búsqueda  --}}
        <form id="content_aside_1" class="d-none">
            <div class="aside-first-grid mt-3">
                <input class="form-control me-2 inptsearch" type="search" placeholder="Search" aria-label="Search"
                    style="max-width: 150px">
                <button class="btn btn-outline-success btnsearch" type="submit">Search</button>
                <button type="button" class="btn-close btn-close-white btnclose ms-2" aria-label="Close"
                    id="btn_close_aside"></button>
            </div>
        </form>
        {{-- Botón menu --}}
        <nav class="navbar navbar-dark d-block" id="content-btn-nav">
            <button class="navbar-toggler" type="button" id="btn_open_aside">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <hr>
        {{-- Lista de links  --}}
        <ul class="navbar-nav list-group">
            <li class="nav-item">
                {{-- Botón del link --}}
                <div id="btn_link_dashboard" class="d-none">
                    @foreach ($links as $link)
                        <button class="btn btn-outline-secondary text-start mb-1" style="width: 100%;" type="button"
                            data-bs-toggle="collapse" data-bs-target="#{{ $link['name_collapse'] }}"
                            aria-expanded="false" aria-controls="{{ $link['name_collapse'] }}" id="btn_link_dashboard">
                            <i class="{{ $link['icono'] }}" style="color:{{ $link['icono_color'] }};"></i>
                            <span>{{ $link['name'] }}</span>
                        </button>
                        {{-- Lista del colapses --}}
                        <ul class="dropdown-menu collapse collapse-vertical bg-dark" id="{{ $link['name_collapse'] }}">
                            @foreach ($link['items'] as $item)
                                <li>
                                    <a href="{{ $item['route'] }}" class="dropdown-item text-white" type="button">
                                        <i class="{{ $item['icono'] }}" style="color:{{ $item['icono_color'] }};"></i>
                                        {{ $item['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
                {{-- Botones de los links en Iconos --}}
                <div class="btn-group dropend d-block" id="btn_links_iconos_dashboard">
                    @foreach ($links as $link)
                        <button type="button" class="btn btn-circle dropdown-toggle mb-1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="{{ $link['icono'] }}" style="color:{{ $link['icono_color'] }};"></i>
                        </button>
                        <ul class="dropdown-menu bg-dark">
                            @foreach ($link['items'] as $item)
                                <li>
                                    <a href="{{ $item['route'] }}" class="dropdown-item text-white" type="button">
                                        {{ $item['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</aside>
```

> Creamos el archivo `aside.blade.php` en la carpeta `resources\views\layouts\partials\aside.blade.php` y escribimos lo siguiente.

```php
<x-aside></x-aside>
```

> Typee: en la Consola:

```console
php artisan make:component Header
```

> Abrimos el archivo `Header.php` en la carpeta `app\View\Components\Header.php` y lo dejamos de la siguiente manera.

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $links_pages, $links_users, $links_auths;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    $this->links_pages = [
            [
                'name' => 'Home',
                'route' => route('home'),
                'active' => request()->routeIs('home') ? 'active disabled' : '',
                'icono' => 'fa-solid fa-house fa-lg',
                'icono_color' => '#1100ff'
            ],
            [
                'name' => 'Cursos',
                'route' => route('cursos.index'),
                'active' => request()->routeIs('cursos.*') ? 'active' : '',
                'icono' => 'fa-solid fa-book fa-lg',
                'icono_color' => '#27aa94'
            ],
            [
                'name' => 'Blog',
                'route' => route('blog.index'),
                'active' => request()->routeIs('blog.*') ? 'active' : '',
                'icono' => 'fa-solid fa-blog fa-lg',
                'icono_color' => '#0ac720'
            ],
            [
                'name' => 'Contáctanos',
                'route' => route('contactanos.index'),
                'active' => request()->routeIs('contactanos.*') ? 'active disabled' : '',
                'icono' => 'fa-solid fa-address-card fa-lg',
                'icono_color' => '#ff9500'
            ],
            [
                'name' => 'Nosotros',
                'route' => route('nosotros'),
                'active' => request()->routeIs('nosotros') ? 'active disabled' : '',
                'icono' => 'fa-solid fa-circle-info fa-lg',
                'icono_color' => '#ffde05'
            ],
    ];
    $this->links_users = [
        [
            'name' => 'Perfil',
            'route' => ! empty( auth()->user()->profile) ? route('profile.edit', auth()->user()->profile) : route('profile.create'),
            'active' => request()->routeIs('profile.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-id-badge',
            'icono_color' => '#b7c3d7'
        ],
        [
            'name' => 'Dashboard',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-gauge-high',
            'icono_color' => '#218c55'
        ],
        [
            'name' => 'Cerrar Sesión',
            'route' => route('logout'),
            'active' => '',
            'icono' => 'fa-solid fa-arrow-right-from-bracket',
            'icono_color' => '#e27474'
        ],
    ];
    $this->links_auths = [
        [
            'name' => 'Acceso',
            'route' => route('login'),
            'active' => request()->routeIs('login') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-lock-open',
            'icono_color' => '#932a6c'
        ],
        [
            'name' => 'Registrarse',
            'route' => route('register.index'),
            'active' => request()->routeIs('register.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-right-to-bracket',
            'icono_color' => '#36c44d'
        ],
    ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
```

**`Nota :` En este archivo lo utilizaremos para crear los links de navegación del menu principal.**

> Abrimos el archivo `header.blade.php` en la carpeta `resources\views\components\header.blade.php` y escribimos lo siguiente.

```php
<header class="bg-light border-bottom header-dashboard">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <i class="fa-brands fa-laravel fa-2xl me-1" style="color: #ff0000;"></i>
            <a class="navbar-brand">Laravel 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-lg justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach ($links_pages as $link_page)
                        <li class="nav-item">
                            <a class="nav-link {{ $link_page['active'] }}" aria-current="page"
                                href="{{ $link_page['route'] }}">
                                <i class="{{ $link_page['icono'] }}" style="color: {{$link_page['icono_color']}};"></i> {{ $link_page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <hr class="hidden-lg">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-link d-none d-lg-block">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-display="static"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-2xl" style="color: #8a0000;"></i>
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($links_users as $link_user)
                                    <li class="nav-item">
                                        <a href="{{ $link_user['route'] }}"
                                            class="nav-link dropdown-item {{ $link_user['active'] }}">
                                            <i class="{{ $link_user['icono'] }}" style="color: {{$link_user['icono_color']}};"></i>
                                            {{ $link_user['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <ul class="navbar-nav d-lg-none">
                            @foreach ($links_users as $link_user)
                                <li class="nav-item">
                                    <a class="nav-link {{ $link_user['active'] }}" aria-current="page"
                                        href="{{ $link_user['route'] }}">
                                        <i class="{{ $link_user['icono'] }}" style="color: {{$link_user['icono_color']}};"></i>
                                        {{ $link_user['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        @foreach ($links_auths as $link_auth)
                            <li class="nav-item">
                                <a class="nav-link {{ $link_auth['active'] }}" aria-current="page"
                                    href="{{ $link_auth['route'] }}">
                                    <i class="{{ $link_auth['icono'] }}" style="color: {{$link_auth['icono_color']}};"></i>
                                    {{ $link_auth['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
```

> Abrimos el archivo `header.blade.php` en la carpeta `resources\views\layouts\partials\header.blade.php` y cambiamos por lo siguiente.

```php
<x-header></x-header>
```

###### Añadimos unas clases

> Abrimos el archivo `footer.blade.php` en la carpeta `resources\views\layouts\partials\footer.blade.php` y añadimos la clase siguiente `footer-dashboard`.

```php
<footer class="bg-light text-center text-lg-start border-top footer-dashboard">
  <div class="text-center p-3">
    © 2023 Copyright:
    <a class="text-dark" href="#">Un Footer</a>
  </div>
</footer>
```

**`Nota :` las clases `header-dashboard, aside-dashboard, main-dashboard, footer-dashboard` son las que posicionan los elementos en el grid de css.**

###### Aplicamos funcionalidad al menu dashboard.

> Abrimos el archivo `interface.js` en la carpeta `resources\js\interface.js` y añadimos lo siguiente.

```js
let $btncloseaside = document.getElementById('btn_close_aside')
let $asidedashboard = document.getElementById('aside_dashboard')
let $contentaside1 = document.getElementById('content_aside_1')
let $contentbtnnav = document.getElementById('content-btn-nav')
let $btnopenaside = document.getElementById('btn_open_aside')
let $btnlinkdashboard = document.getElementById('btn_link_dashboard')
let $btnlinksiconosdashboard = document.getElementById(
  'btn_links_iconos_dashboard',
)
...
// Cerrar menu dashboard
if ($btncloseaside != null) {
  $btncloseaside.addEventListener('click', () => {
    $asidedashboard.style = 'width:80px'
    $contentaside1.classList.add('d-none')
    $contentbtnnav.classList.replace('d-none', 'd-block')
    $btnlinkdashboard.classList.add('d-none')
    $btnlinksiconosdashboard.classList.replace('d-none', 'd-block')
  })
}
// Abrir menu dashboard
if ($btnopenaside != null) {
  $btnopenaside.addEventListener('click', () => {
    $asidedashboard.style.removeProperty('width')
    $contentaside1.classList.remove('d-none')
    $contentbtnnav.classList.replace('d-block', 'd-none')
    $btnlinkdashboard.classList.remove('d-none')
    $btnlinksiconosdashboard.classList.replace('d-block', 'd-none')
  })
}
```

> Y también en la parte de la función de comparar password la envolvemos con lo siguiente para que no salte el error que no se encuentra dicho elemento.

```js
if ($password2 != null) {
    ...
}
```

###### Modificamos varias vistas para el dashboard.

> Abrimos los archivos `create.blade.php y edit.blade.php` en la carpeta `resources\views\blog\` y cambiamos lo siguiente.

```php
@extends('layouts.dashboard')
...
@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
    ...
```

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\blog\index.blade.php` y eliminamos lo siguiente.

```php
<a class="btn btn-success" href="{{ route('blog.create') }}">Crear Post</a>
```

> Abrimos el archivo `show.blade.php` en la carpeta `resources\views\blog\show.blade.php` y eliminamos lo siguiente.

```php
<div class="row row-cols-3">
    <a class="btn btn-warning" href="{{ route('blog.edit', $post) }}">Editar</a>
    <form action="{{ route('blog.destroy', $post) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger text-nowrap" type="submit">Eliminar Post</button>
    </form>
</div>
```

> Y cambiamos lo siguiente.

```php
<a class="btn btn-primary" href="{{ route('blog.index', $post) }}">Volver</a>
```

> Por esto siguiente.

```php
<a class="btn btn-primary" href="{{ route('blog.index') }}">Volver</a>
```

> Abrimos los archivos `create.blade.php y edit.blade.php` en la carpeta `resources\views\cursos\` y cambiamos lo siguiente.

```php
@extends('layouts.dashboard')
...
@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
    ...
```

> Y `create.blade.php` eliminamos lo siguiente.

```php
<a class="btn btn-success btn-float btn-position-top-0-left-0 m-2" href="{{ route('cursos.index') }}">Volver</a>
```

> Y `edit.blade.php` eliminamos lo siguiente.

```php
<a class="btn btn-success btn-float btn-position-top-0-left-0 m-2" href="{{route('cursos.show', $curso)}}">Volver</a>
```

> Abrimos el archivo `show.blade.php` en la carpeta `resources\views\cursos\show.blade.php` y eliminamos lo siguiente.

```php
<a class="btn btn-warning" href="{{route('cursos.edit', $curso)}}">Editar Cursos</a>
<form action="{{route('cursos.destroy', $curso)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">Eliminar Curso</button>
</form>
```

> Y cambiamos lo siguiente.

```php
<a class="btn btn-success ml-2" href="{{route('cursos.index')}}">Volver a Cursos</a>
```

> Y esto otro.

```php
<a class="btn btn-success ml-2" href="{{url()->previous()}}">Volver a Cursos</a>
```

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\cursos\index.blade.php` y eliminamos lo siguiente.

```php
<a class="btn btn-success" href="{{ route('cursos.create') }}">Crear Curso</a>
```

> Abrimos el archivo `form.blade.php` en la carpeta `resources\views\blog\partials\form.blade.php` y modificamos lo siguiente.

```php
<a class="btn btn-danger" href="{{  Route::currentRouteName() == 'blog.edit' ? route('blog.show', $post) : route('blog.index') }}">Cancelar</a>
```

> Por lo siguiente.

```php
<a class="btn btn-danger" href="{{ url()->previous() }}">Cancelar</a>
```

> Abrimos el archivo `form.blade.php` en la carpeta `resources\views\cursos\partials\form.blade.php` y añadimos lo siguiente.

```php
<a class="btn btn-danger" href="{{ url()->previous() }}">Cancelar</a>
```

###### Añadimos y modificamos varias rutas para el dashboard.

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y modificamos lo siguiente.

```php
Route::resource('cursos', CursoController::class);
```

> Por lo siguiente.

```php
Route::resource('cursos', CursoController::class)->except(['create', 'edit']);
```

> Modificamos lo siguiente.

```php
Route::resource('blog', PostController::class)->parameters(['blog' => 'post']);
```

> Por lo siguiente.

```php
Route::resource('blog', PostController::class)
  ->parameters(['blog' => 'post'])
  ->except(['create', 'edit', 'destroy']);
```

> Y añadimos las siguientes.

```php
Route::get('dashboard/blog/create', [PostController::class, 'create'])->name(
  'blog.create'
);
Route::get('dashboard/blog/{post}/edit', [PostController::class, 'edit'])->name(
  'blog.edit'
);
Route::delete('dashboard/blog/{post}', [
  PostController::class,
  'destroy',
])->name('blog.destroy');
Route::get('dashboard/blog/myposts', [
  PostController::class,
  'showmypost',
])->name('blog.mypost');
Route::get('dashboard/cursos/create', [CursoController::class, 'create'])->name(
  'cursos.create'
);
Route::get('dashboard/cursos/mycursos', [
  CursoController::class,
  'showmycursos',
])->name('cursos.mycursos');
Route::get('dashboard/cursos/{curso}/edit', [
  CursoController::class,
  'edit',
])->name('cursos.edit');
Route::view('dashboard', 'dashboard')->name('dashboard');
```

###### Creamos unas vistas para el dashboard.

> Creamos el archivo `dashboard.blade.php` en la carpeta `resources\views\dashboard.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('content-dashboard')
    <main class="main-dashboard">
        <h1>Dashboard</h1>
    </main>
@endsection
```

> Creamos el archivo `mycursos.blade.php` en la carpeta `resources\views\cursos\mycursos.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.dashboard')

@section('title', 'My Cursos')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>MyCursos</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm" theadclass="table-dark">
            @foreach ($cursos as $curso)
                <tr>
                    <th scope="col">{{ $curso->id }}</th>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 150px;">
                            {{ $curso->name }}
                        </span>
                    </td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 150px;">
                            {{ $curso->slug }}
                        </span>
                    </td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $curso->description }}
                        </span>
                    </td>
                    <td>{{ $curso->categoria }}</td>
                    <td>{{ $curso->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('cursos.edit', $curso)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='submit' class='btn-outline-danger' :route="route('cursos.destroy', $curso)" method='delete'>
                                <x-slot name="icon">
                                    <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                </x-slot>
                            </x-table.button>
                        </span>
                    </td>
                </tr>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($cursos as $curso)
            <x-table class="table-striped" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('cursos.edit', $curso)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='submit' class='btn-outline-danger' :route="route('cursos.destroy', $curso)" method='delete'>
                        <x-slot name="icon">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </x-slot>
                    </x-table.button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $curso->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Nombre :</strong>
                        {{ $curso->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Slug :</strong>
                        {{ $curso->slug }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Description :</strong>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $curso->description }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Category :</strong>
                        {{ $curso->categoria }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $curso->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
        @endforeach
        {{ $cursos->links() }}
    </main>
@endsection
```

> Creamos el archivo `mypost.blade.php` en la carpeta `resources\views\blog\mypost.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.dashboard')

@section('title', 'My Posts')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>Mypost</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm" theadclass="table-dark">
            @foreach ($posts as $post)
                <tr>
                    <th scope="col">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $post->body }}
                        </span>
                    </td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $post)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='submit' class='btn-outline-danger' :route="route('blog.destroy', $post)" method='delete'>
                                <x-slot name="icon">
                                    <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                </x-slot>
                            </x-table.button>
                        </span>
                    </td>
                </tr>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($posts as $post)
            <x-table class="table-striped" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $post)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='submit' class='btn-outline-danger' :route="route('blog.destroy', $post)" method='delete'>
                        <x-slot name="icon">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </x-slot>
                    </x-table.button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $post->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Title :</strong>
                        {{ $post->title }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Slug :</strong>
                        {{ $post->slug }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Body :</strong>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $post->body }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Category :</strong>
                        {{ $post->category->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $post->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
        @endforeach
        {{ $posts->links() }}
    </main>
@endsection
```

> Abrimos el archivo `PostController.php` en la carpeta `app\Http\Controllers\PostController.php` y añadimos lo siguiente.

```php
    public function showmypost()
    {
        $headName = ['#', 'Title', 'Slug', 'Body', 'Category', 'Date', 'Options'];
        $posts = Post::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->paginate(10);
        return view('blog.mypost', compact('posts', 'headName'));
    }
```

> Abrimos el archivo `CursoController.php` en la carpeta `app\Http\Controllers\CursoController.php` y añadimos lo siguiente.

```php
    public function showmycursos()
    {
        $headName = ['#', 'Name', 'Slug', 'Description', 'Category', 'Date', 'Options'];
        $cursos = Curso::orderBy('id', 'desc')->paginate(5);
        return view('cursos.mycursos', compact('cursos', 'headName'));
    }
```

###### Creamos varios componentes para la visualización de los datos.

> Typee: en la Consola:

```console
php artisan make:component Table
```

> Abrimos el archivo `Table.php` en la carpeta `app\View\Components\Table.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $thead, $class, $theadclass, $typetable;
    /**
     * Create a new component instance.
     */
    public function __construct($thead = null, $class = null, $theadclass = null, $typetable = null)
    {
        $this->thead = $thead;
        $this->class = $class;
        $this->theadclass = $theadclass;
        $this->typetable = $typetable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
```

> Abrimos el archivo `table.blade.php` en la carpeta `resources\views\components\table.blade.php` y escribimos lo siguiente.

```php
@if ($typetable == 'movil')
    <table {{ $attributes->merge(['class' => "d-table d-lg-none table $class"]) }}>
        <thead>
            <tr>
                <td class="text-end">
                    <span class="d-inline-flex">
                        {{$head}}
                    </span>
                </td>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
@else
    <table {{ $attributes->merge(['class' => "d-none d-lg-table table $class"]) }}>
        <thead>
            <tr class="{{ $theadclass }}">
                @for ($i = 0; $i < count($thead); $i++)
                    <th scope="col">{{ $thead[$i] }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
@endif
```

```console
php artisan make:component Table/Button
```

> Abrimos el archivo `Button.php` en la carpeta `app\View\Components\Table\Button.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type, $route, $class, $method;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $route, $class, $method = null)
    {
        $this->type = $type;
        $this->route = $route;
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.button');
    }
}
```

> Abrimos el archivo `button.blade.php` en la carpeta `resources\views\components\table\button.blade.php` y escribimos lo siguiente.

```php
@if ($type == 'link')
    <a href="{{ $route ?? '#' }}" {{ $attributes->merge(['class' => "btn $class"]) }}>
        {{ $icon }}
    </a>
@elseif ($type == 'submit')
    <form action="{{ $route ?? '' }}" method="post">
        @csrf
        @method('{{$method}}')
        <button type="submit" {{ $attributes->merge(['class' => "btn $class"]) }}>
            {{ $icon }}
        </button>
    </form>
@elseif ($type == 'modal')
        <button type="button" {{ $attributes->merge(['class' => "btn $class"]) }} data-bs-toggle="modal" {{ $attributes->merge(['data-bs-target' => "$target"]) }}>
            {{ $icon }}
        </button>
    </form>
@endif
```

[Subir](#top)

<a name="item33"></a>

## Relación muchos a muchos (Many To Many) Parte 2

###### Creamos un seeder para los roles.

> Typee: en la Consola:

```console
php artisan make:seeder RolesSeeder
```

> Abrimos el archivo `RolesSeeder.php` en la carpeta `database\seeders\RolesSeeder.php` y en la función `run` escribimos lo siguiente.

```php
DB::table('roles')->insert([
  'name' => 'Admin',
  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('roles')->insert([
  'name' => 'Editor',
  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
DB::table('roles')->insert([
  'name' => 'User',
  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
  'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
]);
```

> Abrimos el archivo `DatabaseSeeder.php` en la carpeta `database\seeders\DatabaseSeeder.php` y en la función `run` añadimos lo siguiente.

```php
$this->call(RolesSeeder::class);
```

> Typee: en la Consola:

```console
php artisan migrate:fresh --seed
```

###### Modificamos el registro de usuarios.

> Abrimos el archivo `RegisterController.php` en la carpeta `app\Http\Controllers\Auth\RegisterController.php` y en la función `store` hacemos algunos cambios y lo dejamos de esta manera.

```php
try {
  // Buscamos si hay algún usuario y le definimos un rol
  $role = count(User::all()) > 0 ? 3 : 1; // (3) Rol User, (1) Rol Administrador.

  // Creamos el usuario
  $user = new User();
  $user->name = $request->name;
  $user->email = $request->email;
  $user->password = bcrypt($request->password);
  $user->save();

  // Adjuntamos el Rol al Usuario.
  $user->roles()->attach($role);

  // Enviamos el correo de verificación.
  event(new Registered($user));

  // Logueamos al usuario
  Auth::login($user);

  // Regeneramos la sesión.
  $request->session()->regenerate();

  // Y redirigimos a la vista de los cursos.
  return redirect()->route('cursos.index');

} catch (\Throwable $th) {

  // Le de volvemos a la vista con un mensaje de error.
  return back()->with('message', [
    'type' => 'danger',
    'title' => 'Error !',
    'message' =>
      'Ha ocurrido un error revise los datos y vuelva a intentarlo si no se soluciona contacte con su administrador.',
  ]);
}
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` hacemos algunos cambios y lo dejamos de esta manera.

```php
Route::group(['middleware' => ['verified', 'auth', 'auth.session']],function () {
    ...
});
```

**`Nota :` Cambiamos de posición el middleware `Verified`.**

###### Creamos la modelo permiso con la migración.

> Typee: en la Consola:
```console
php artisan make:model Permission -m
```

> Abrimos el archivo `create_permissions_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_permissions_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->string('name', 45)->unique();
```

###### Creamos tabla pivote de permisos y roles.

> Typee: en la Consola:
```console
php artisan make:migration create_permission_role_table
```

> Abrimos el archivo `create_permission_role_table.php` en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_permission_role_table.php` y en la función `up` añadimos lo siguiente.

```php
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
```

> Typee: en la Consola:
```console
php artisan migrate
```

> Abrimos el archivo `Role.php` en la carpeta `app\Models\Role.php` y añadimos lo siguiente.

```php
    // Relación muchos a muchos
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
```

> Abrimos el archivo `Permission.php` en la carpeta `app\Models\Permission.php` y añadimos lo siguiente.

```php
    // Relación muchos a muchos
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
```

[Subir](#top)

<a name="item34"></a>

## Roles y Permissions Implementación.

###### Creamos controlador para lista de usuarios.

> Typee: en la Consola:
```console
php artisan make:controller UsersController -m User -r
```

**`Nota :` con la instrucción `-m User` indicamos el modelo que queremos utilizar y con `-r (-resource)` es para que nos genere el controlador con los métodos del un (`crud`).**

> Abrimos el archivo `UsersController.php` en la carpeta `app\Http\Controllers\UsersController.php` y añadimos lo siguiente.

```php
    public function index()
    {
        $headName = ['#','Name','Email','Roles','Verified','Date','Options'];
        $users = User::orderBy('id')->paginate(10);
        return view('admin.users.index', compact('users','headName'));
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::resource('users', UsersController::class);
```

> Creamos y abrimos el archivo `index.blade.php` en la carpeta `resources\views\admin\users\index.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.dashboard')

@section('title', 'List Users')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>List Users</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle" theadclass="table-dark">
            @foreach ($users as $user)
                <tr class="{{($user->id == auth()->user()->id) ? 'table-active ' : ''}}">
                    <th scope="col">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width=332px;">
                            {{ $user->email }}
                        </span>
                    </td>
                    <td>
                        @foreach ($user->roles as $role )
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>

                            {{ $user->email_verified_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                    <td class="text-center">
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='submit' class='btn-outline-danger' :route="route('users.destroy', $user)" method='delete'>
                                <x-slot name="icon">
                                    <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                </x-slot>
                            </x-table.button>
                        </span>
                    </td>
                </tr>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($users as $user)
            <x-table class="table-striped {{($user->id == auth()->user()->id) ? 'table-active ' : ''}}"  typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $user)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='submit' class='btn-outline-danger' :route="route('blog.destroy', $user)" method='delete'>
                        <x-slot name="icon">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </x-slot>
                    </x-table.button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $user->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Name :</strong>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Email :</strong>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Role :</strong>
                        @foreach ($user->roles as $role )
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                         <strong>Verified :</strong>
                            {{ $user->email_verified_at->format('d-m-Y') }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $user->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
        @endforeach
        {{ $users->links() }}
    </main>
@endsection
```

> Creamos y abrimos el archivo `style.scss` en la carpeta `resources\scss\style.scss` y escribimos lo siguiente.

```scss
.table-striped > tbody > tr.table-active:nth-of-type(odd) > * {
    --bs-table-accent-bg: var(--bs-table-active-bg);
}
.table-active {
  --bs-table-accent-bg: rgba(6, 3, 3, 0.598) !important;
  color: white;
}
.table {
  --bs-table-color: var(--bs-body-color);
  --bs-table-bg: transparent;
  --bs-table-border-color: var(--bs-border-color);
  --bs-table-accent-bg: transparent;
  --bs-table-striped-color: none;
  --bs-table-striped-bg: rgba(223, 218, 218, 0.598);
  --bs-table-active-color: white;
  --bs-table-active-bg: rgba(6, 3, 3, 0.598);
  --bs-table-hover-color: white;
  --bs-table-hover-bg: rgba(6, 3, 3, 0.598);
  color: var(--bs-table-color);
}
```

> Abrimos el archivo `app.scss` en la carpeta `resources\scss\app.scss` y añadimos lo siguiente.

```scss
@import "style.scss";
```

> Abrimos el archivo `app.css` en la carpeta `resources\css\app.css` y añadimos lo siguiente.

```css
.badge {
    max-width: 150px;
}
```

> Creamos y abrimos el archivo `show.blade.php` en la carpeta `resources\views\admin\users\show.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.dashboard')

@section('title', 'User | '.$user->name)

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <x-card style="width:100%;">
            <x-slot name="card_header" classheader="text-start">
                <h6><strong>Nombre : </strong> {{$user->name}} </h6>
                <h6><strong>Email : </strong> {{$user->email}} </h6>
                <h6><small>Number of Posts : .....</small></h6>
            </x-slot>
            <h5 class="card-title"><strong>Role :</strong></h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <h5 class="card-title"><strong>Permissions :</strong></h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <x-slot name="card_footer" classfooter="text-body-secondary">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
            </x-slot>
        </x-card>
    </main>
@endsection
```

###### Creamos componente card.

> Typee: en la Consola:
```console
php artisan make:component Card
```

> Abrimos el archivo `card.blade.php` en la carpeta `resources\views\components\card.blade.php` y escribimos lo siguiente.

```php
<div {{ $attributes->merge(['class' => "card $class"]) }} {{ $attributes->style([$style]) }}>
    @if (!empty($card_header))
        <div {{ $attributes->merge(['class' =>  "card-header $classheader"]) }}>
            {{ $card_header }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
    @if (!empty($card_footer))
        <div {{ $attributes->merge(['class' => "card-footer $classfooter"]) }}>
            {{ $card_footer }}
        </div>
    @endif
</div>
```

> Abrimos el archivo `Card.php` en la carpeta `app\View\Components\Card.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $style, $class, $classheader, $classfooter;
    /**
     * Create a new component instance.
     */
    public function __construct($style = null, $class = null, $classheader = null, $classfooter = null)
    {
        $this->style = $style;
        $this->class = $class;
        $this->classheader = $classheader;
        $this->classfooter = $classfooter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
```

> Abrimos el archivo `Aside.php` en la carpeta `app\View\Components\Aside.php` y dentro de `$this->links` añadimos lo siguiente.

```php
        [
            'name' => 'Users',
            'active' =>  '',
            'icono' => 'fa-solid fa-users fa-lg',
            'icono_color' => '#0045bd',
            'name_collapse' => 'collapseHeightUsers',
            'items' => [
                [
                    'name' => 'List Users',
                    'route' => route('users.index'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-users fa-lg',
                    'icono_color' => '#0045bd',
                ],
                [
                    'name' => 'Crear Post',
                    'route' => route('blog.create'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-users fa-lg',
                    'icono_color' => '#0045bd',
                ],
            ]
        ],
```

> Abrimos el archivo `UsersController.php` en la carpeta `app\Http\Controllers\UsersController.php` y añadimos lo siguiente.

```php
public function edit(User $user)
    {
        $fields = [
            [
                'id' => 'username',
                'name' => 'name',
                'label' => 'Username :',
                'type' => 'text',
                'placeholder' => 'Username',
                'value' => old('name', $user->name)
            ],
            [
                'id' => 'email',
                'name' => 'email',
                'label' => 'Email :',
                'type' => 'email',
                'placeholder' => 'email@example.com',
                'value' => old('email', $user->email)
            ],
            [
                'id' => 'password',
                'name' => 'password',
                'label' => 'Password :',
                'type' => 'password',
            ],
            [
                'id' => 'repeat_password',
                'label' => 'Repeat password :',
                'type' => 'password',
            ]
        ];
        return view('admin.users.edit', compact('user','fields'));
    }
```

> Creamos y abrimos el archivo `edit.blade.php` en la carpeta `resources\views\admin\users\edit.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.dashboard')

@section('title', 'Editar User')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>Editar Users</h1>
        <x-card style="width:100%">
            <x-form :route="route('users.update', $user)" method="patch" style="width:100%">
                <div class="grid" style="--bs-rows: 2; --bs-columns: 2; --bs-gap: 1rem;">
                    @foreach ($fields as $field)
                        <x-form.input
                            type="{{ $field['type'] }}"
                            id="{{ !empty($field['id']) ? $field['id'] : ''}}"
                            placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                            name="{{ !empty($field['name']) ? $field['name'] : '' }}"
                            label="{{ $field['label'] }}"
                            value="{{ !empty($field['value']) ? $field['value'] : ''}}"
                            class="form-control-sm">
                        </x-form.input>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <x-form.button type="submit" color="primary" class="me-2">
                    @lang("Update :model", ['model' => "Usuario"])
                    </x-form.button>
                    <x-form.button  color="danger" :route="url()->previous()">
                        @lang("Go Back")
                    </x-form.button>
                </div>
            </x-form>
        </x-card>
    </main>
@endsection
```

###### Creamos los componentes form, input y button.

> Typee: en la Consola:
```console
php artisan make:component Form
php artisan make:component Form/Input
php artisan make:component Form/Button
```

> Abrimos el archivo `Form.php` en la carpeta `app\View\Components\Form.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public
    $route,
    $method,
    $class,
    $style;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $route,
        $method = "post",
        $class = null,
        $style = null
        )
    {
        $this->route = $route;
        $this->method = $method;
        $this->class = $class;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
```

> Abrimos el archivo `form.blade.php` en la carpeta `resources\views\components\form.blade.php` y escribimos lo siguiente.

```php
<form action="{{$route}}" method="post" {{ $attributes->merge(['class' => "$class"]) }} {{ $attributes->style([$style]) }}>
    @csrf
    @method($method)
    {{$slot}}
</form>
```

> Abrimos el archivo `Input.php` en la carpeta `app\View\Components\Form\Input.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public
    $type,
    $id,
    $name,
    $placeholder,
    $label,
    $class,
    $value;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type,
        $id,
        $name = null,
        $placeholder = null,
        $label = "Example",
        $class = null,
        $value = null
        )
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
```

> Abrimos el archivo `input.blade.php` en la carpeta `resources\views\components\form\input.blade.php` y escribimos lo siguiente.

```php
<div>
    <label class="ms-1" for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" {{ $attributes->merge(['class' => "form-control $class "]) }}
        id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">
    @if ($id == 'repeat_password')
        <div id="repeat_password_message" class="d-none invalid">
            <small>*@lang('The passwords do not match').</small>
        </div>
    @else
        @if ($errors->create->first($name))
                <small class="text-danger">*{{ $errors->create->first($name) }}</small>
        @elseif ($errors->edit->first($name))
                <small class="text-danger">*{{ $errors->edit->first($name) }}</small>
        @else
            @error($name)
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        @endif
    @endif
</div>
```

> Abrimos el archivo `Button.php` en la carpeta `app\View\Components\Form\Button.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public
    $type,
    $color,
    $class,
    $route;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = null,
        $color = "primary",
        $class = null,
        $route = null
        )
    {
        $this->type = $type;
        $this->color = $color;
        $this->class = $class;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.button');
    }
}
```

> Abrimos el archivo `button.blade.php` en la carpeta `resources\views\components\form\button.blade.php` y escribimos lo siguiente.

```php
@if ($type == "submit")
    <button type="{{$type}}" {{ $attributes->merge(['class' => "btn btn-$color $class "]) }}>
        {{$slot}}
    </button>
@else
    <a {{ $attributes->merge(['class' => "btn btn-$color $class "]) }} href="{{ $route  }}">
        {{$slot}}
    </a>
@endif
```

> Abrimos el archivo `es.json` en la carpeta `lang\es.json` y añadimos lo siguiente.

```json
    "The passwords do not match" : "Los passwords no coinciden",
    "Update :model" : "Actualizar :model",
    "Go Back" : "Volver"
```

> Abrimos el archivo `_variables.scss` en la carpeta `node_modules\bootstrap\scss\_variables.scss` y cambiamos lo siguiente.

```scss
$enable-grid-classes = false
$enable-cssgrid = true
```

**`Nota :` Realizamos el cambio para utilizar las clases de `grid` en bootstrap en vez de las clases `row y col`.**

###### Creamos componente modal.

> Typee: en la Consola:
```console
php artisan make:component Modal
```

> Abrimos el archivo `Modal.php` en la carpeta `app\View\Components\Modal.php` y escribimos lo siguiente.

```php
<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public
    $id,
    $title,
    $class,
    $name,
    $model,
    $btndismiss,
    $btndismisscolor,
    $btnaction,
    $btnactioncolor,
    $btnactionroute,
    $btnactionmethod,
    $routeform,
    $methodform,
    $classform,
    $styleform;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $id,
        $title,
        $class = null,
        $name = null,
        $model = null,
        $btndismiss = "Do not continue",
        $btndismisscolor = "btn-secondary",
        $btnaction = "Continue",
        $btnactioncolor = "btn-primary",
        $btnactionroute = null,
        $btnactionmethod = null,
        $routeform = null,
        $methodform = "post",
        $classform = null,
        $styleform = null,
        )
    {
        $this->id = $id;
        $this->title = $title;
        $this->class = $class;
        $this->name = $name;
        $this->model = $model;
        $this->btndismiss = $btndismiss;
        $this->btndismisscolor = $btndismisscolor;
        $this->btnaction = $btnaction;
        $this->btnactioncolor = $btnactioncolor;
        $this->btnactionroute = $btnactionroute;
        $this->btnactionmethod = $btnactionmethod;
        $this->routeform = $routeform;
        $this->methodform = $methodform;
        $this->classform = $classform;
        $this->styleform = $styleform;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
```

> Abrimos el archivo `modal.blade.php` en la carpeta `resources\views\components\modal.blade.php` y escribimos lo siguiente.

```php
<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div {{ $attributes->merge(['class' => "modal-dialog $class"]) }}>
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    {{ $title }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModalErrors()"></button>
            </div>
            @if ($title == 'Create' || $title == 'Edit')
                <form action="{{ $routeform ?? '' }}" method="post" {{ $attributes->merge(['class' => "$classform"]) }}
                    {{ $attributes->style([$styleform]) }}>
                    @csrf
                    @method($methodform)
            @endif
            <div class="modal-body">
                @switch($title)
                    @case('Delete')
                        <strong> @lang("You're sure ?")</strong> @lang('you want to delete the :model <strong>:name</strong>, if you click continue, the :model will be deleted and cannot be recovered.', ['name' => $name, 'model' => $model])
                    @break

                    @default
                        {{ $slot }}
                @endswitch
            </div>
            <div class="modal-footer">
                @switch($title)
                    @case('Delete')
                    @case('Create')
                    @case('Edit')
                        <button type="button" {{ $attributes->merge(['class' => "btn $btndismisscolor"]) }}
                            data-bs-dismiss="modal" onclick="closeModalErrors()" >@lang("$btndismiss")</button>
                        @if ($title == 'Create' || $title == 'Edit')
                            <button type="submit"
                                {{ $attributes->merge(['class' => "btn $btnactioncolor"]) }}>@lang("$btnaction")</button>
                        @else
                            <form action="{{ $btnactionroute }}" method="post">
                                @csrf
                                @method($btnactionmethod)
                                <button
                                    type="submit"{{ $attributes->merge(['class' => "btn $btnactioncolor"]) }}>@lang("$btnaction")</button>
                            </form>
                        @endif
                    @break

                    @default
                        {{ $footer }}
                @endswitch
            </div>
            @if ($title == 'Create' || $title == 'Edit')
                </form>
            @endif
        </div>
    </div>
</div>
<script type="module">
    function closeModalErrors() {
        $('.text-danger').remove();
    }
    window.closeModalErrors = closeModalErrors;
</script>
```

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\admin\users\index.blade.php` y lo dejamos de esta manera.

```php
@extends('layouts.dashboard')

@section('title', 'List Users')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>List Users</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle" theadclass="table-dark">
            @foreach ($users as $user)
                <tr class="{{ $user->id == auth()->user()->id ? 'table-active ' : '' }}">
                    <th scope="col">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width=332px;">
                            {{ $user->email }}
                        </span>
                    </td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>

                        {{ $user->email_verified_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                    <td class="text-center">
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='modal' route="" class='btn-outline-danger' target="#deleteuser{{ $user->id }}">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                </x-slot>
                            </x-table.button>
                        </span>
                    </td>
                </tr>
                <x-modal id="deleteuser{{ $user->id }}" class="modal-dialog-centered" title="Delete" name="{{$user->name}}" model="user" btnactioncolor="btn-danger" :btnactionroute="route('users.destroy', $user)" btnactionmethod="delete"></x-modal>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($users as $user)
            <x-table class="table-striped {{ $user->id == auth()->user()->id ? 'table-active ' : '' }}" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteuser{{ $user->id }}">
                        <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                    </button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $user->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Name :</strong>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Email :</strong>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Role :</strong>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Verified :</strong>
                        {{ $user->email_verified_at->format('d-m-Y') }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $user->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
            <x-modal id="deleteuser{{ $user->id }}" class="modal-dialog-centered" title="Delete" name="{{$user->name}}" model="user" btnactioncolor="btn-danger" :btnactionroute="route('users.destroy', $user)" btnactionmethod="delete"></x-modal>
        @endforeach
        {{ $users->links() }}
    </main>
@endsection
```


> Abrimos el archivo `es.json` en la carpeta `lang\es.json` cambiamos y añadimos lo siguiente.

```json
"You're sure ?" : "Estas seguro ?",
"you want to delete the :model <strong>:name</strong>, if you click continue, the :model will be deleted and cannot be recovered." : "que desea eliminar el :model <strong>:name</strong>, si hace clic en continuar, el :model se eliminará y no se podrá recuperar.",
"Delete" : "Borrar",
"Do not continue" : "No continuar",
"Continue" : "Continuar"
```
###### Creamos controlador para los roles.

> Typee: en la Consola:
```console
php artisan make:controller RoleController -m Role -r -R
```

**`Nota :` con la instrucción `-R` creamos también los request.**

> Abrimos el archivo `RoleController.php` en la carpeta `app\Http\Controllers\RoleController.php` y escribimos lo siguiente.

```php
<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $headName = ['#', 'Name', 'Slug', 'Date', 'Options'];
        $fields = [
            [
                'id' => 'name',
                'name' => 'name',
                'label' => 'Name :',
                'type' => 'text',
                'placeholder' => 'Name',
                'value' => old('name', $role->name),
            ],
        ];
        $roles = Role::orderBy('id')->paginate(10);
        return view(
            'admin.roles.index',
            compact('roles', 'headName', 'fields')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request['name'], '-')]);
            Role::create($request->all());
            return back()->with('message', [
                'type' => 'success',
                'title' => 'Éxito !',
                'message' => 'El Role a sido guardado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        try {
            $request->merge(['slug' => Str::slug($request['name'], '-')]);
            $role->update($request->all());
            return back()->with('message', [
                'type' => 'info',
                'title' => 'Éxito !',
                'message' => 'El Role a sido actualizado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return back()->with('message', [
                'type' => 'warning',
                'title' => 'Éxito !',
                'message' => 'El Role a sido eliminado correctamente.',
            ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
}
```

> Abrimos el archivo `StoreRoleRequest.php` en la carpeta `app\Http\Requests\StoreRoleRequest.php` y escribimos lo siguiente.

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    protected $errorBag = 'create';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:150',
        ];
    }
}
```

> Abrimos el archivo `UpdateRoleRequest.php` en la carpeta `app\Http\Requests\UpdateRoleRequest.php` y escribimos lo siguiente.

```php
<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class UpdateRoleRequest extends FormRequest
{
    protected $errorBag = 'edit';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:150',
        ];
    }
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                $validator->errors()->add('id', $this->id);
            }
        });
    }
}
```

> Abrimos el archivo `Role.php` en la carpeta `app\Models\Role.php` y añadimos lo siguiente.

```php
    public function getRouteKeyName()
    {
        return 'slug';
    }
```

> Abrimos el archivo `User.php` en la carpeta `app\Models\User.php` y añadimos lo siguiente.

```php
    public function getRouteKeyName()
    {
        return 'name';
    }
```

> Abrimos el archivo `Aside.php` en la carpeta `app\View\Components\Aside.php` y añadimos lo siguiente.

```php
        [
            'name' => 'Roles',
            'active' =>  '',
            'icono' => 'fa-solid fa-users-gear fa-lg',
            'icono_color' => '#c12115',
            'name_collapse' => 'collapseHeightRoles',
            'items' => [
                [
                    'name' => 'List roles',
                    'route' => route('roles.index'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-users-gear fa-lg',
                    'icono_color' => '#c12115',
                ]
            ]
        ],
```

> Abrimos el archivo `Button.php` en la carpeta `app\View\Components\Table\Button.php` y lo dejamos de esta manera.

```php
<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public
    $type,
    $route,
    $class,
    $method,
    $target;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type,
        $route,
        $class,
        $method = null,
        $target = null
        )
    {
        $this->type = $type;
        $this->route = $route;
        $this->class = $class;
        $this->method = $method;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.button');
    }
}
```

> Abrimos el archivo `web.php` en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
use App\Http\Controllers\RoleController;

.....

Route::resource('roles', RoleController::class);
```

> Abrimos el archivo `index.blade.php` en la carpeta `resources\views\admin\users\index.blade.php` y lo dejamos de esta manera.

```php
@extends('layouts.dashboard')

@section('title', 'List Users')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>List Users</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle" theadclass="table-dark">
            @foreach ($users as $user)
                <tr class="{{ $user->id == auth()->user()->id ? 'table-active ' : '' }}">
                    <th scope="col">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width=332px;">
                            {{ $user->email }}
                        </span>
                    </td>
                    <td>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>

                        {{ $user->email_verified_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                    <td class="text-center">
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='modal' route="" class='btn-outline-danger' target="#deleteuser{{ $user->id }}">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                </x-slot>
                            </x-table.button>
                        </span>
                    </td>
                </tr>
                <x-modal id="deleteuser{{ $user->id }}" class="modal-dialog-centered" title="Delete" name="{{$user->name}}" model="user" btnactioncolor="btn-danger" :btnactionroute="route('users.destroy', $user)" btnactionmethod="delete"></x-modal>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($users as $user)
            <x-table class="table-striped {{ $user->id == auth()->user()->id ? 'table-active ' : '' }}" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteuser{{ $user->id }}">
                        <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                    </button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $user->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Name :</strong>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Email :</strong>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Role :</strong>
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Verified :</strong>
                        {{ $user->email_verified_at->format('d-m-Y') }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $user->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
            <x-modal id="deleteuser{{ $user->id }}" class="modal-dialog-centered" title="Delete" name="{{$user->name}}" model="user" btnactioncolor="btn-danger" :btnactionroute="route('users.destroy', $user)" btnactionmethod="delete"></x-modal>
        @endforeach
        {{ $users->links() }}
    </main>
@endsection
```

> Creamos y abrimos el archivo `index.blade.php` en la carpeta `resources\views\admin\roles\index.blade.php` y lo dejamos de esta manera.

```php
@extends('layouts.dashboard')

@section('title', 'List Roles')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        @include('layouts.components.alert')
        <x-card class="mt-2" classheader="d-flex justify-content-between">
            <x-slot name="card_header">
                <h1>List Roles</h1>
                <div class="align-self-center">
                    <button id="btncreaterole" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createrole"> Create Role</button>
                </div>
            </x-slot>
            {{-- Tabla --}}
            <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle"
                theadclass="table-dark">
                @foreach ($roles as $role)
                    <tr>
                        <th scope="col">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        {{-- <td>
                            @foreach ($role->roles as $role)
                                <span class="badge bg-primary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td> --}}
                        <td>{{ $role->updated_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <span class="d-inline-flex">
                                <x-table.button type='modal' route="" class='btn-outline-warning me-1'
                                    target="#editrole{{ $role->id }}">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                    </x-slot>
                                </x-table.button>
                                <x-table.button type='modal' route="" class='btn-outline-danger'
                                    target="#deleterole{{ $role->id }}">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                    </x-slot>
                                </x-table.button>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </x-table>
            {{-- Tabla en Movil --}}
            @foreach ($roles as $role)
                <x-table class="table-striped {{ $role->id == auth()->user()->id ? 'table-active ' : '' }}"
                    typetable="movil">
                    <x-slot name="head">
                        <x-table.button type='modal' route="" class='btn-outline-warning me-1'
                            target="#editrole{{ $role->id }}">
                            <x-slot name="icon">
                                <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                            </x-slot>
                        </x-table.button>
                        <x-table.button type='modal' route="" class='btn-outline-danger'
                            target="#deleterole{{ $role->id }}">
                            <x-slot name="icon">
                                <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                            </x-slot>
                        </x-table.button>
                    </x-slot>
                    <tr>
                        <th scope="col" class="d-flex flex-column">
                            <strong># :</strong>
                            {{ $role->id }}
                        </th>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Name :</strong>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Slug :</strong>
                            {{ $role->slug }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <td class="d-flex flex-column">
                            <strong>Role :</strong>
                            @foreach ($role->roles as $role)
                                <span class="badge bg-primary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>
                    </tr> --}}
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Date :</strong>
                            {{ $role->updated_at->format('d-m-Y') }}
                        </td>
                    </tr>
                </x-table>
                {{-- Modal Borrar --}}
                <x-modal id="deleterole{{ $role->id }}" class="modal-dialog-centered" title="Delete"
                    name="{{ $role->name }}" model="role" btnactioncolor="btn-danger" :btnactionroute="route('roles.destroy', $role)"
                    btnactionmethod="delete"></x-modal>
                {{-- Modal Editar --}}
                <x-modal id="editrole{{ $role->id }}" class="modal-dialog-centered editrole" title="Edit"
                    btnactioncolor="btn-success" btndismiss="Cancel" btnaction="Update" :routeform="route('roles.update', $role)" methodform="patch"
                    styleform="width:100%">
                    <div>
                        @foreach ($fields as $field)
                            <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                                placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                                name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                                value="{{ $role->name }}" class="form-control-sm">
                            </x-form.input>
                        @endforeach
                        <input type="hidden" value="{{ $role->id }}" name="id">
                    </div>
                </x-modal>
            @endforeach
            <x-slot name="card_footer">
                {{ $roles->links() }}
            </x-slot>
        </x-card>
        {{-- Modal Crear --}}
        <x-modal id="createrole" class="modal-dialog-centered" title="Create" btnactioncolor="btn-success"
            btndismiss="Cancel" btnaction="Save" :routeform="route('roles.store')" methodform="post" styleform="width:100%" modal="create">
            <div>
                @foreach ($fields as $field)
                    <x-form.input type="{{ $field['type'] }}" id="{{ !empty($field['id']) ? $field['id'] : '' }}"
                        placeholder="{{ !empty($field['placeholder']) ? $field['placeholder'] : '' }}"
                        name="{{ !empty($field['name']) ? $field['name'] : '' }}" label="{{ $field['label'] }}"
                        value="{{ !empty($field['value']) ? $field['value'] : '' }}" class="form-control-sm">
                    </x-form.input>
                @endforeach
            </div>
        </x-modal>
    </main>
    @if ($errors->create->any())
        <script  type="module">
             $('#createrole').modal('show');
        </script>
    @elseif ($errors->edit->any())
        <script  type="module">
            var id = {{$errors->edit->first('id')}}
            $("#editrole" + id.toString()).modal('show');
        </script>
    @endif
@endsection
```

> Creamos y abrimos el archivo `index.blade.php` en la carpeta `resources\views\admin\roles\index.blade.php` y lo dejamos de esta manera.

###### Instalamos Jquery.

> Typee: en la Consola:
```console
npm install jquery --save-dev
npm i jquery-ui
```

> Abrimos el archivo `bootstrap.js` en la carpeta `resources\js\bootstrap.js` y añadimos lo siguiente.

```js
import $ from 'jquery';
window.jQuery = window.$ = $;
```

> Abrimos el archivo `app.js` en la carpeta `resources\js\app.js` y añadimos lo siguiente.

```js
import 'jquery-ui/dist/jquery-ui';
```

[Subir](#top)
