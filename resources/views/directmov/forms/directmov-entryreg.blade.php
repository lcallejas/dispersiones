<div class="row">
	<div class="form-group col-md-4">
		{!!Form::label('Quién:')!!}
		{!!Form::text('who-entryreg',null,['id'=>'who-entryreg','class'=>'form-control','placeholder'=>'Quién deposita'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('A:')!!}
		{!!Form::select('to-entryreg',$companies,null,['id'=>'to-entryreg','class'=>'form-control','placeholder'=>'Empresa'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Monto:')!!}
		{!!Form::text('rode-entryreg',null,['id'=>'rode-entryreg','class'=>'form-control','placeholder'=>'Monto de entrada'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Banco:')!!}
		{!!Form::text('bank-entryreg',null,['id'=>'bank-entryreg','class'=>'form-control','placeholder'=>'Banco'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Cuenta:')!!}
		{!!Form::text('account-entryreg',null,['id'=>'account-entryreg','class'=>'form-control','placeholder'=>'Cuenta'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::button('Agregar',['id'=>'add-row-directmov-entryreg','class'=>'btn btn-primary btn-margin-top-custom'])!!}
	</div>
</div>