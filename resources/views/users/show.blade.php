@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Perfil de Usuario</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!!Form::model($user)!!}
				<fieldset disabled>
					@include('users.forms.usr')
				</fieldset>
			{!!Form::close()!!}
			{!!Form::open()!!}
				<div class="form-group text-right">
			  		{!!link_to_route('user.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-success'])!!}
			  	</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection