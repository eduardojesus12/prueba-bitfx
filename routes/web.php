<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/load/prov', 'ProveedorController@load')->name('cargar.proveedores');
Route::get('/prov/accept/{id}', 'ProveedorController@accept')->name('proveedor.aceptar');
Route::get('/prov/reject/{id}', 'ProveedorController@reject')->name('proveedor.rechazar');