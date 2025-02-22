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

  //RUTA PARA ACCEDER Al REPORTE DE VENTAS
  Route::get('/sales', 'SaleController@index')->name('sales');

    //RUTAS CLIENTES
    Route::resource('clients', 'ClientController')->names([
      'clients'=>'clients.index',
    ]);

    //RUTAS autos
    Route::resource('cars', 'CarController');

    //RUTAS comissions
    Route::resource('commissions', 'CommissionController');

    //RUTAS ORDENES
    Route::resource('orders', 'OrderController')->names([
      'orders'=>'orders.index',
    ]);
    // //Rutas resources
    // Route::resources([
    //                    'clients'=>'ClientController',
    //                    'cars'=>'CarController',
    //                    'orders'=>'OrderController']);


   //RUTA PARA ACCEDER A LA ORDEN DE MANTENIMIENTO
   Route::get('/maintenance_order', 'OrderController@maintenance_order');

   //RUTA PARA ACCEDER A LA ORDEN DE VENTA
   Route::get('/sale_order', 'OrderController@sale_order');

   //RUTA PARA ACCEDER A LA ORDEN DE VENTA
   Route::post('/sale_order_type_store', 'OrderController@sale_order_type_store');

   //RUTA PARA ACCEDER A LA ORDEN DE DEVOLUCION DE ARRENDAMIENTO
   Route::get('/return_to_hire_order', 'OrderController@return_to_hire_order');

   //RUTA PARA ACCEDER A LA ORDEN DE DEVOLUCION DE ARRENDAMIENTO
   Route::post('/return_to_hire_order_type_store', 'OrderController@return_to_hire_order_store');

   //RUTA PARA ACCEDER A LA ORDEN DE DEVOLUCION DE MANTENIMIENTO
   Route::get('/return_maintenance_order', 'OrderController@return_maintenance_order');

    //ruta para acceder a una orden de arrendamiento
    Route::get('/to_hire_order', 'OrderController@to_hire_order');

    //ruta para guardar una orden de arrendamiento
    Route::post('/to_hire_order', 'OrderController@to_hire_order_store');

    //ruta para generar la orden
    Route::post('/to_hire_order_type_store', 'OrderController@to_hire_order_type_store');

    //ruta para agregar vehiculos a una orden
    Route::get('/to_hire_order_new', 'OrderController@to_hire_order_new');

    //ruta para limpiar la orden de arrendamioento
    Route::get('/to_hire_order_clean', 'OrderController@to_hire_order_clean');

    //ruta para acceder a una orden de ingreso
    Route::get('/order_in', 'OrderController@order_in');

    //ruta para acceder a una orden de ingreso
    Route::post('/order_in', 'OrderController@order_in_store');

    //ruta para agregar vehiculos a una orden
    Route::get('/order_in_new', 'OrderController@order_in_new');

    //ruta para generar la orden
    Route::post('/order_type_in_store', 'OrderController@order_type_in_store');

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
