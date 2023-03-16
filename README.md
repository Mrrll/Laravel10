# Laravel 10

## Requisitos

- [PHP8^|"Xammp"](https://www.apachefriends.org/es/download.html).
- [Composer](https://getcomposer.org/).
- [Node.js](https://nodejs.org/).
- [Npm](https://docs.npmjs.com/).
- [Git](https://git-scm.com/).
- [Laravel](https://laravel.com/docs/10.x).

###### Problemas/Soluciones

> Actualizar Composer que rquiere laravel : Utilizar Consola como Admin.

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

> Al instalar Laravel hay que asegurarse que en el archivo `php.ini` que esta en la carperta `C:\xampp\php\php.ini` este decomentado la extension `extension=zip`.

<a name="top"></a>

## Indice de Contenidos.

- [Instalacion](#item1)

<a name="item1"></a>

## Instalacion

###### Instalacion de Laravel

>Typee: en la Consola:
```console
    composer create-project laravel/laravel example-app
```
**`Nota:` El nombre `example-app` lo cambiamos por el nombre de nuestra aplicacion.

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
**`Nota:` Si no tenemos agregado el nombre y el email en la configuracion de git.

>Typee: en la Consola:
```console
    git add .
```

**`Nota:` Preparamos los archivos que queremos subir.
>Typee: en la Consola:
```console
    git commit -m "Instalacion del Proyecto"
```
**`Nota:` Creamos el Comentario y guardamos los archivo modificados o nuevos de nuestro repositorio en local.

>Typee: en la Consola:
```console
    git push -f origin master
```
**`Nota:` Subimos los archivos o repositorio local al servidor de github.
