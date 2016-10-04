@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Movimiento Directo</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<fieldset disabled>
				<div class="row">
					<div class="form-group col-md-4">
						{!!Form::label('Quién:')!!}
						{!!Form::text('who-entryreg',$directmov->directmov_from,['id'=>'who-entryreg','class'=>'form-control','placeholder'=>'Quién deposita'])!!}
					</div>
				</div>
			</fieldset>
			<div class="table-responsive">
				<table id="table-add-directmov-entryreg" class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Monto</th>
							<th>Banco</th>
							<th>Cuenta</th>
						</tr>
					</thead>
					<tbody>
						@foreach($directmoventrys as $directmoventry)
							<tr>
								<td>{{$directmoventry->company}}</td>
								<td class="number-cell">{{$directmoventry->directmov_rode}}</td>
								<td>{{$directmoventry->directmov_bank}}</td>
								<td>{{$directmoventry->directmov_account}}</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Total</th>
							<th id="table-total-directmov-entryreg" class="number-cell">{{$directmoventrytotal}}</th>
							<th colspan="3"></th>
						</tr>
					</tfoot>
				</table>
			</div>
			<hr>
			<div class="table-responsive">
				<table id="table-add-directmov-entryreg" class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Destino</th>
							<th>Tipo</th>
							<th>Monto</th>
							<th>Dispersora</th>
							<th>Origen</th>
							<th>Destino</th>
							<th>Comentario</th>
						</tr>
					</thead>
					<tbody>
						@foreach($directmovoutputs as $directmovoutput)
							<tr>
								<td>{{$directmovoutput->directmov_output_company}}</td>
								<td>{{$directmovoutput->directmov_output_type}}</td>
								<td class="number-cell">{{$directmovoutput->directmov_output_rode}}</td>
								<td>{{$directmovoutput->directmov_output_disperser}}</td>
								<td>{{$directmovoutput->directmov_output_origin}}</td>
								<td>{{$directmovoutput->directmov_output_destiny}}</td>
								<td>{{$directmovoutput->directmov_output_comment}}</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2">Total</th>
							<th id="table-total-directmov-entryreg" class="number-cell">{{$directmovoutputtotal}}</th>
							<th colspan="4"></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
@endsection