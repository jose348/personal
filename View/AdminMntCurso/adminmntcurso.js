var usu_id = $('#usu_idx').val();

/* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
/* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
/* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */

$(document).ready(function() {

    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */
    $('#cat_id').select2({
        dropdownParent: $('#modalmantenimiento')
    });

    /* esto es para llenar el combo con informacion que viene de mi Controller/Categoria.php */
    $.post("../../Controller/categoria.php?op=combo", function(data) {
        $('#cat_id').html(data);
    });



    /* esto es para llenar el combo con informacion que viene de mi Controller/instructor.php */
    $.post("../../Controller/instructor.php?op=combo", function(data) {
        $('#inst_id').html(data);
    });


    $('#inst_id').select2({
        dropdownParent: $('#modalmantenimiento')
    });
    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */




    //todo estas lineas es para la interaccion con mi tabla y bd
    $('#cursos_data').DataTable({ //llamamos el nombre de la tabla

        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        /* LLAMANDO LOS DATOS DE MI Controller / usuario osea mi json -- 
           de este codigo case "listar_cursos": */


        /* LLAMANDO MI JSON */
        /* LLAMANDO MI JSON */
        "ajax": {
            url: "../../Controller/curso.php?op=listar", //ruta para recibir mi servicio que viene desde mi controller
            type: "post" // tipo de envio 
                // data: { usu_id: usu_id }, //esta linea no porque en listar no tiene datos que enviar
        },
        /* LLAMANDO MI JSON */
        /* LLAMANDO MI JSON */


        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 15, //filas a mostrar
        "order": [
            [0, "desc"]
        ],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

});

/* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
/* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
/* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */


/* AHORA FUNCION PARA EDITAR */
/* AHORA FUNCION PARA EDITAR */
/* AHORA FUNCION PARA EDITAR */
function editar(cur_id) {

}
/* AHORA FUNCION PARA EDITAR */
/* AHORA FUNCION PARA EDITAR */
/* AHORA FUNCION PARA EDITAR */




/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
function eliminar(cur_id) {

}
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */



/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* LLAMNADO A MI MODAL  DE BOTTON NUEVO */
function nuevo() {
    $('#modalmantenimiento').modal('show');
}
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */