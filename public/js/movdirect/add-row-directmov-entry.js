$(function(){
	$("#add-row-directmov-entryreg").on('click', function(){
		//Obtengo los valores de los input
		var whoentryreg = $("#who-entryreg").val();
		var toentryreg = $("#to-entryreg").val();
		var toentryregtext = $("#to-entryreg option:selected").text();
		var rodeentryreg = $("#rode-entryreg").val();
		var bankentryreg = $("#bank-entryreg").val();
		var accountentryreg = $("#account-entryreg").val();

		//Verifico si alguno de los input esta vacío o si el monto es numérico.
		if(whoentryreg == "" || toentryreg == "" || (rodeentryreg == "" || !$.isNumeric(rodeentryreg)) || bankentryreg == "" || (accountentryreg != "" && !$.isNumeric(accountentryreg))){
			//comienzo la cadena de errores en blanco
			var errors = "";
			//Comienzo en cero una variable de errores para saber si debo utilizar el br
			var cont = 0;
			//Verifico cada input y si esta en blanco o si no es válido coloco su cadena de error en la variable mensaje
			if(whoentryreg == ""){
				errors = errors + "Debes agregar una Empresa de Entrada.";
				cont = 1;
			}
			if(toentryreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar una Empresa Destino.";
				cont = 1;
			}
			if(rodeentryreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Monto de Entrada.";
				cont = 1;
			}else if(!$.isNumeric(rodeentryreg)){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Monto de Entrada válido.";
				cont = 1;
			}
			if(bankentryreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Banco de Entrada.";
				cont = 1;
			}
			if(accountentryreg != "" && !$.isNumeric(accountentryreg)){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar una Cuenta válida.";
				cont = 1;
			}
			//Elimino la alerta ya existente si la hay
			$("#errors-my-form").children("div").remove();
			//Muestro el nuevo alert con la nueva cadena.
			$("#errors-my-form").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+errors+"</div>");
		//Si todos los input que se validan tienen algun valor
		}else{
			//Elimino el alert existente si lo hay
			$("#errors-my-form").children("div").remove();
			//Obtengo el monto ingresado y lo forzo a dos decimales
			rodeentryreg = parseFloat(rodeentryreg);
			rodeentryreg = rodeentryreg.toFixed(2);

			//Agrego la nueva fila a la tabla
			$("#table-add-directmov-entryreg tbody").append("<tr><td><input type='hidden' name='toentryregtext[]' value='"+toentryreg+"' />"+toentryregtext+"</td><td class='number-cell'><input type='hidden' name='rodeentryreg[]' value='"+rodeentryreg+"' />"+rodeentryreg+"</td><td><input type='hidden' name='bankentryreg[]' value='"+bankentryreg+"' />"+bankentryreg+"</td><td><input type='hidden' name='accountentryreg[]' value='"+accountentryreg+"' />"+accountentryreg+"</td><td class='col-btn text-center'><button class='delete-row-directmov-entryreg btn btn-danger' value="+rodeentryreg+">Eliminar</button></td></tr>");

			//Si el total esta vacío ingreso el monto obtenido.
			if($("#table-total-directmov-entryreg").text() == ""){
				$("#table-total-directmov-entryreg").text(""+rodeentryreg+"");
			//Si el total ya tiene valor, le sumo el nuevo monto
			}else{
				var total = parseFloat($("#table-total-directmov-entryreg").text()) + parseFloat(rodeentryreg);
				total = total.toFixed(2);
				$("#table-total-directmov-entryreg").text(total);
			}
			
			//Elimino los valores de los input
			$("#who-entryreg").prop( "disabled", true );
			$("#to-entryreg").val('');
			$("#rode-entryreg").val('');
			$("#bank-entryreg").val('');
			$("#account-entryreg").val('');
		}
	});
 
	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".delete-row-directmov-entryreg",function(){
		//Obtengo el valor almacenado en el botón, es el monto
		var rodeentryreg = $(this).val();
		//Hago la resta del monto eliminado al total
		var total = parseFloat($("#table-total-directmov-entryreg").text()) - parseFloat(rodeentryreg);
		//Forzo al total a ser de dos decimales
		total = total.toFixed(2);
		//Si el total es igual a cero, elimino el número de la celda
		if(total == 0){
			$("#table-total-directmov-entryreg").text("");
		//Si no, agrego el nuevo total a la celda			
		}else{
			$("#table-total-directmov-entryreg").text(total);
		}

		//Obtengo la fila a eliminar desde el botón
		var parent = $(this).parents().parents().get(0);
		//Elimino la fila obtenida
		$(parent).remove();
	});
});