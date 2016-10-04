@extends('layouts.principal')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary lc-title">Inicio</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="navbar navbar-default">
			    <div class="col-md-4">
			    	<p><strong>Usuario Logueado</strong></p>
			    </div>
			    <div class="col-md-6">
			    	<p><strong>Nombre de Usuario:</strong> {!!Auth::user()->name!!}</p>
			    </div>
			    <div class="col-md-2">
			    	<p><strong>Fecha:</strong> 
						<?php
							echo date("d/m/Y");
						?>
			    	</p>
			    </div>
			</div>
		</div>
	</div>
@endsection