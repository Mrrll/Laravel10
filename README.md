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
>Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y escribimos  dentro de la Clase `HomController`.

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
>Abrimos el archivo `HomeController.php` que esta en la carpeta `app\Http\Controllers\HomeController.php` y escribimos  dentro de la función `__invoke`.

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
>Abrimos el archivo `CursoController.php` que esta en la carpeta `app\Http\Controllers\CursoController.php` y escribimos  dentro de la función `index`.

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

>Abrimos el archivo `CursoController.php` que esta en la carpeta `app\Http\Controllers\CursoController.php` y escribimos  dentro de la función `show`.

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
