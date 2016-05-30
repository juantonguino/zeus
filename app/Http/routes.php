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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {

	Route::get('index', function () {
    	return view('admin.index');
	});
	Route::get('/', function () {
    	return view('admin.index');
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
	* routes EmpresaTransportes
	*/

	Route::resource('empresas','EmpresasController');
	Route::get('empresas/{id}/destroy',[
		'uses'  =>'EmpresasController@destroy',
		'as'		=>'admin.empresas.destroy'
	]);

	/*
	* routes Conductores
	*/
	Route::resource('conductores','ConductoresController');

	Route::get('conductores/{id}/destroy',[
		'uses'=>'ConductoresController@destroy',
		'as'=>'admin.conductores.destroy'
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

    /*
     * routes Restaurante
     */
    Route::resource('restaurante','RestauranteController');

    Route::get('retaurante/{id}/destroy', [
  		'uses'=>'RestauranteController@destroy',
  		'as'=>'admin.restaurante.destroy'
  		]);

    /*
     * routes Guia
     */
    Route::resource('guia','GuiaController');

    Route::get('guia/{id}/destroy',[
      'uses'=>'GuiaController@destroy',
      'as'=>'admin.guia.destroy'
    ]);

    /*
     * routes Usuario
     */
    Route::resource('usuario','UsuarioController');

    Route::get('usuario/{id}/destroy',[
      'uses'=>'UsuarioController@destroy',
      'as'=>'admin.usuario.destroy'
    ]);

    /*
     * routes Proveedor
     */
     Route::resource('proveedor','ProveedorController');

     Route::get('proveedor/{id}/destroy',[
       'uses'=>'ProveedorController@destroy',
       'as'=>'admin.proveedor.destroy'
     ]);

		 /*
		 	* routes Asignacion
			*/
			Route::resource('asignar','AsignarController');

			/*
			 * routes TarfaHotel
			 */
			 Route::get('tarifahotel/{hotel}',[
				 'uses'=>'TarifaHotelController@index',
	       'as'=>'admin.tarifahotel.index'
			 ]);

			 Route::get('tarifahotel/{hotel}/create',[
				 'uses'=>'TarifaHotelController@create',
	       'as'=>'admin.tarifahotel.create'
			 ]);

			 Route::post('tarifahotel/{hotel}/store',[
          'uses'=>'TarifaHotelController@store',
          'as'=>'admin.tarifahotel.store'
      ]);

			Route::get('tarifahotel/{tarifa}/view',[
					'uses'=>'TarifaHotelController@show',
					'as'=>'admin.tarifahotel.show',
			]);

			Route::get('tarifahotel/{tarifa}/edit',[
					'uses'=>'TarifaHotelController@edit',
					'as'=>'admin.tarifahotel.edit',
			]);

			Route::get('tarifahotel/{tarifa}/destroy',[
					'uses'=>'TarifaHotelController@destroy',
					'as'=>'admin.tarifahotel.destroy',
			]);

			Route::put('tarifahotel/{tarifa}/update',[
					'uses'=>'TarifaHotelController@update',
					'as'=>'admin.trarifahotel.update'
			]);

			Route::resource('vehiculo', 'VehiculoController');

			Route::get('vehiculo/{id}/destroy',[
					'uses'=>'VehiculoController@destroy',
					'as'=>'admin.vehiculo.destroy'
			]);

});

/*
 * Routes Autentication
 */
Route::get('/','Auth\AuthController@showLoginForm');

Route::post('/','Auth\AuthController@login');

Route::get('logout','Auth\AuthController@logout');

//Route::get('/home', 'HomeController@index');
//Route::auth();
