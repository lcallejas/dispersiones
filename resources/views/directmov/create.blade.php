@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Registro Movimiento Directo</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			{!!Form::open()!!}
				<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
				<!-- Primer Formulario - Formulario de Entradas -->
				<fieldset>
					@include('directmov.forms.directmov-entryreg')
				</fieldset>
				<div class="table-responsive">
					<table id="table-add-directmov-entryreg" class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Empresa</th>
								<th>Monto</th>
								<th>Banco</th>
								<th>Cuenta</th>
								<th class="col-btn text-center">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
						<tfoot>
							<tr>
								<th>Total</th>
								<th id="table-total-directmov-entryreg" class="number-cell"></th>
								<th colspan="3" ></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<hr>
				<!-- Segundo Formulario - Formulario de Salidas -->
				<fieldset>
					@include('directmov.forms.directmov-outputreg')
				</fieldset>
				<div class="table-responsive">
					<table id="table-add-directmov-outputreg" class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Destino</th>
								<th>Tipo</th>
								<th>Monto</th>
								<th>Dispersora</th>
								<th>Origen</th>
								<th>Destino</th>
								<th>Comentario</th>
								<th class="col-btn text-center">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
						<tfoot>
							<tr>
								<th colspan="2">Total</th>
								<th id="table-total-directmov-outputreg" class="number-cell"></th>
								<th colspan="5" ></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- Botón para registrar movimiento -->
				<div class="form-group text-right">
					{!!Form::button('Registrar',['id'=>'submit-new-directmov','class'=>'btn btn-success'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection

@section('scripts')
    <!-- Agrega fila a entrada de nuevo movimiento directo -->
    {!!Html::script('js/movdirect/add-row-directmov-entry.js')!!}
    <!-- Agrega fila a salida de nuevo movimiento directo -->
    {!!Html::script('js/movdirect/add-row-directmov-output.js')!!}
    <!-- Da de alta el movimiento directo nuevo -->
    {!!Html::script('js/movdirect/submit-directmov.js')!!}
@endsection