<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Negocio;
use App\Producto;
use App\Categoria;
use Auth;
use DB;


class NegocioController extends Controller
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
    	$negocios=Negocio::where('id_user', '=', Auth::user()->id)->get();

    	$negocios=DB::table('negocio')->select('nombre_negocio', 'telefono','imagen')->where('id_user', '=', Auth::user()->id)->get();
        return view('perfil.index',["negocios"=>$negocios]);
    }
    public function create()
    {
        return view("perfil.create");
    }
    public function store (Request $request)
    {
        $negocio=new Negocio;
        $negocio->nombre_negocio=$request->get('nombre');
        $negocio->id_user=Auth::user()->id;
        $negocio->telefono=$request->get('telefono');
        //$negocio->direccion=$request->get('direccion');
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/negocio/',$file->getClientOriginalName());
            $negocio->imagen=$file->getClientOriginalName();
        }
        $negocio->save();
        return Redirect::to('perfil');

    }
    public function edit($id)
    {
    	$categorias=DB::table('sub_categoria')->select('*')->get();
    	$negocio=Negocio::findOrFail($id);
    	$productos=DB::table('producto as p')
            ->join('sub_categoria as s','s.nombre_sub','=','p.sub_categoria')
            ->join('negocio as n','s.nombre_sub','=','n.nombre_negocio')
            ->select('*')
            ->where('n.nombre_negocio','=',$id)
            ->get();
        return view("perfil.edit",compact('id','negocio','productos','categorias'));
    }
    public function searchGirls(Request $request)
    {
    	$lat=$request->lat;
    	$lng=$request->lng;
    	$girls=Girl::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
    	return $girls;
    }
    public function searchCity(Request $request)
    {
        $locationVal=$request->locationVal;
        $matchedCities=Location::where('city','like',"%$locationVal%")->pluck('city','city');
        return response()->json(['items'=>$matchedCities]);
        // return view('ajxresult',compact('matchedCities'));
    }
    public function locationCoords(Request $request)
    {
        $val=$request->val;
        $col=Location::where('city',$val)->first();
        $lat=$col->lat;
        $lng=$col->lng;
        return [$lat,$lng];
    }
}
