$("#registro").click(function(){
	var nombre_sub = $("#subcategoria").val();
	var categoria = $("#categoria").val();
	var negocio = $("#negocio").val();
	var token = $("#token").val();
	var route = "/subcategoria";
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombre_sub: nombre_sub,categoria:categoria,negocio: negocio},

		success:function(){
			toastr.success("Se ha agregado Satisfactoriamente");
			$("#subcategoria").val("");
			$("#categoria").val("");
			$("#negocio").val("");
			$('#modal-ingresar').modal('hide');
			cargar();
		},
		error: function(jqXHR, exception) {
			var msg = '';
			if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
        	console.log(jqXHR);
	        	console.log(exception);
            msg = 'Internal Server Error [500].';
            msg = 'Los datos ya estan registrados.';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        }else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
            msg ="Compruebe que todos los campos esten llenos";
        }
			toastr.error(msg);
			$('#modal-ingresar').modal('hide');
			cargar();
			}
	});
});
function cargar(){
		$.get(`/subcategoria/index`, function(res, sta){
				$("#idsubcategoria").empty();
				res.forEach(element => {
						$("#idsubcategoria").append(`<option value=${element.nombre_sub}>${element.nombre_sub}</option>`);
				});
			$("#idsubcategoria").selectpicker('refresh');
	});
}