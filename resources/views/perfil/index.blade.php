@extends('layouts.main')

@section('contenido')
	<?php  ?>
    <link rel="stylesheet" href="css/style.css" />
     <div id="page-contents">
      <div class="container">
        <div class="row">
          <div class="col-md-4" style="position:static;">
            <div class="profile-card" style="background: orange;">
              <img src="images\home\product2.jpg" alt="user" class="profile-photo" />
              <h5><a href="timeline.html" class="text-white">{{ Auth::user()->name }}</a></h5>
            </div>
            <ul class="nav-news-feed">
              <li><a class="btn btn-primary" style="color: white;" href="{{ route('negocio') }}"><i class="fa fa-plus"></i> Agregar</a></li>
              @foreach ($negocios as $negocio)
              	<li>
				     <div class="store-card">
				     	<a href="{{URL::action('NegocioController@edit',$negocio->nombre_negocio)}}">
				     		<img src="imagenes/negocio/{{$negocio->imagen}}" alt="" class="store-photo" />
				      		<h5><a class="text-white" >{{$negocio->nombre_negocio}}</a></h5>
				      		<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> {{$negocio->telefono}}</a>
				     	</a>
				     </div>
        		</li>
              @endforeach
            </ul>
          </div>
          @if(!empty(Auth::user()))
	          <div class="col-md-8">
	            <div class="friend-list">
	              <div class="row">
	                <div class="col-md-6 col-sm-6">
	                  <div class="friend-card">
	                    <label for="nombre">Nombre</label>
	                    <input class="form-control" type="text" id="nombre" name="nombre" value="{{ Auth::user()->name }}">
	                  </div>
	                </div>
	                <div class="col-md-6 col-sm-6">
	                  <div class="friend-card">
	                    <label for="correo">Correo</label>
	                    <input class="form-control" type="email" id="correo" name="correo" value="{{ Auth::user()->email }}">
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
          @endif
        </div>
      </div>
    </div>
@endsection
