<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordene extends Model
{
    protected $fillable = [
        'subtotal', 'envio', 'users_id',
    ];

    //Una orden pertenece a un solo usuario
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    //Una orden puede tener varios articulos
    public function articulos_de_ordenes()
    {
        return $this->hasMany('App\ArticulosDeOrdene');
    }
}
