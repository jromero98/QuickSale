
$(document).ready(function(){
	$("#search").change(function(){
		$.get(`/producto/index/`+$("#search").val(), function(res, sta){
				//$("#proveedor").empty();
				res.forEach(element => {
            		alert(`${element.nombre_producto}`);
            		document.getElementById("limpiar").innerHTML="";
            		document.getElementById("limpiar").innerHTML="<div class='col-sm-4'>"+
                            "<div class='product-image-wrapper'>"+
                                "<div class='single-products'>"+
                                   "<div class='productinfo text-center'>"+
                                       "<img src='../../imagenes/producto/"+`${element.imagen}`+"' />"+
                                        "<h2>$"+`${element.precio}`+"</h2>"+
                                        "<p>"+`${element.nombre_producto}`+"</p>"+
                                       " <p>"+`${element.descripcion}`+"</p>"+
                                         "<a href='#' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>"+
                                    "</div>"+
                                    
                                "</div>"+
                            "</div>"+
                        "</div>"
            		;
						//$("#proveedor").append(`<option value=${element.doc_persona}>${element.doc_persona} ${element.nombre_persona}</option>`);
				});
		});
	});
});