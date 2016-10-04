@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Empresa</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!!Form::model($company)!!}
				<fieldset disabled>
					@include('companies.forms.company')
				</fieldset>
			{!!Form::close()!!}
			{!!Form::open()!!}
				<div class="form-group text-right">
			  		{!!link_to_route('company.edit', $title = 'Editar', $parameters = $company->id, $attributes = ['class'=>'btn btn-success'])!!}
			  	</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection