<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$producto->id_producto}}">
	{{Form::Open(array('action'=>array('CarritoController@store',$producto->id_producto),'method'=>'store'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Agregar al carrito</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea agregar el producto al carrito</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-success" type="submit">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>