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
        return Redirect::to('minegocio/'.$request->get('id').'/edit');

    }
    public function update (Request $request,$id)
    {
        $producto=Producto::findOrFail($id);
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
        $producto->update();
        return Redirect::to('minegocio/'.$request->get('id').'/edit');

    }
    public function edit($id)
    {

    	$producto=DB::table('producto as p')
            ->join('sub_categoria as s','s.nombre_sub','=','p.sub_categoria')
            ->join('negocio as n','s.negocio','=','n.nombre_negocio')
            ->select('nombre_producto','sub_categoria','descripcion','precio','p.imagen','id_producto','nombre_negocio','cantidad')
            ->where('p.id_producto','=',$id)
            ->first();
        $id=$producto->nombre_negocio;
        $categorias = Categoria::get();
        $subcategorias=DB::table('sub_categoria')->select('*')->get();
        return view("producto.edit",compact('producto','categorias','subcategorias','id'));
    }
    public function destroy($id)
    {
        $product=DB::table('producto as p')
            ->join('sub_categoria as s','s.nombre_sub','=','p.sub_categoria')
            ->join('negocio as n','s.negocio','=','n.nombre_negocio')
            ->select('nombre_producto','sub_categoria','descripcion','precio','p.imagen','id_producto','nombre_negocio','cantidad')
            ->where('p.id_producto','=',$id)
            ->first();
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return Redirect::to('minegocio/'.$product->nombre_negocio.'/edit');
    }
}
