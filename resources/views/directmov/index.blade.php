@extends('layouts.principal')

@section('content')
    <div class="row">
		<div class="col-md-6">
			<h3 class="text-primary lc-title">Movimientos Directos</h3>
		</div>
		<div class="col-md-6">
			{!! Form::open(['route'=>'directmov.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
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
							<th class="text-left">Nombre</th>
							<th class="text-left">Fecha y Hora</th>
							<th class="col-btn text-center">Ver</th>
							<th class="col-btn text-center">Editar</th>
							<th class="col-btn text-center">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($directmovs as $directmov)
						<tr>
							<td>{{$directmov->directmov_from}}</td>
							<td>{{$directmov->created_at}}</td>
							<td class="col-btn text-center">
								{!!link_to_route('directmov.show', $title = "Ver", $parameters = $directmov->id, $attributes = ['class' => 'btn btn-info'])!!}
							</td>
							<td class="col-btn text-center">
								<a href="{!!URL::to('/directmov/dispersers/')!!}/{{$directmov->id}}" class="btn btn-primary">Dispersiones</a>
							</td>
							<td class="col-btn text-center">
								<button OnClick='MostrarHospital({!!$directmov->id!!}, "{!!$directmov->name!!}");' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal'>Eliminar</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{!!$directmovs->render()!!}
			</div>
		</div>
	</div>
@endsection