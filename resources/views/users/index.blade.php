@extends('layouts.principal')

@section('content')
	@include('users.modal')
    <div class="row">
		<div class="col-md-6">
			<h3 class="text-primary lc-title">Usuarios</h3>
		</div>
		<div class="col-md-6">
			{!! Form::open(['route'=>'user.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
				<div class="form-group">
					{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar por nombre'])!!}
				</div>
				{!! Form::submit('Buscar',['class'=>'btn btn-default'])!!}
			{!! Form::close()!!}
		</div>
	</div>

    <div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-hover table-striped table-condensed">
					<thead>
						<tr>
							<th>Nombre</th>
							<th class="col-btn text-center">Ver</th>
							<th class="col-btn text-center">Editar</th>
							<th class="col-btn text-center">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{$user->name}} {{$user->last_name}}</td>
								<td class="col-btn text-center">
									{!!link_to_route('user.show', $title = "Ver", $parameters = $user->id, $attributes = ['class' => 'btn btn-info'])!!}
								</td>
								<td class="col-btn text-center">
									{!!link_to_route('user.edit', $title = "Editar", $parameters = $user->id, $attributes = ['class' => 'btn btn-primary'])!!}
								</td>
								<td class="col-btn text-center">
									<button OnClick='Mostrar({!!$user->id!!}, "{!!$user->name!!}");' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal'>Eliminar</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!!$users->render()!!}
			</div>
		</div>
	</div>
@endsection