<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='producto';

    protected $primaryKey='id_producto';

    public $timestamps=false;

    protected $fillable=[
    'nombre_producto',
    'sub_categoria',
    'descripcion',
    'precio',
    'cantidad',
    'imagen'
    ];

    protected $guarded =[
    ];
}
