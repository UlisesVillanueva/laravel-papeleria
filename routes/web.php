<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//llamada al fb para authenticar
Route::get('login/{socialnetwork}','SocialLoginController@redirectToNetwork')->name('login.social')->middleware('guest');

//Devuelve los datos que permitio el usuario
Route::get('login/{socialnetwork}/callback','SocialLoginController@handleCallback')->name('login.callback')->middleware('guest');


Route::resource('/Proveedor','ProveedorController');
Route::resource('/Producto','ProductoController');
Route::resource('/Venta','VentaController');
Route::resource('/Compra','CompraController');

Route::get('productos','ProductoController@index')->name('productos');
Route::get('proveedores','ProveedorController@index')->name('proveedores');
Route::get('compras','CompraController@index')->name('compras');
Route::get('ventas','VentaController@index')->name('ventas');
