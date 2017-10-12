<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_categoria extends Model
{
    protected $table='sub_categoria';

    protected $primaryKey='nombre_sub';

    public $timestamps=false;

    protected $fillable=[
    'nombre_sub',
    'categoria',
    'negocio'
    ];

    protected $guarded =[
    ];
}
