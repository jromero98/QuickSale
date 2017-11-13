@extends('layouts.main')
<link rel="stylesheet" href="{{asset('css/vistas.css')}}">
@section('contenido')
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
        width: 90%;
        margin: 10 auto;
      }
    </style>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Crear Negocio</h3>
    </div>
  </div>
  {!!Form::model($negocio,['method'=>'PATCH','route'=>['editarnegocio.update',$negocio->nombre_negocio],'files'=>true])!!}
    {{Form::token()}}   
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
      <div class="form-group">
        <img id="imgSalida" height="200px" src="../imagenes/negocio/{{$negocio->imagen}}" width="200px">
      </div>
            <label class="btn btn-primary">
                Cargar Imagen <input type="file" style="display: none;" id="imagen" name="imagen" accept="image/*">
            </label>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center" style="height: 400px;
        width: 500px;">
        <div id="map"></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="nombre">Nombre del Negocio</label>
        <input type="text" required value="{{$negocio->nombre_negocio}}" name="nombre" class="form-control" placeholder="Nombre...">
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" value="" name="direccion" class="form-control" placeholder="Direccion...">
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="number" required value="{{$negocio->telefono}}" name="telefono" class="form-control" placeholder="Telefono...">
      </div>
    </div>
  </div>
      <div class="form-group">
        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{{ route('perfil') }}" class="btn btn-danger">Cancelar</a>
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
    <script>
      var map;
    var myLatLng;
    $(document).ready(function() {
        geoLocationInit();
    });
        function geoLocationInit() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, fail);
            } else {
                alert("Browser not supported");
            }
        }

        function success(position) {
            console.log(position);
            var latval = position.coords.latitude;
            var lngval = position.coords.longitude;
            myLatLng = new google.maps.LatLng(latval, lngval);
            createMap(myLatLng);
            // nearbySearch(myLatLng, "school");
            searchGirls(latval,lngval);
        }

        function fail() {
            alert("it fails");
        }
        //Create Map
        function createMap(myLatLng) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 12
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }
        //Create marker
        function createMarker(latlng, icn, name) {
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: icn,
                title: name
            });
        }
       
        function searchGirls(lat,lng){
            $.post('http://localhost/api/searchGirls',{lat:lat,lng:lng},function(match){
                // console.log(match);
                $('#girlsResult').html('');

                $.each(match,function(i,val){
                    var glatval=val.lat;
                    var glngval=val.lng;
                    var gname=val.name;
                    var GLatLng = new google.maps.LatLng(glatval, glngval);
                    var gicn= 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                    createMarker(GLatLng,gicn,gname);
                    var html='<h5><li>'+gname+'</li></h5>';
                    $('#girlsResult').append(html);
                });

                  // $.each(match, function(i, val) {
                  //   console.log(val.name);
                  // });
            });
        }

        $('#searchGirls').submit(function(e){
           e.preventDefault();
            var val=$('#locationSelect').val();
            $.post('http://localhost/api/getLocationCoords',{val:val},function(match){

                var myLatLng = new google.maps.LatLng(match[0],match[1]);
                createMap(myLatLng);
                searchGirls(match[0],match[1]);
            });
        });

    </script>

@endsection
