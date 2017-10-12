<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sub_categoria;
use DB;

class SubCategoriaController extends Controller
{
    public function index(Request $request){
		if($request->ajax()){
			$subcategorias=DB::table('sub_categoria')->select('*')->get();
			return response()->json($subcategorias);
		}
	}
    public function store(Request $request){
    	if($request->ajax()){
    		Sub_categoria::create($request->all());
    		return response()->json([
    			"Mensaje" => "confirmar"
    		]);
    	}
    }
}
