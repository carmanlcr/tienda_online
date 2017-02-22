<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosDeOrdene extends Model
{
    protected $fillable = [
        'precio', 'cantidad', 'ordenes_id', 'productos_id',
    ];

    //Como no utilizo el timestamps
    public $timestamps = false;

    //Un articulo solo pertenece a una orden
    public function ordenes()
    {
        return $this->belongsTo('App\Ordene');
    }

    //Un articulo es parte de un producto
     public function productos()
    {
        return $this->belongsTo('App\Producto');
    }
}
