@extends('layouts.principal')

@section('content')
	@include('companies.modal')
    <div class="row">
		<div class="col-md-6">
			<h3 class="text-primary lc-title">Empresas</h3>
		</div>
		<div class="col-md-6">
			{!! Form::open(['route'=>'company.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search'])!!}
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
						@foreach($companies as $company)
							<tr>
								<td>{{$company->name}}</td>
								<td class="col-btn text-center">
									{!!link_to_route('company.show', $title = "Ver", $parameters = $company->id, $attributes = ['class' => 'btn btn-info'])!!}
								</td>
								<td class="col-btn text-center">
									{!!link_to_route('company.edit', $title = "Editar", $parameters = $company->id, $attributes = ['class' => 'btn btn-primary'])!!}
								</td>
								<td class="col-btn text-center">
									<button OnClick='Mostrar({!!$company->id!!}, "{!!$company->name!!}");' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal'>Eliminar</button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!!$companies->render()!!}
			</div>
		</div>
	</div>
@endsection