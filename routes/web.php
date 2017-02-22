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


//Inyecciones de dependencia
Route::bind('producto',function($slug){
	return App\Producto::where('slug',$slug)->first();
});

Route::bind('categoria', function($categoria){
	return App\Categoria::find($categoria);
});

Route::bind( 'user' , function($username){
	return App\User::find($username);
});

//******************************
//PRODUCTOS

Route::get('/', 'FrontController@index')->name('home');
Route::get('producto/{slug}','FrontController@show')->name('detalle_del_producto');

//*************************************

//Carrito de compras

Route::group(['prefix' => 'carrito', 'middleware' => 'auth'], function(){

	Route::get('mostrar','CartController@show')->name('mostrar_carrito');
	Route::get('agregar/{producto}','CartController@add')->name('agregar_carrito');
	Route::get('eliminar/{producto}','CartController@delete')->name('eliminar_del_carrito');
	Route::get('vaciar','CartController@vaciar')->name('vaciar_carrito');
	Route::get('actualizar/{producto}/{cantidad?}','CartController@update')->name('actualizar_carrito');
	Route::get('detallecompra','CartController@orderDetail')->name('detalle_compra');
});



//***************************************

//USUARIOS
Auth::routes();
//****************************************

//PAYPAL

Route::group(['prefix' => 'payment','middleware' => ['auth']],function(){
	//Enviamos el pedido a Paypal
	Route::get('/','PaypalController@postPayment')->name('payment');

	//Paypal redirecciona a esta ruta
	Route::get('status','PaypalController@getPaymentStatus')->name('payment.status');

});

//*****************************************


//Panel Administrador

Route::group(['namespace' => 'Admin','prefix' => 'administrador','middleware' => ['role:SuperUsuario,Administrador','auth']],function(){
	//El home principal del panel de administracion
	Route::get('/', function(){
		return view('admin.home');
	})->name('admin.home');

	//Administra las categorias
	Route::resource('categorias', 'CategoriasController');
	
	//Administra los productos
	Route::resource('productos','ProductosController');

	//Administrar los usuarios
	Route::resource('users','UsersController');

	//Administrar los Pedidos
	Route::group(['prefix' => 'pedidos'],function(){

		Route::get('/','PedidosController@index')->name('pedidos.index');
		Route::post('/orden-items','PedidosController@getItems')->name('pedidos.getItems');
		Route::put('orden/{id}/destroy','PedidosController@destroy')->name('pedidos.destroy');
	});
	

});


//******************************************

