$(function(){
	$("#add-row-directmov-dispersers").on('click', function(){
		//Obtengo los valores de los input
		var whodispersers = $("#who-dispersers").val();
		var whodisperserstext = $("#who-dispersers option:selected").text();
		var whobankdispersers = $("#who-bank-dispersers").val();
		var todispersers = $("#to-dispersers").val();
		var todisperserstext = $("#to-dispersers option:selected").text();
		var tobankdispersers = $("#to-bank-dispersers").val();
		var finishaccountdispersers = $("#finish-account-dispersers").prop('checked');
		var finishaccountdispersersvalue = 0;
		var finishaccountdisperserscheck = "";
			if(finishaccountdispersers == true){
				finishaccountdispersersvalue = 1;
				finishaccountdisperserscheck = "checked";
			}
		var rodedispersers = $("#rode-dispersers").val();

		//Verifico si alguno de los input esta vacío o si el monto es numérico.
		if(whodispersers == "" || whobankdispersers == "" || todispersers == "" || tobankdispersers == "" || (rodedispersers == "" || !$.isNumeric(rodedispersers))){
			//comienzo la cadena de errores en blanco
			var errors = "";
			//Comienzo en cero una variable de errores para saber si debo utilizar el br
			var cont = 0;
			//Verifico cada input y si esta en blanco o si no es válido coloco su cadena de error en la variable mensaje
			if(whodispersers == ""){
				errors = errors + "Debes seleccionar una Empresa origen.";
				cont = 1;
			}
			if(whobankdispersers == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar Banco/Cuenta origen.";
				cont = 1;
			}
			if(todispersers == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes seleccionar una Empresa destino.";
				cont = 1;
			}
			if(tobankdispersers == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar Banco/Cuenta destino.";
				cont = 1;
			}
			if(rodedispersers == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Monto.";
				cont = 1;
			}else if(!$.isNumeric(rodedispersers)){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Monto válido.";
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
			rodedispersers = parseFloat(rodedispersers);
			rodedispersers = rodedispersers.toFixed(2);

			//Agrego la nueva fila a la tabla
			$("#table-add-directmov-dispersers tbody").append("<tr><td><input type='hidden' name='whodispersers[]' value='"+whodispersers+"' />"+whodisperserstext+"</td><td><input type='hidden' name='whobankdispersers[]' value='"+whobankdispersers+"' />"+whobankdispersers+"</td><td><input type='hidden' name='todispersers[]' value='"+todispersers+"' />"+todisperserstext+"</td><td><input type='hidden' name='tobankdispersers[]' value='"+tobankdispersers+"' />"+tobankdispersers+"</td><td class='number-cell'><input type='hidden' name='rodedispersers[]' value='"+rodedispersers+"' />"+rodedispersers+"</td><td class='finaldisperserstd'><input type='hidden' name='finaldispersers[]' value='"+ finishaccountdispersersvalue +"' class='finaldispersersinput' /><input type='checkbox' id='checkfinal[]' "+ finishaccountdisperserscheck +" /></td><td><input type='hidden' name='finisheddispersers[]' value='0' /><input type='checkbox' id='checkfinished[]' /></td><td class='col-btn text-center'><button class='delete-row-directmov-dispersers btn btn-danger' value="+rodedispersers+">Eliminar</button></td></tr>");

			//Verifico si la nueva fila es cuenta final
			if(finishaccountdispersersvalue == 1){
				//Si el total esta vacío ingreso el monto obtenido.
				if($("#table-total-directmov-dispersers").text() == ""){
					$("#table-total-directmov-dispersers").text(""+rodedispersers+"");
				//Si el total ya tiene valor, le sumo el nuevo monto
				}else{
					var total = parseFloat($("#table-total-directmov-dispersers").text()) + parseFloat(rodedispersers);
					total = total.toFixed(2);
					$("#table-total-directmov-dispersers").text(total);
				}
			}
			
			//Elimino los valores de los input
			$("#who-dispersers").val("");
			$("#who-bank-dispersers").val("");
			$("#to-dispersers").val("");
			$("#to-bank-dispersers").val("");
			$("#finish-account-dispersers").prop("checked", false);
			$("#rode-dispersers").val("");
		}
	});
 
	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".delete-row-directmov-dispersers",function(){
		//Obtengo la fila a eliminar desde el botón
		var parent = $(this).parents().parents().get(0);

		//Verifico si es cuenta final
		var finalaccount = $(parent).children('.finaldisperserstd').children('.finaldispersersinput').val();
		if(finalaccount == 1){
			//Obtengo el valor almacenado en el botón, es el monto
			var rodedispersers = $(this).val();
		}else{
			var rodedispersers = 0;
		}
		//Hago la resta del monto eliminado al total
		var total = $("#table-total-directmov-dispersers").text();
		if(total != ""){
			total = parseFloat($("#table-total-directmov-dispersers").text()) - parseFloat(rodedispersers);
			//Forzo al total a ser de dos decimales
			total = total.toFixed(2);
			//Si el total es igual a cero, elimino el número de la celda
			if(total == 0){
				$("#table-total-directmov-dispersers").text("");
			//Si no, agrego el nuevo total a la celda		
			}else{
				$("#table-total-directmov-dispersers").text(total);
			}
		}

		//Elimino la fila obtenida
		$(parent).remove();
	});
});