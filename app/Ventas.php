<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table='ventas';

    //protected $primaryKey='nombre_sub';

    public $timestamps=false;

    protected $fillable=[
    'nombre_negocio',
    'producto',
    'cantidad',
    'precio',
    'comprador'
    ];

    protected $guarded =[
    ];
}
