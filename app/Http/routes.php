<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix'=>'admin'], function () {

	Route::get('/', function () {
    	return view('admin.template.main');
	});

	/*
	 * routes Grupo
	 */
	Route::resource('grupo','GrupoController');

	Route::get('grupo/{id}/destroy', [
		'uses'=>'GrupoController@destroy',
		'as'=>'admin.grupo.destroy'
		]);
	Route::get('grupo/{id}/report', [
		'uses'=>'GrupoController@generatereport',
		'as'=>'admin.grupo.report'
		]);

	/*
	 * routes Reserva
	 */

	Route::get('reserva/{id}/', [
		'uses'=>'ReservaController@index',
		'as'=>'admin.reserva.index'
		]);
	Route::get('reserva/{id}/create', [
		'uses'=>'ReservaController@create',
		'as'=>'admin.reserva.create'
		]);
	Route::post('reserva/{id}/store', [
		'uses'=>'ReservaController@store',
		'as'=>'admin.reserva.store'
		]);
  Route::get('reserva/{id}/delete', [
    'uses'=>'ReservaController@destroy',
    'as'=>'admin.reserva.delete'
  ]);
  Route::get('reserva/{reserva}/view',[
    'uses'=>'ReservaController@show',
    'as'=>'admin.reserva.view'
  ]);
  Route::get('reserva/{id}/edit',[
    'uses'=>'ReservaController@edit',
    'as'=>'admin.reserva.edit'
  ]);
  Route::put('reserva/{id}/update',[
    'uses'=>'ReservaController@update',
    'as'=>'admin.reserva.update'
  ]);

  /*
   * routes Cliente
   */

   Route::get('cliente/{id}/', [
 		'uses'=>'ClienteController@index',
 		'as'=>'admin.cliente.index'
 		]);
 	Route::get('cliente/{id}/create', [
 		'uses'=>'ClienteController@create',
 		'as'=>'admin.cliente.create'
 		]);
 	Route::post('cliente/{id}/store', [
 		'uses'=>'ClienteController@store',
 		'as'=>'admin.cliente.store'
 		]);
   Route::get('cliente/{id}/delete', [
     'uses'=>'ClienteController@destroy',
     'as'=>'admin.cliente.delete'
   ]);
   Route::get('cliente/{reserva}/view',[
     'uses'=>'ClienteController@show',
     'as'=>'admin.cliente.view'
   ]);
   Route::get('cliente/{id}/edit',[
     'uses'=>'ClienteController@edit',
     'as'=>'admin.cliente.edit'
   ]);
   Route::put('cliente/{id}/update',[
     'uses'=>'ClienteController@update',
     'as'=>'admin.cliente.update'
   ]);

   /*
    * routes Dias
    */

    Route::get('dia/{id}/', [
  		'uses'=>'DiaController@index',
  		'as'=>'admin.dia.index'
  		]);
  	Route::get('dia/{id}/create', [
  		'uses'=>'DiaController@create',
  		'as'=>'admin.dia.create'
  		]);
  	Route::post('dia/{id}/store', [
  		'uses'=>'DiaController@store',
  		'as'=>'admin.dia.store'
  		]);
    Route::get('dia/{id}/delete', [
      'uses'=>'DiaController@destroy',
      'as'=>'admin.dia.destroy'
    ]);
    Route::get('dia/{reserva}/view',[
      'uses'=>'DiaController@show',
      'as'=>'admin.dia.show'
    ]);
    Route::get('dia/{id}/edit',[
      'uses'=>'DiaController@edit',
      'as'=>'admin.dia.edit'
    ]);
    Route::put('dia/{id}/update',[
      'uses'=>'DiaController@update',
      'as'=>'admin.dia.update'
    ]);

    /*
  	 * routes Hotel
  	 */
  	Route::resource('hotel','HotelController');

  	Route::get('hotel/{id}/destroy', [
  		'uses'=>'HotelController@destroy',
  		'as'=>'admin.hotel.destroy'
  		]);

});
