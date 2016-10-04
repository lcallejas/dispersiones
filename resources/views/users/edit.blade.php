@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Editar Usuario</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!!Form::model($user,['route'=>['user.update',$user->id],'method'=>'PUT'])!!}
				@include('users.forms.usr')
				@include('users.forms.usrpass')
				<p class="help-block">Si deseas conservar la contraseña actual, basta con dejar el campo vacío.</p>
				<div class="form-group text-right">
					{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection