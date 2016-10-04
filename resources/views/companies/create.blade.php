@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Registro Empresa</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			{!!Form::open(['route'=>'company.store','method'=>'POST','autocomplete'=>'off'])!!}
				<fieldset>
					@include('companies.forms.company')
				</fieldset>
				<div class="form-group text-right">
					{!!Form::submit('Registrar',['class'=>'btn btn-success'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection