<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-ingresar">
	   {!! Form::open() !!}
	   <input class="hidden" type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <h4 class="modal-title">Ingresar Nuevo Cliente</h4>
	            </div>
	            <div class="modal-body">
				    <div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>Categoria</label>
							<select id="categoria" class="form-control selectpicker" data-live-search="true">
								@foreach($categorias as $categoria)
									<option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="subcategoria">SubCategoria</label>
								<input type="text" value="{{old('subcategoria')}}" name="subcategoria" id="subcategoria" class="form-control" placeholder="SubCategoria..." required="">
							</div>
						</div>
					</div>
	            </div>
	            <input type="text" class="hidden" value="{{$id}}" id="negocio">
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						{!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary', 'onclick'=>"javascript: cargar()"], $secure = null)!!}
	            </div>
	        </div>
	    </div>
	{!! Form::close() !!}
</div>
<script src="{{asset('js/script.js')}}"></script>