<div class="row">
	<div class="form-group col-md-4">
		{!!Form::label('Para:')!!}
		{!!Form::text('to-outputreg',null,['id'=>'to-outputreg','class'=>'form-control','placeholder'=>'Destino'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Tipo:')!!}
		{!!Form::select('type-outputreg',['transferencia'=>'Transferencia','efectivo'=>'Efectivo','comision'=>'Comisión'],null,['id'=>'type-outputreg','class'=>'form-control','placeholder'=>'Tipo'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Monto:')!!}
		{!!Form::text('rode-outputreg',null,['id'=>'rode-outputreg','class'=>'form-control','placeholder'=>'Monto destino'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Dispersora:')!!}
		{!!Form::text('disperser-outputreg',null,['id'=>'disperser-outputreg','class'=>'form-control','placeholder'=>'Dispersora'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Banco/Cuenta Dispersora:')!!}
		{!!Form::text('bank-disp-outputreg',null,['id'=>'bank-disp-outputreg','class'=>'form-control','placeholder'=>'Banco/Cuenta Dispersora'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Banco/Cuenta Destino:')!!}
		{!!Form::text('bank-dest-outputreg',null,['id'=>'bank-dest-outputreg','class'=>'form-control','placeholder'=>'Banco/Cuenta Destino'])!!}
	</div>
	<div class="form-group col-md-8">
		{!!Form::label('Comentario:')!!}
		{!!Form::text('comment-outputreg',null,['id'=>'comment-outputreg','class'=>'form-control','placeholder'=>'Comentario'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::button('Agregar',['id'=>'add-row-directmov-outputreg','class'=>'btn btn-primary btn-margin-top-custom'])!!}
	</div>
</div>