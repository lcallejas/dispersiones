$(function(){
	$("#add-row-directmov-outputreg").on('click', function(){
		//Obtengo los valores de los input
		var tooutputreg = $("#to-outputreg").val();
		var typeoutputreg = $("#type-outputreg").val();
		var typeoutputregtext = $("#type-outputreg option:selected").text();
		var rodeoutputreg = $("#rode-outputreg").val();
		var disperseroutputreg = $("#disperser-outputreg").val();
		var bankdispoutputreg = $("#bank-disp-outputreg").val();
		var bankdestoutputreg = $("#bank-dest-outputreg").val();
		var commentoutputreg = $("#comment-outputreg").val();

		//Verifico si alguno de los input esta vacío o si el monto es numérico.
		if(tooutputreg == "" || typeoutputreg == "" || (rodeoutputreg == "" || !$.isNumeric(rodeoutputreg)) || disperseroutputreg == "" || bankdispoutputreg == "" || bankdestoutputreg == ""){
			//comienzo la cadena de errores en blanco
			var errors = "";
			//Comienzo en cero una variable de errores para saber si debo utilizar el br
			var cont = 0;
			//Verifico cada input y si esta en blanco o si no es válido coloco su cadena de error en la variable mensaje
			if(tooutputreg == ""){
				errors = errors + "Debes agregar una Empresa Destino.";
				cont = 1;
			}
			if(typeoutputreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar una Tipo de Movimiento.";
				cont = 1;
			}
			if(rodeoutputreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Monto.";
				cont = 1;
			}else if(!$.isNumeric(rodeoutputreg)){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Monto válido.";
				cont = 1;
			}
			if(disperseroutputreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar una Dispersora.";
				cont = 1;
			}
			if(bankdispoutputreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Banco/Cuenta Dispersora.";
				cont = 1;
			}
			if(bankdestoutputreg == ""){
				if(cont == 1){
					errors = errors + "<br>";
				}
				errors = errors + "Debes agregar un Banco/Cuenta Destino.";
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
			rodeoutputreg = parseFloat(rodeoutputreg);
			rodeoutputreg = rodeoutputreg.toFixed(2);

			//Agrego la nueva fila a la tabla
			$("#table-add-directmov-outputreg tbody").append("<tr><td><input type='hidden' name='tooutputreg[]' value='"+tooutputreg+"' />"+tooutputreg+"</td><td><input type='hidden' name='typeoutputreg[]' value='"+typeoutputreg+"' />"+typeoutputregtext+"</td><td class='number-cell'><input type='hidden' name='rodeoutputreg[]' value='"+rodeoutputreg+"' />"+rodeoutputreg+"</td><td><input type='hidden' name='disperseroutputreg[]' value='"+disperseroutputreg+"' />"+disperseroutputreg+"</td><td><input type='hidden' name='bankdispoutputreg[]' value='"+bankdispoutputreg+"' />"+bankdispoutputreg+"</td><td><input type='hidden' name='bankdestoutputreg[]' value='"+bankdestoutputreg+"' />"+bankdestoutputreg+"</td><td><input type='hidden' name='commentoutputreg[]' value='"+commentoutputreg+"' />"+commentoutputreg+"</td><td class='col-btn text-center'><button class='delete-row-directmov-outputreg btn btn-danger' value="+rodeoutputreg+">Eliminar</button></td></tr>");

			//Si el total esta vacío ingreso el monto obtenido.
			if($("#table-total-directmov-outputreg").text() == ""){
				$("#table-total-directmov-outputreg").text(""+rodeoutputreg+"");
			//Si el total ya tiene valor, le sumo el nuevo monto
			}else{
				var totaloutput = parseFloat($("#table-total-directmov-outputreg").text()) + parseFloat(rodeoutputreg);
				totaloutput = totaloutput.toFixed(2);
				$("#table-total-directmov-outputreg").text(totaloutput);
			}
			
			//Elimino los valores de los input
			$("#to-outputreg").val('');
			$("#type-outputreg").val('');
			$("#rode-outputreg").val('');
			$("#disperser-outputreg").val('');
			$("#bank-disp-outputreg").val('');
			$("#bank-dest-outputreg").val('');
			$("#comment-outputreg").val('');
		}
	});
 
	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".delete-row-directmov-outputreg",function(){
		//Obtengo el valor almacenado en el botón, es el monto
		var rodeoutputreg = $(this).val();
		//Hago la resta del monto eliminado al total
		var totaloutput = parseFloat($("#table-total-directmov-outputreg").text()) - parseFloat(rodeoutputreg);
		//Forzo al total a ser de dos decimales
		totaloutput = totaloutput.toFixed(2);
		//Si el total es igual a cero, elimino el número de la celda
		if(totaloutput == 0){
			$("#table-total-directmov-outputreg").text("");
		//Si no, agrego el nuevo total a la celda			
		}else{
			$("#table-total-directmov-outputreg").text(totaloutput);
		}

		//Obtengo la fila a eliminar desde el botón
		var parent = $(this).parents().parents().get(0);
		//Elimino la fila obtenida
		$(parent).remove();
	});
});