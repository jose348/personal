var usu_id = $('#usu_idx').val();

$(document).ready(function() {
    $.post("../../Controller/usuario.php?op=mostrar", { usu_id: usu_id }, function(data) {
        data = JSON.parse(data);


        /* asignamos los input.....ose le damos valorescon el id que se ingres que se llenen automaticamente los inputs de mi perfil */
        /* asignamos los input.....ose le damos valorescon el id que se ingres que se llenen automaticamente los inputs de mi perfil */

        $('#usu_nom').val(data.usu_nom); /* en esta linea de codigo traemos el, id = usu_nom que viene de mi index y data.usu_nom que viene de Controller / usuario.php /case :mostrar */
        $('#usu_apep').val(data.usu_apep);
        $('#usu_apem').val(data.usu_apem);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pas);
        $('#usu_tel').val(data.usu_tel);
        $('#usu_sex').val(data.usu_sex).trigger("change"); /* tener encuentaque este es un combo por eso le ponemos trigger */
    });
});

/* ahora llamamos a nuestro boton actualizar que atue */
/* ahora llamamos a nuestro boton actualizar que atue */
/* ahora llamamos a nuestro boton actualizar que atue */
$(document).on("click", '#btnactualizar', function() {
    $.post("../../Controller/usuario.php?op=Update_perfil", { //para poder  actualziar---tener encuenta el orden 
        //mandamos los datos con el valor que tenga nuevo que tenga en los inputs
        usu_id: usu_id,
        usu_nom: $('#usu_nom').val(),
        usu_apep: $('#usu_apep').val(),
        usu_apem: $('#usu_apem').val(),
        usu_pass: $('#usu_pass').val(),
        usu_sex: $('#usu_sex').val(),
        usu_tel: $('#usu_tel').val(),

    }, function(data) {});
    //ahora mandaremos un mensaje diciendo que fueron correctos
    Swal.fire({
        titulo: 'Correcto!',
        text: 'Se Actualizo Correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    })
});