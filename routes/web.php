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

Route::get('/', 'TestController@welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  
Route::get('/products/{id}', 'ProductController@show'); //

Route::post('/cart', 'CartDetailController@store'); //
Route::delete('/cart', 'CartDetailController@destroy'); //

Route::post('/order', 'CartController@update'); 




Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    
    Route::get('/products', 'ProductController@index'); //Lista de productos, dara la opcion de editarlo o eliminarlo
    Route::get('/products/create', 'ProductController@create'); //Crear nuevos productos (FORMULARIO)
    Route::post('/products', 'ProductController@store'); //Registrar producto hecho en CREATE
    Route::get('/products/{id}/edit', 'ProductController@edit'); //Editar productos (FORMULARIO)
    Route::post('/products/{id}/edit', 'ProductController@update'); //Actualizar productos 
    Route::post('/products/{id}/delete', 'ProductController@destroy'); //Form eliminar
    
    Route::get('/products/{id}/images', 'ImageController@index'); //Listado de imagenes del producto seleccionado
    Route::post('/products/{id}/images', 'ImageController@store'); //Registrar nueva imagen
    Route::delete('/products/{id}/images', 'ImageController@destroy'); //Eliminar imagen
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select'); //destacar una imagen
    
});

