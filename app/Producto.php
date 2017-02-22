<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Producto extends Model
{
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

    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'descripcion_corta','precio','imagen','activo','categorias_id',
    ];

    //Un producto es parte del articulo
    public function articulos_de_ordenes()
    {
        return $this->hasOne('App\ArticulosDeOrdene');
    }

    //Un producto solo tiene una categoria
    public function categorias()
    {
        return $this->belongsTo('App\Categoria');
    }
}
