<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $table='negocio';

    protected $primaryKey='nombre_negocio';

    public $timestamps=false;

    protected $fillable=[
    'nombre_negocio',
    'id_user',
    'direccion',
    'telefono',
    'imagen'
    ];

    protected $guarded =[
    ];
}
