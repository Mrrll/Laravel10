<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return 'Hola mundo';
// });
Route::get('/',HomeController::class);
// Route::get('cursos', function () {
    //     return 'Bienvenido a la pagina cursos';
// });
Route::get('cursos',[CursoController::class,'index']);
// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenido al cursos: $curso";
// });
Route::get('cursos/create',[CursoController::class,'create']);
// Route::get('cursos/{curso}/{categoria}', function ($curso, $categoria) {
//     return "Bienvenido al cursos: $curso, de la categoria: $categoria";
// });
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
//     if($categoria){
//         return "Bienvenido al cursos: $curso, de la categoria: $categoria";
//     } else {
//         return "Bienvenido al cursos: $curso";
//     }
// });
Route::get('cursos/{curso}',[CursoController::class,'show']);
