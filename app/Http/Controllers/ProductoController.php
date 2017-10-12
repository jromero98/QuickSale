<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Producto;
use App\Categoria;
use App\Sub_Categoria;
use DB;

class ProductoController extends Controller
{
    public function index()
    {
    	$productos=Producto::get();
        return view('home',["productos"=>$productos]);
    }
    public function create($id)
    {
    	$categorias = Categoria::get();
    	$subcategorias=DB::table('sub_categoria')->select('*')->get();
        return view("producto.create",compact('categorias','subcategorias','id'));
    }
    public function store (Request $request)
    {
        $producto=new Producto;
        $producto->nombre_producto=$request->get('nombre');
        $producto->sub_categoria=$request->get('subcategoria');
        $producto->precio=$request->get('precio');
        $producto->descripcion=$request->get('descripcion');
        $producto->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/producto/',$file->getClientOriginalName());
            $producto->imagen=$file->getClientOriginalName();
        }
        $producto->save();
        return Redirect::to('perfil');

    }
    public function edit($id)
    {
    	$negocio=Negocio::findOrFail($id);
        return view("perfil.edit",["negocio"=>$negocio,"id"=>$id]);
    }
}
