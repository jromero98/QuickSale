<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=DB::table('sub_categoria')->select('*')->get();
        $productos=DB::table('producto as p')
            ->join('sub_categoria as s','s.nombre_sub','=','p.sub_categoria')
            ->join('negocio as n','s.negocio','=','n.nombre_negocio')
            ->select('nombre_producto','sub_categoria','descripcion','precio','p.imagen','id_producto','id_user')
            ->get();
        return view('home',compact('categorias','productos'));
    }
}
