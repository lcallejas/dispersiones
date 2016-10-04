var direction = 'http://dispersiones.app/';

function Mostrar(id, name){
    $(function() {
        console.log( "ready!" );
        $('#name').text(name);
        $('#eliminar').val(id);
        $('#id').val(id);
    });
}

function EliminarUsuario(btn){
    var route = direction+"user/"+btn.value+"";
    var token = $('#token').val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(){
            document.location.href=direction+'user';
        }
    });
}

function EliminarEmpresa(btn){
    var route = direction+"company/"+btn.value+"";
    var token = $('#token').val();

    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(){
            document.location.href=direction+'company';
        }
    });
}