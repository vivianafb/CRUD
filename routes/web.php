<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoriaController;

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


Route::resource('serie', SerieController::class)->middleware('auth');
Route::get('/serie/imagen-upload/{id}', [SerieController::class, 'imagen'])->name('serie.imagen');

Route::put('/serie/upload-imagen/{id}', [SerieController::class, 'upload'])->name('serie.upload');


Route::get('/', [SerieController::class, 'inicio'])->name('serie.inicio');

Auth::routes(['reset'=>false]);

Route::get('/home', [SerieController::class, 'inicio'])->name('home');

Route::resource('/carrito', CarritoController::class)->middleware('auth');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
Route::put('/carrito/agregar/{id}/{user}/{precio}', [CarritoController::class, 'agregar'])->name('carrito.agregar');

// Route::get('/carrito', [CarritoController::class, 'store'])->name('carrito.store');
 

//Categorias

Route::resource('categoria', CategoriaController::class)->middleware('auth');
;
