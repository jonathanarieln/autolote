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


//Rutas para las pruebas de los roles
Route::middleware(['auth'])->group(function () {

    Route::get('/admin', 'HomeController@admin')->name('admin')
                                                        ->middleware('permission:admin');
    Route::get('/vendedor', 'HomeController@vendedor')->name('vendedor')
                                                        ->middleware('permission:vendedor');
});
