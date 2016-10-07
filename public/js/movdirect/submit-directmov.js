$(function(){
	$("#submit-new-directmov").on('click', function(){
		var toentryregtext = $("input[name='toentryregtext[]']").map(function(){
			return $(this).val();
		}).get();

		for(var i=0; i<toentryregtext.length; i++){
			console.log(toentryregtext[i]);
		}
		/* ---------- */
		var totalentry = $("#table-total-directmov-entryreg").text();
		var totaloutput = $("#table-total-directmov-outputreg").text();
		if(totalentry == "" && totaloutput == ""){
			$("#errors-my-form").children("div").remove();
			//Muestro el nuevo alert con la nueva cadena.
			$("#errors-my-form").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>El movimiento no puede estar vacío.</div>");
		}
		else if(totalentry != totaloutput){
			$("#errors-my-form").children("div").remove();
			//Muestro el nuevo alert con la nueva cadena.
			$("#errors-my-form").append("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>El Monto Total de Entrada no es igual al Monto Total de Salida.</div>");
		}
		else{
			//directmov
			var directmov_from = $("#who-entryreg").val();
			//directmov_entry
			var toentryregtext = $("input[name='toentryregtext[]']").map(function(){
				return $(this).val();
			}).get();
			var rodeentryreg = $("input[name='rodeentryreg[]']").map(function(){
				return $(this).val();
			}).get();
			var bankentryreg = $("input[name='bankentryreg[]']").map(function(){
				return $(this).val();
			}).get();
			var accountentryreg = $("input[name='accountentryreg[]']").map(function(){
				return $(this).val();
			}).get();
			//directmov_output
			var tooutputreg = $("input[name='tooutputreg[]']").map(function(){
				return $(this).val();
			}).get();
			var typeoutputreg = $("input[name='typeoutputreg[]']").map(function(){
				return $(this).val();
			}).get();
			var rodeoutputreg = $("input[name='rodeoutputreg[]']").map(function(){
				return $(this).val();
			}).get();
			var disperseroutputreg = $("input[name='disperseroutputreg[]']").map(function(){
				return $(this).val();
			}).get();
			var bankdispoutputreg = $("input[name='bankdispoutputreg[]']").map(function(){
				return $(this).val();
			}).get();
			var bankdestoutputreg = $("input[name='bankdestoutputreg[]']").map(function(){
				return $(this).val();
			}).get();
			var commentoutputreg = $("input[name='commentoutputreg[]']").map(function(){
				return $(this).val();
			}).get();

			var route = "/directmov";
			var token = $("#token").val();

			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				data: {
					directmov_from: directmov_from,
					directmov_company: toentryregtext,
					directmov_rode: rodeentryreg,
					directmov_bank: bankentryreg,
					directmov_account: accountentryreg,
					directmov_output_company: tooutputreg,
					directmov_output_type: typeoutputreg,
					directmov_output_rode: rodeoutputreg,
					directmov_output_disperser: disperseroutputreg,
					directmov_output_origin: bankdispoutputreg,
					directmov_output_destiny: bankdestoutputreg,
					directmov_output_comment: commentoutputreg,
				},
		        success: function(){
		            document.location.href='/directmov';
				}
			});
		}
	});
});
