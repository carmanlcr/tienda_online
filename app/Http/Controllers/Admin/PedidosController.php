<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Modelos
use App\Ordene;
use App\ArticulosDeOrdene;

//Date
use Jenssegers\Date\Date;

class PedidosController extends Controller
{
	public function __construct(){
        Date::setLocale('es');
    }

    public function index(){
    	$ordenes = Ordene::with('users')->orderBy('created_at','desc')->paginate(6);
    	//dd($ordenes);
    	return view('admin.pedidos.index',compact('ordenes'));
    }

    public function getItems(Request $request){
    	$articulos = ArticulosDeOrdene::with('productos.categorias')->where('ordenes_id',$request->get('ordenes_id'))->get();

    	return json_encode($articulos); //json_encode es una funcion de PHP que convierte en JSON
    }

    public function destroy($id){
    	$orden = Ordene::findOrFail($id);
    	//dd($orden);
    	if($orden->estado === "Anulado"){
    		return redirect()->route('pedidos.index')->with('message','El pedido ya esta anulado');
    	}else{
    		$orden->estado = "Anulado";
    		$anular = $orden->save();
    		$mensaje = $anular ? 'Se anulo correctamente el envio' : 'Ocurrió un error al procesar la solicitud';
    		return redirect()->route('pedidos.index')->with('message',$mensaje);
    	}
    	


    }
}
