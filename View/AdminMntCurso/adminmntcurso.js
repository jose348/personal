var usu_id = $('#usu_idx').val();

/* interactuamos con mi modal y mi boton guardaryeditarde mi mnt curso */
/* interactuamos con mi modal y mi boton guardaryeditarde mi mnt curso */
/* interactuamos con mi modal y mi boton guardaryeditarde mi mnt curso */
function init() {
    $("#cursos_form").on("submit", function(e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    console.log("test");
    e.preventDefault();
    var formData = new FormData($("#cursos_form")[0]);
    console.log(formData);
    $.ajax({
        url: "../../Controller/curso.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            $('#cursos_data').DataTable().ajax.reload(); //para recargar mi tabla
            $('#modalmantenimiento').modal('hide'); //para limpiar mi modal
            Swal.fire({
                title: 'Correcto',
                text: 'Se Registro Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });
}

/* interactuamos con mi modal y mi boton guardaryeditarde mi mnt curso */
/* interactuamos con mi modal y mi boton guardaryeditarde mi mnt curso */
/* interactuamos con mi modal y mi boton guardaryeditarde mi mnt curso */

$(document).ready(function() {


    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */
    $('#cat_id').select2({
        dropdownParent: $('#modalmantenimiento')
    });



    $('#inst_id').select2({
        dropdownParent: $('#modalmantenimiento')
    });
    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */
    /* para su utilizacion de mi combo select en una ventana modal */


    combo_categoria();

    combo_instructor();


    /* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
    /* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
    /* ESTO ES MI TABLA DE MI MANTENIMIENTO CUSRO */
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
        "iDisplayLength": 10, //filas a mostrar
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
/* cuando le demos editar nos llama al modal con la informacion cargada */
function editar(cur_id) {
    $.post("../../Controller/curso.php?op=mostrar", { cur_id: cur_id }, function(data) {
        data = JSON.parse(data);
        $('#cur_id').val(data.cur_id);
        $('#cat_id').val(data.cat_id).trigger('change');
        $('#cur_nom').val(data.cur_nom);
        $('#cur_descr').val(data.cur_descr);
        $('#cur_fechini').val(data.cur_fechini);
        $('#cur_fechfin').val(data.cur_fechfin);
        $('#inst_id').val(data.inst_id).trigger('change');

    });
    $('#lbltitulo').html('Editar Registro'); //este para cambiarle el titulo al modal que clickeo en editar
    $('#modalmantenimiento').modal('show'); //para traer mi modal
}
/* AHORA FUNCION PARA EDITAR */
/* AHORA FUNCION PARA EDITAR */
/* AHORA FUNCION PARA EDITAR */




/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
function eliminar(cur_id) { //tener encuenta que el cur_id viene de la sentencia eliminar
    swal.fire({
        title: "Elimianr",
        text: "Deseas Eliminar Registro ?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => { // preguntamos si el boton presionado es si
        if (result.value) {
            $.post("../../Controller/curso.php?op=eliminar", { cur_id, cur_id }, function(data) { // eliminamos el registro 
                $('#cursos_data').DataTable().ajax.reload();
                swal.fire({
                    title: 'Correcto',
                    text: 'Se Elimino Correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
            });
        }
    });
}
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */
/* AHORA FUNCION PARA ELIMINAR */





/* LLAMNADO A MI MODAL  DE BOTTON NUEVO */
function nuevo() {
    $('#lbltitulo').html('Nuevo Registro'); //esto solo aparecera cuando llame a nuevo registro como titulo
    $('#cursos_form')[0].reset(); //limpiando cada uno de los datos
    combo_categoria();
    combo_instructor();
    $('#modalmantenimiento').modal('show');
}

function combo_categoria() {
    /* esto es para llenar el combo con informacion que viene de mi Controller/Categoria.php */
    $.post("../../Controller/categoria.php?op=combo", function(data) {
        $('#cat_id').html(data);
    });
}

function combo_instructor() {
    /* esto es para llenar el combo con informacion que viene de mi Controller/instructor.php */
    $.post("../../Controller/instructor.php?op=combo", function(data) {
        $('#inst_id').html(data);
    });
}


init(); //terminamos aqui