@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Registro Usuario</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			{!!Form::open(['route'=>'user.store','method'=>'POST','autocomplete'=>'off'])!!}
				<fieldset>
					@include('users.forms.usr')
					@include('users.forms.usrpass')
				</fieldset>
				<div class="form-group text-right">
					{!!Form::submit('Registrar',['class'=>'btn btn-success'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection