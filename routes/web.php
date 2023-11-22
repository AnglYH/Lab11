<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/guardar-vuelo', [App\Http\Controllers\HomeController::class, 'guardarVuelo'])->name('guardar-vuelo');
Route::get('/lista-vuelos', [App\Http\Controllers\HomeController::class, 'verListaVuelos'])->name('lista-vuelos');
Route::get('/editar-vuelo/{id}', [App\Http\Controllers\HomeController::class, 'editarVuelo'])->name('editar-vuelo');
Route::post('/actualizar-vuelo/{id}', [App\Http\Controllers\HomeController::class, 'actualizarVuelo'])->name('actualizar-vuelo');
Route::get('/eliminar-vuelo/{id}', [App\Http\Controllers\HomeController::class, 'eliminarVuelo'])->name('eliminar-vuelo');
Route::get('/agregar-pasajeros/{id}', [App\Http\Controllers\HomeController::class, 'agregarPasajeros'])->name('agregar-pasajeros');
Route::post('/guardar-pasajeros/{id}', [App\Http\Controllers\HomeController::class, 'guardarPasajeros'])->name('guardar-pasajeros');
