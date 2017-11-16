<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BuscarController extends Controller
{
    public function index(Request $request,$id){
		if($request->ajax()){
			$productos=DB::table('producto as p')
            ->join('sub_categoria as s','s.nombre_sub','=','p.sub_categoria')
            ->join('negocio as n','s.negocio','=','n.nombre_negocio')
            ->select('nombre_producto','sub_categoria','descripcion','precio','p.imagen','id_producto','id_user')
            ->where('nombre_producto','ILIKE','%'.$id.'%')
            ->get();
			return response()->json($productos);
		}
	}
}
