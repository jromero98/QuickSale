<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
class CarritoController extends Controller
{
     public function index()
    {
    	$ventas=Ventas::get();
        return view('carrito.index',compact('ventas'));
    }
    public function store ($id)
    {
    	$producto=DB::table('producto as p')
            ->join('sub_categoria as s','s.nombre_sub','=','p.sub_categoria')
            ->join('negocio as n','s.negocio','=','n.nombre_negocio')
            ->select('nombre_producto','nombre_negocio','sub_categoria','descripcion','precio','p.imagen','id_producto','id_user')
            ->where('id_producto','=',$id)
            ->first();
    	$venta=new Ventas;
        $venta->nombre_negocio=$producto->nombre_negocio;
        $venta->producto=$producto->nombre_producto;
        $venta->cantidad=1;
        $venta->precio=$producto->precio;
        $venta->comprador=Auth::user()->id;
        $venta->imagen=$producto->imagen;
        $venta->save();
        return Redirect::to('/home');
    }
    public function update (Request $request,$id)
    {

    }
    public function edit($id)
    {
    }
    public function destroy($id)
    {
    	$venta=Ventas::findOrFail($id);
        $venta->delete();
        return Redirect::to('carrito');
    }
}
