@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Editar Empresa</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!!Form::model($company,['route'=>['company.update',$company->id],'method'=>'PUT'])!!}
				@include('companies.forms.company')
				<div class="form-group text-right">
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection