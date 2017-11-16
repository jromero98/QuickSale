<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table='ventas';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
    'nombre_negocio',
    'producto',
    'cantidad',
    'precio',
    'comprador',
    'imagen'
    ];

    protected $guarded =[
    ];
}
