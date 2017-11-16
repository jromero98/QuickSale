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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function (){ 
	Route::get('/perfil', 'NegocioController@index')->name('perfil');
	Route::get('/negocio', 'NegocioController@create')->name('negocio');
	Route::post('/negocios', 'NegocioController@store')->name('negocios');
	Route::resource('editarnegocio', 'NegocioController',
	                ['only' => ['update','destroy']]);
	Route::get('/editarnegocios/{id}', 'NegocioController@editnegocio');
	Route::resource('minegocio', 'NegocioController',
	                ['only' => ['edit','update']]);
	Route::get('/crearproducto/{id}', 'ProductoController@create');
	Route::resource('editarproducto', 'ProductoController',
	                ['only' => ['edit','update','destroy']]);
	Route::post('/producto', 'ProductoController@store')->name('producto');
	Route::post('/subcategoria', 'SubCategoriaController@store')->name('subcategoria');
	Route::get('/subcategoria/index', 'SubCategoriaController@index')->name('subcategoria');
	Route::get('/carrito', 'CarritoController@index')->name('carrito');
	Route::post('/carrito/{id}', 'CarritoController@store')->name('addcarrito');
	Route::resource('dcarrito', 'CarritoController',
	                ['only' => ['destroy']]);

	Route::get('/producto/index/{id}','BuscarController@index'); 
});
