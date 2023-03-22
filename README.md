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

**`Nota:` También se puede prescindir del archivo `CursoSeeder` si añadimos la instrucción `Curso::factory(50)->create();` en el archivo `DatabaseSeeder.php` y importamos la clase del modelo `use App\Models\Curso;`.**

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

<a name="item11"></a>

## Mutadores y Accesores

###### Crear Mutador

>Abrimos el archivo `User.php`  en la carpeta `app\Models\User.php` y importamos la clase `Attribute`.

```php
use Illuminate\Database\Eloquent\Casts\Attribute;
```

>Y creamos un método protegido dentro de la clase User.

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

>Y creamos un método protegido dentro de la clase User.

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

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en la función `index` escribimos lo siguiente.

```php
        $cursos = Curso::paginate();
        return view('cursos.index', compact('cursos'));
```

**`Nota:` Importamos el modelo Curso `use App\Models\Curso;`.**

>Abrimos el archivo `index.blade.php`  en la carpeta `resources\views\cursos\index.blade.php` y dentro de `@section('content')` escribimos lo siguiente.

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

>Abrimos el archivo `plantilla.blade.php`  en la carpeta `resources\views\layouts\plantilla.blade.php` y importamos el CDN.

```php
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
```

**`Nota:` Seguimos sin el CDN de `Tailwind`.**

>Crear nombre identificativo a las rutas.

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
    Route::get('cursos','index')->name('cursos.index');
    Route::get('cursos/create','create')->name('cursos.create');
    Route::get('cursos/{curso}','show')->name('cursos.show');
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en la función `show` escribimos lo siguiente.

```php
    public function show($id)
    {
        $curso = Curso::find($id);
        return view('cursos.show', compact('curso'));
    }
```

>Abrimos el archivo `show.blade.php`  en la carpeta `resources\views\cursos\show.blade.php` y escribimos lo siguiente.

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

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en la función `create` escribimos lo siguiente.

```php
return view('cursos.create');
```

>Creamos el archivo `create.blade.php`  en la carpeta `resources\views\cursos\create.blade.php` y escribimos lo siguiente.

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

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::post('cursos/create','store')->name('cursos.store');
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y escribimos lo siguiente.

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
$cursos = Curso::orderBy('id', 'desc')->paginate();
```

###### Actualizar registros

>Abrimos el archivo `show.blade.php`  en la carpeta `resources\views\cursos\show.blade.php` y añadimos lo siguiente.

```php
<br>
    <a href="{{route('cursos.edit', $curso)}}">Editar Cursos</a>
```

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('cursos/{curso}/edit','edit')->name('cursos.edit');
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y escribimos lo siguiente.

```php
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }
```

>Creamos el archivo `edit.blade.php`  en la carpeta `resources\views\cursos\edit.blade.php` y escribimos lo siguiente.

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

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::put('cursos/{curso}','update')->name('cursos.update');
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y escribimos lo siguiente.

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

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en la función `store` escribimos lo siguiente.

```php
        $request->validate([
            'name' => 'required|max:10',
            'description' => 'required|min5',
            'categoria' => 'required',
        ]);
```

>Abrimos el archivo `create.blade.php`  en la carpeta `resources\views\cursos\create.blade.php` y añadimos debajo de los `label` lo siguiente.

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

>Typee: en la Consola:
```console
composer require laravel-lang/common
```

**`Nota :` Si tu proyecto no tiene la instalación del lenguaje.**

>Typee: en la Consola:
```console
php artisan lang:add es
```

**`Nota :` Añade a tu proyecto el lenguaje.**

>Typee: en la Consola:
```console
composer install
```

**`Nota :` Para instalar paquetes desde composer.json.**

**`Nota :`[laravel-lang](https://laravel-lang.com/installation/).**

>Abrimos el archivo `app.php`  en la carpeta `config\app.php` y en `locale` añadimos lo siguiente.

```php
'locale' => 'es'>
```

###### Eliminar registro

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` añadimos lo siguiente.

```php
Route::delete('cursos/{curso}','destroy')->name('cursos.destroy');
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` añadimos lo siguiente.

