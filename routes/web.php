<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoriaController;
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



// Route::get('/serie', function () {
//     return view('serie.index');
// });

// Route::get('/serie/create',[SerieController::class,'create']);

Route::group(['middleware' => 'auth'], function() {
    Route::resource('serie', SerieController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('carrito', CarritoController::class);
    Route::resource('usuario', UserController::class);
  });

Route::get('/serie/imagen-upload/{id}', [SerieController::class, 'imagen'])->name('serie.imagen');
Route::put('/serie/upload-imagen/{id}', [SerieController::class, 'upload'])->name('serie.upload');


Route::get('/', [SerieController::class, 'inicio'])->name('serie.inicio');
//Route::get('/', [SerieController::class, 'buscar'])->name('serie.buscar');
// Route::get('/serie/nombre/{nombre}', [SerieController::class, 'buscar'])->name('serie.buscar');

Auth::routes(['reset'=>false]);

Route::get('/home', [SerieController::class, 'inicio'])->name('home');
Route::resource('usuario', UserController::class);
Route::put('carrito/{idUsuario}/{idSerie}', [CarritoController::class, 'store'])->name('carrito.store');
