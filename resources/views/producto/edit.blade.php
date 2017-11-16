@extends('layouts.main')
<link rel="stylesheet" href="{{asset('css/vistas.css')}}">

@section ('contenido')
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 style="text-align: center;">Editar {{$producto->nombre_producto}} de {{$producto->nombre_negocio}}</h3>
		</div>
	</div>
	@include('producto.subcategoriamodal')
	{!!Form::model($producto,['method'=>'PATCH','route'=>['editarproducto.update',$producto->id_producto],'files'=>true])!!}
			{{Form::token()}}
    {{Form::token()}}		
	<div class="container">

		<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
			<input type="text" value="{{$producto->nombre_negocio}}" name="id" class="hidden">
			<div class="form-group">
				<img id="imgSalida" height="200px" src="../../imagenes/producto/{{$producto->imagen}}" width="200px">
			</div>
            <label class="btn btn-primary">
                Cargar Imagen <input type="file" style="display: none;" id="imagen" name="imagen" accept="image/*">
            </label>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" required  name="nombre" value="{{$producto->nombre_producto}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="number" required name="precio" value="{{$producto->precio}}" class="form-control" placeholder="Precio...">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea name="descripcion" class="form-control" cols="30" rows="5" placeholder="Descripcion...">{{$producto->descripcion}}</textarea>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<label>Categoria</label>
			<select name="idcategoria" class="form-control selectpicker" data-live-search="true">
				@foreach($categorias as $categoria)
					<option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="col-md-11">
				<label>SubCategoria</label>
				<select id="idsubcategoria" name="subcategoria" class="form-control selectpicker" data-live-search="true">
					@foreach($subcategorias as $subcategoria)
						<option value="{{$subcategoria->nombre_sub}}">{{$subcategoria->nombre_sub}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
				<br>
				<a class="btn btn-labeled btn btn-success btn-circle" href="" data-target="#modal-ingresar" data-toggle="modal"><i class="fa fa-plus"></i></a>
			</div> 
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="number" required  name="cantidad" value="{{$producto->cantidad}}" class="form-control" placeholder="Cantidad...">
			</div>
		</div>
	</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="/empleados" class="btn btn-danger">Cancelar</a>
			</div>
	<div id="myModal" class="modal">

	  <!-- The Close Button -->
	  <span class="cerrar" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

	  <!-- Modal Content (The Image) -->
	  <img class="modal-content" id="img01">

	  <!-- Modal Caption (Image Text) -->
	  <div id="caption"></div>
	</div>
	</div>
{!!Form::close()!!}
<script>
 $(window).load(function(){

 $(function() {
  $('#imagen').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
  });

 // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('imgSalida');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("cerrar")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
@endsection