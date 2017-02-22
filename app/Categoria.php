<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categoria extends Model{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

    //Como no utilizo el timestamps
    public $timestamps = false;
    
    protected $fillable = [
        'nombre', 'slug', 'descripcion','color',
    ];

    //Una categoria puede tener muchos productos
    public function productos(){
        return $this->hasMany('App\Producto');
    }
}
