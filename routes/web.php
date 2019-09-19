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

//Ruta Al WELCOME
Route::get('/', function () {
    return view('welcome');
});

//RUTAS AUTH
Auth::routes();

//Rutas para los errores
Route::get('/errors/404', function () {
    return view('errors.404');
});

//Rutas para los errores
Route::get('/errors/foreign', function () {
    return view('errors.foreign');
});

// RUTA PARA EL HOME
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    //RUTAS CLIENTES
    Route::resource('clients', 'ClientController');

    //RUTAS autos
    Route::resource('cars', 'CarController');

    //RUTAS ORDENES
    Route::resource('orders', 'OrderController');

    //ruta para acceder a una orden de ingreso
    Route::get('/order_in', 'OrderController@order_in');

    //ruta para acceder a una orden de ingreso
    Route::post('/order_in', 'OrderController@order_in_store');

    //ruta para agregar vehiculos a una orden
    Route::get('/order_in_new', 'OrderController@order_in_new');

    //ruta para limpiar las orden del usuario actual
    Route::get('/order_clean', 'OrderController@order_clean');

    //RUTA PARA MANEJO DE USUARIOS
    Route::resource('users', 'UserController')
                                                       ->middleware('permission:admin');
    //ruta para probar el rol admin aca solo se puede ingresar con el rol admin
    Route::get('/admin', 'HomeController@admin')->name('admin')
                                                        ->middleware('permission:admin');
    //ruta para probar el rol vendedor aca puede ingresar el rol vendedor y el rol admin
    Route::get('/vendedor', 'HomeController@vendedor')->name('vendedor')
                                                        ->middleware('permission:vendedor');
});
