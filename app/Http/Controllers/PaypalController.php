<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;

//De la Api de Paypal
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

//Importando modelos
use App\Ordene;
use App\ArticulosDeOrdene;

class PaypalController extends Controller
{
    private $_api_context;
    

    public function __construct(){
    	//Setup PayPal api context

    	$paypal_conf = \Config::get('paypal'); //Agarramos los datos del archivo /config/paypal
    	$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'],$paypal_conf['secret'])); //Datos configurados y enviados a clases de la api
    	$this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function postPayment(){
    	$payer = new Payer; //Objeto de tipo Payer se relaciona con el tipo de pago y el cliente del pago
    	$payer->setPaymentMethod('paypal');	

    	$items = array();
    	$subtotal = 0;
    	$cantidades = 0;
    	$carrito = \Session::get('cart');
        if(count($carrito) === 0){
            return redirect()->route('home')->with('message','El carrito esta vacio');
        }
    	$moneda = "USD";

    	foreach ($carrito as $producto) {
    		$item = new Item();
    		$item->setName($producto->nombre)
    			 ->setCurrency($moneda)
    			 ->setDescription($producto->descripcion_corta)
    			 ->setQuantity($producto->cantidad)
    			 ->setPrice($producto->precio);

    		$items[] = $item;
    		$subtotal += $producto->cantidad * $producto->precio;
    		$cantidades += $producto->cantidad;

    	}

    	$item_list = new ItemList;
    	$item_list->setItems($items);

    	$details = new Details;
    	if($cantidades > 3){ //Si hay mas de 3 camisas el envio tiene que ser de aprx 3500 bs
    		$precio_envio = 3500.00;
    		$details->setSubtotal($subtotal)
    				->setShipping($precio_envio);
    	}else{ //Si no un precio de 2000 bs el envio
    		$precio_envio = 2000.00;
    		$details->setSubtotal($subtotal)
    				->setShipping($precio_envio);
    	}

    	$total = $subtotal + $precio_envio;

    	$amount = new Amount;
    	$amount->setCurrency($moneda)
    		   ->setTotal($total)
    		   ->setDetails($details);

    	$transaction = new Transaction;
    	$transaction->setAmount($amount)
    				->setItemList($item_list)
    				->setDescription('Pedido de prueba en Laravel');

    	$redirect_urls  = new RedirectUrls;
    	$redirect_urls->setReturnUrl(\URL::route('payment.status'))
    				  ->setCancelUrl(\URL::route('payment.status'));

    	$payment = new Payment;
    	$payment->setIntent('Sale')
    			->setPayer($payer)
    			->setRedirectUrls($redirect_urls)
    			->setTransactions(array($transaction));

    	try{
    		$payment->create($this->_api_context);
    	}catch(\PayPal\Exception\PPConnectionException $ex){
    		if(\Config::get('app.debug')){
    			echo "Exception: ".$ex->getMessage() .PHP_EOL;
    			$err_data = json_decode($ex->getData(),true);
    			exit;
    		}else{
    			die('Ups! algo salió mal');
    		}
    	}

    	foreach ($payment->getLinks() as $link) {
    		if($link->getRel() == 'approval_url'){
    			$redirect_url = $link->getHref();
    			break;
    		}    	
    	}

    	//Add payment ID to session
    	\Session::put('paypal_payment_id',$payment->getId());

    	if(isset($redirect_url)){
    		//Redirect to Paypal
    		return \Redirect::away($redirect_url); //away permite redireccionar a una url externa
    	}

    	return \Redirect::route('mostrar_carrito')->with('message','Ups! Error desconocido');

    }

    public function getPaymentStatus(){
    	// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
 
		// clear the session payment ID
		\Session::forget('paypal_payment_id');
 
		$payerId = \Input::get('PayerID');
		$token = \Input::get('token');

    	if (empty($payerId) || empty($token)) {
    		//Para guardar el pedido luego de ser ralizado, esto va en el if de approdved
    		$this->guardarOrden();

    		\Session::forget('cart');

    		//*************************************************************************
			return \Redirect::route('home')->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}

    	$payment = Payment::get($payment_id,$this->_api_context);

    	$execution = new PaymentExecution;
    	$execution->setPayerId(\Input::get('PayerID'));

    	$result = $payment->execute($execution,$this->_api_context);

    	if($result->getState() == 'approved'){
    		return \Redirect::route('home')->with('message','Compra realizada corretamente');
    	}
    	return \Redirect::route('home')->with('message','La compra fue cancelada');
    }

    protected function guardarOrden(){
    	$subtotal = 0;
    	$carrito = \Session::get('cart');
    	$cantidad = 0;
    	foreach ($carrito as $producto) {
    		$subtotal += $producto->cantidad * $producto->precio;
    		$cantidad += $producto->cantidad;
    	}

    	if($cantidad > 3){ //Si hay mas de 3 camisas el envio tiene que ser de aprx 3500 bs
    		$precio_envio = 3500.00;
    	}else{ //Si no un precio de 2000 bs el envio
    		$precio_envio = 2000.00;
    	}

    	$order = Ordene::create([
    		'subtotal' => $subtotal,
    		'envio' => $precio_envio,
    		'users_id' => \Auth::user()->id
    	]);

    	foreach ($carrito as $producto) {
    		$this->guardarArticulosDeOrdenes($producto,$order->id);
    	}
    }

    protected function guardarArticulosDeOrdenes($producto,$orden_id){
    	ArticulosDeOrdene::create([
    		'precio' => $producto->precio,
    		'cantidad' => $producto->cantidad,
    		'ordenes_id' => $orden_id,
    		'productos_id' => $producto->id
    	]);
    }


}
