<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//


Route::group(['middleware' => 'auth'], function() {
    Route::resource('serie', SerieController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('carrito', CarritoController::class);
    Route::resource('usuario', UserController::class);
  });

Route::get('/serie/imagen-upload/{id}', [SerieController::class, 'imagen'])->name('serie.imagen');
Route::put('/serie/upload-imagen/{id}', [SerieController::class, 'upload'])->name('serie.upload');


Route::get('/', [SerieController::class, 'inicio'])->name('serie.inicio');

Auth::routes(['reset'=>false]);

Route::get('/home', [SerieController::class, 'inicio'])->name('home');


Route::get('usuario/perfil/{id}', [UserController::class, 'perfil'])->name('usuario.perfil');

Route::put('carrito/{idUsuario}/{idSerie}', [CarritoController::class, 'store'])->name('carrito.store');
Route::delete('carrito/{idSerie}/{idCarrito}', [CarritoController::class, 'destroy'])->name('carrito.eliminar');



Route::get('carrito.mensaje',[MailController::class , 'getMail'])->name('carrito.mensaje');

Route::put('carrito', [CarritoController::class, 'index'])->name('carrito.index');

Route::get('csv/series', [CsvController::class , 'descargarCsv'])->name('csv');


