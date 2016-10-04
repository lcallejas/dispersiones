<div class="row">
	<div class="form-group col-md-4">
		{!!Form::label('De:')!!}
		{!!Form::select('who-dispersers',$companies,null,['id'=>'who-dispersers','class'=>'form-control','placeholder'=>'Empresa'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Banco/Cuenta:')!!}
		{!!Form::text('who-bank-dispersers',null,['id'=>'who-bank-dispersers','class'=>'form-control','placeholder'=>'Banco'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Para:')!!}
		{!!Form::select('to-dispersers',$companies,null,['id'=>'to-dispersers','class'=>'form-control','placeholder'=>'Empresa'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Banco/Cuenta Destino:')!!}
		{!!Form::text('to-bank-dispersers',null,['id'=>'to-bank-dispersers','class'=>'form-control','placeholder'=>'Cuenta'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::label('Monto:')!!}
		{!!Form::text('rode-dispersers',null,['id'=>'rode-dispersers','class'=>'form-control','placeholder'=>'Monto de entrada'])!!}
	</div>
	<div class="form-group col-md-4">
		{!!Form::button('Agregar',['id'=>'add-row-directmov-dispersers','class'=>'btn btn-primary btn-margin-top-custom'])!!}
	</div>
</div>