```php
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
```
>Abrimos el archivo `show.blade.php`  en la carpeta `resources\views\cursos\show.blade.php` añadimos lo siguiente.

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

>Typee: en la Consola:
```console
php artisan make:request StoreCursoRequest
```

>Abrimos el archivo `StoreCursoRequest.php`  en la carpeta `app\Http\Requests\StoreCursoRequest.php` y en `authorize` añadimos lo siguiente.

```php
return true;
```

>Y en `rules` escribimos lo siguiente.

```php
            'name' => 'required|max:10',
            'description' => 'required|min:5',
            'categoria' => 'required',
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en `store` eliminamos lo siguiente.

```php
        $request->validate([
            'name' => 'required|max:10',
            'description' => 'required|min:5',
            'categoria' => 'required',
        ]);
```

>Y en `store` cambiamos lo siguiente.

```php
public function store(StoreCursoRequest $request)
```

**`Nota :` Importamos la Clase `use App\Http\Requests\StoreCursoRequest;` .**

>Abrimos el archivo `StoreCursoRequest.php`  en la carpeta `app\Http\Requests\StoreCursoRequest.php` y en `authorize` añadimos lo siguiente.

```php
    public function attributes()
    {
        return [
            'name' => 'El nombre del curso'
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

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en `store` eliminamos lo siguiente.

```php
        $curso = new Curso();
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();
```

>Y añadimos lo siguiente.

```php
$curso = Curso::create($request->all());
```

>Abrimos el archivo `Curso.php`  en la carpeta `app\Models\Curso.php` y dentro de la clase `Curso` añadimos lo siguiente.

```php
    protected $fillable = [
        'name','description','categoria'
    ];
    protected $guarded = ['status'];
```

**`Nota :` Con `$fillable` Añadimos los campos que pueden ser almacenados masivamente y con `$guarded` Excluimos los campos.**

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en `update` eliminamos lo siguiente.

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
>Y en `update` cambiamos lo siguiente.

```php
public function update(StoreCursoRequest $request, Curso $curso)
```

**`Nota :` Importamos la Clase `use App\Http\Requests\StoreCursoRequest;` .**

>Y añadimos lo siguiente.

```php
$curso->update($request->all());
```

[Subir](#top)

<a name="item15"></a>

## Agrupar Rutas con Route Resource

>Typee: en la Consola:
```console
php artisan r:l
```
**`Nota :` Lista las ruta de la app.**

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y eliminamos lo siguiente.

```php
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos','index')->name('cursos.index');
    Route::get('cursos/create','create')->name('cursos.create');
    Route::post('cursos/create','store')->name('cursos.store');
    Route::get('cursos/{curso}','show')->name('cursos.show');
    Route::get('cursos/{curso}/edit','edit')->name('cursos.edit');
    Route::put('cursos/{curso}','update')->name('cursos.update');
    Route::delete('cursos/{curso}','destroy')->name('cursos.destroy');
});
```

> Y añadimos lo siguiente.

```php
Route::resource('cursos',CursoController::class);
```

**`Nota :` Agrupa las rutas gracias a la convención de los nombres.**

###### Cambiar nombres de sub-rutas utilizando resource

>Abrimos el archivo `AppServiceProvider.php`  en la carpeta `app\Providers\AppServiceProvider.php` y en la función `boot` escribimos lo siguiente.

```php
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);
```

**`Nota :` Importamos la clase `use Illuminate\Support\Facades\Route;`.**

###### Cambiar nombres de rutas utilizando resource

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::resource('asignaturas',CursoController::class)->names('cursos');
```

###### Cambiar nombres de las variables utilizando resource

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y añadimos lo siguiente.

```php
Route::resource('asignaturas',CursoController::class)->parameter('asignaturas', 'curso')->names('cursos');
```

[Subir](#top)

<a name="item16"></a>

## Url's amigables

>Abrimos el archivo `XXXX_XX_XX_XXXXXX_create_cursos_table.php`  en la carpeta `database\migrations\XXXX_XX_XX_XXXXXX_create_cursos_table.php` y en la función `up` añadimos lo siguiente.

```php
$table->string('slug');
```

>Abrimos el archivo `CursoFactory.php`  en la carpeta `database\factories\CursoFactory.php` y en la función `definition` cambiamos lo siguiente.

```php
        $name = $this->faker->sentence();
        return [
            'name' => $name,
           'slug' => Str::slug($name, '-'),
           'description' => $this->faker->paragraph(),
           'categoria' => $this->faker->randomElement(["Desarrollo web", "Diseño web"])
        ];
```

**`Nota :` Importamos la clase `use Illuminate\Support\Str;`.**

>Typee: en la Consola:
```console
php artisan migrate:fresh --seed
```

 >Abrimos el archivo `index.blade.php`  en la carpeta `resources\views\cursos\index.blade.php` y cambiamos lo siguiente.

```php
<a href="{{route('cursos.show', $curso)}}">{{$curso->name}}</a>
```

>Abrimos el archivo `CursoController.php`  en la carpeta `app\Http\Controllers\CursoController.php` y en la función `show` cambiamos lo siguiente.

 ```php
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }
 ```

>Abrimos el archivo `Curso.php`  en la carpeta `app\Models\Curso.php` y añadimos lo siguiente.

 ```php
    public function getRouteKeyName()
    {
        return 'slug';
    }
 ```

[Subir](#top)

<a name="item17"></a>

## Navegabilidad web

>Abrimos el archivo `plantilla.blade.php`  en la carpeta `resources\views\layouts\plantilla.blade.php`  y dentro del `head` escribimos lo siguiente.

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

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('/',HomeController::class)->name('home');
Route::view('nosotros', 'nosotros')->name('nosotros');
```

**`Nota :` El método `view` se utiliza para mostrar una vista que no conecte con la base de datos.**

>Creamos el archivo `nosotros.php`  en la carpeta `resources\views\nosotros.blade.php` y escribimos lo siguiente.

```php
@extends('layouts.plantilla')

@section('title', 'Nosotros')

@section('content')
    <h1>Nosotros</h1>
@endsection
```

###### Trocear Código Blade

>Creamos el archivo `header.blade.php`  en la carpeta `resources\views\layouts\partials\header.blade.php` y escribimos lo siguiente.

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
>Abrimos el archivo `plantilla.blade.php`  en la carpeta `resources\views\layouts\plantilla.blade.php` y borramos lo siguiente.

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
@include('layouts.partials.header')
```

[Subir](#top)

<a name="item18"></a>

## Enviar emails con laravel

>Abrimos el archivo `.env`  en la carpeta `/.env` y completamos las siguiente variables.

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

>Typee: en la Consola:
```console
php artisan make:mail ContactanosMailable
```

>Abrimos el archivo `ContactanosMailable.php`  en la carpeta `app\Mail\ContactanosMailable.php` dentro de la función `envelope` y escribimos lo siguiente.

```php
subject = "Información de Contacto",
```

**`Nota :` Asunto del mensaje.**

>Y en la función `content` y escribimos lo siguiente.

```php
view: 'emails.contactanos',
```

**`Nota :` Nueva vista blade .**

>Creamos el archivo `contactanos.blade.php`  en la carpeta `resources\views\emails\contactanos.blade.php` y escribimos lo siguiente.

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

>Abrimos el archivo `web`  en la carpeta `routes\web.php` y escribimos lo siguiente.

```php
Route::get('contactanos', function(){
    $correo = new ContactanosMailable;
    Mail::to('ejemplo@ejemplo.com')->send($correo);
    return "Mensaje enviado";
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

>Abrimos el archivo `header.blade.php`  en la carpeta `resources\views\layouts\partials\header.blade.php` y escribimos lo siguiente.

```php
<li>
    <a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.*') ? 'active' : ''}}">Contáctanos</a>
</li>
```

>Typee: en la Consola:
```console
php artisan make:controller ContactanosController
```

>Abrimos el archivo `ContactanosController.php`  en la carpeta `app\Http\Controllers\ContactanosController.php` y escribimos lo siguiente.

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

>Abrimos el archivo `web.php`  en la carpeta `routes\web.php` y borramos lo siguiente.

```php
    Route::get('contactanos', function(){
        $correo = new ContactanosMailable;
        Mail::to('ejemplo@ejemplo.com')->send($correo);
        return "Mensaje enviado";
    });
```

> Y escribimos lo siguiente.

```php
Route::get('contactanos',[ContactanosController::class, 'index' ])->name('contactanos.index');
```

> Y escribimos lo siguiente.

```php
Route::post('contactanos',[ContactanosController::class, 'store'])->name('contactanos.store');
```

>Creamos el archivo `index.blade.php`  en la carpeta `resources\views\contactanos\index.blade.php` y escribimos lo siguiente.

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

>Abrimos el archivo `ContactanosMailable.php`  en la carpeta `app\Mail\ContactanosMailable.php` y escribimos lo siguiente.

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

>Abrimos el archivo `contactanos.blade.php`  en la carpeta `resources\views\emails\contactanos.blade.php` y escribimos lo siguiente.

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

>Typee: en la Consola:
```console
npm install bootstrap @popperjs/core
```
> Instalamos Sass

>Typee: en la Consola:
```console
npm install sass --save-dev
```

>Creamos o renombramos la carpeta `css` de `resources\css` a `scss` y creamos o renombramos el archivo `app.css` a `app.scss`.

>Abrimos el archivo `app.scss` de la carpeta `resources\scss\app.scss` y escribimos lo siguiente.

```scss
@import "~bootstrap/scss/bootstrap";
```

>Abrimos el archivo `app.js` de la carpeta `resources\js\app.js` y escribimos lo siguiente.

```js
import * as bootstrap from 'bootstrap';
```

>Abrimos el archivo `vite.config.js` de la carpeta `/` y escribimos lo siguiente.

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    }
});
```

>Abrimos el archivo `plantilla.blade.php` de la carpeta `resources\views\layouts\plantilla.blade.php/` y dentro del `head` escribimos lo siguiente.

```php
@vite(['resources/scss/app.scss', 'resources/js/app.js'])
```
>Podemos inicializar los servidores Frontend y Backend

```console
php artisan serve
npm run dev
```

**`Nota :` Agradecimientos por el aporte y información a `Kim Hallberg` por su tutorial [Como usar bootstrap con laravel y vite](https://devdojo.com/thinkverse/how-to-use-bootstrap-with-laravel-and-vite).**

###### Ejemplo de modificación de vistas con  Bootstrap

>Abrimos el archivo `AppServiceProvider.php` de la carpeta `app\Providers\AppServiceProvider.php` y dentro del `boot` escribimos lo siguiente.

```php
Paginator::useBootstrap();
```

>Y importamos la clase `Paginator`.

```php
use Illuminate\Pagination\Paginator;
```

**`Nota :` Agradecimientos por el aporte y información a `codeanddeploy` por su tutorial [Laravel 9 Pagination Example using Bootstrap 5](https://codeanddeploy.com/blog/laravel/laravel-8-pagination-example-using-bootstrap-5).**

>Abrimos el archivo `header.blade.php` de la carpeta `resources\views\layouts\partials\header.blade.php` y modificamos la etiqueta `nav` escribimos lo siguiente.

```php
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
                    <li class="nav-item {{ request()->routeIs('cursos.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('nosotros') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item {{ route('contactanos.index') }}">
                        <a class="nav-link {{ request()->routeIs('contactanos.*') ? 'active' : '' }}" href="{{ route('contactanos.index') }}">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
```

>Abrimos el archivo `header.blade.php` de la carpeta `resources\views\layouts\partials\header.blade.php` y modificamos la etiqueta `nav` escribimos lo siguiente.

```php
    <div class="container">
        <div class="card" style="width: 18rem;">
            <form action="{{ route('contactanos.store') }}" method="post">
                <div class="card-header text-center">
                    <h5>Déjanos un mensaje</h5>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Iñigo Casper">
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo:</label>
                        <input type="email" class="form-control" placeholder="name@example.com">
                        @error('correo')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje:</label>
                        <textarea class="form-control" rows="4"></textarea>
                        @error('mensaje')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
                </div>
            </form>
        </div>
    </div>
```

[Subir](#top)
