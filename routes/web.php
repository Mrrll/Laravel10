<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Mail\ContactanosMailable;
// use Illuminate\Support\Facades\Mail;

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

Route::get('/',HomeController::class)->name('home');
Route::resource('cursos',CursoController::class);
Route::view('nosotros', 'nosotros')->name('nosotros');
Route::get('contactanos',[ContactanosController::class, 'index' ])->name('contactanos.index');
Route::post('contactanos',[ContactanosController::class, 'store'])->name('contactanos.store');

Route::get('prueba', function () {
    return "Has accedido correctamente a esta ruta";
})->middleware('age');

Route::get('no-autorizado', function () {
    return "Usted no es mayor de edad";
});
