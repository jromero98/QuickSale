@extends('layouts.main')
<link rel="stylesheet" href="{{asset('style.css')}}">
<link rel="stylesheet" href="{{asset('main-style.css')}}">
<link rel="stylesheet" href="https://designers.hubspot.com/hs-fs/hub/327485/file-2054199286-css/font-awesome.css">
@section('contenido')
<div class="container">
        @include('perfil.modal')
	<div class="compny-profile">
		<div class="profile-bnr" style="background: url('../../imagenes/negocio/{{$negocio->imagen}}') no-repeat">
			<div class="container">
		<div class="user-info">
						<h1>{{$id}} 
				<a data-toggle="tooltip" data-placement="top" title data-original-title="Verified Member" ><img src="{{asset('images/icon-ver.png')}}" alt=""></a>
						</h1>
			<h6>{{$negocio->telefono}}</h6>
			<p>{{$negocio->direccion}}
        	</p>
        	<div class="social-links">
        		<a href="#"> <i class="fa fa-facebook"></i></a>
        		<a href="#"> <i class="fa fa-twitter"></i></a>
        		<a href="#"> <i class="fa fa-google"></i></a>
        		<a href="#"> <i class="fa fa-linkedin"></i></a>
        	</div>
        	<ul  class="row">
				<li class="col-sm-6">
					<div class="stars">
						
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<span>(06)</span>
					</div>
				</li>
				<li class="col-sm-6">
						<p>
							<i class="fa fa-bookmark-o"></i>
							 28 Bookmarks
						</p>
				</li>
        	</ul>

        	<div class="followr">	        		
				<ul class="row">
                    <a href="{{URL::action('NegocioController@editnegocio',$id)}}">						
    					<li class="col-sm-6">
    						<i class="fa fa-edit"></i> Editar
    					</li>
                    </a>
                    <a href="" data-target="#modal-delete-{{$id}}" data-toggle="modal">                     
                        <li class="col-sm-6">
                            <i class="fa fa-trash-o"></i> Eliminar
                        </li>
                    </a>

				</ul>
        	</div>
		</div>
		</div>
	</div>
</div>
<br>
<div style="text-align: right;"><a href="{{URL::action('ProductoController@create',$id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar producto</a></div>
<br>
 <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <?php $cont=0;?>

                @foreach($categorias as $categoria)
                    @if($cont++==0)
                        <li class="active"><a href="#{{$categoria->nombre_sub}}" data-toggle="tab">{{$categoria->nombre_sub}}</a></li>
                    @else
                        <li><a href="#{{$categoria->nombre_sub}}" data-toggle="tab">{{$categoria->nombre_sub}}</a></li>
                    @endif
                @endforeach

            </ul>
        </div>
        <div class="tab-content">
            @foreach($categorias as $categoria)
                <div class="tab-pane fade active in" id="{{$categoria->nombre_sub}}" >
                    @foreach($productos as $producto)
                        @if($producto->sub_categoria==$categoria->nombre_sub)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="../../imagenes/producto/{{$producto->imagen}}" alt="" />
                                            <h2>${{$producto->precio}}</h2>
                                            <p>{{$producto->nombre_producto}}</p>
                                            <p>{{$producto->descripcion}}</p>
                                            <a href="{{URL::action('ProductoController@edit',$producto->id_producto)}}"><button class="btn btn-info">Editar</button></a>
                                            <a href="" data-target="#modal-delete-{{$producto->id_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @include('producto.modal')
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div><!--/category-tab-->      

@endsection
