var usu_id = $('#usu_idx').val();



$(document).ready(function() {
    $('#cur_id').select2();

    combo_curso();

    /* Obtener Id de combo curso */
    $('#cur_id').change(function() {
        $("#cur_id option:selected").each(function() { /* con estas lineas capturamos nuestro id de nuestro combo */
            cur_id = $(this).val(); //con el id captrado traemos los datos para mi tabla


            /* Listado de datatable */
            $('#detalle_data').DataTable({
                "aProcessing": true,
                "aServerSide": true,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                ],
                "ajax": {
                    url: "../../Controller/usuario.php?op=listar_cursos_usuario",
                    type: "post",
                    data: { cur_id: cur_id },
                    /* le pasamos como parametro cur_id */
                },
                "bDestroy": true,
                "responsive": true,
                "bInfo": true,
                "iDisplayLength": 10,
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
    });

});

function combo_curso() {
    $.post("../../Controller/curso.php?op=combo", function(data) {
        $('#cur_id').html(data);
    });
}

function eliminar(curd_id) {
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            $.post("../../Controller/curso.php?op=eliminar_curso_usuario", { curd_id: curd_id }, function(data) {
                $('#detalle_data').DataTable().ajax.reload();

                Swal.fire({
                    title: 'Correcto!',
                    text: 'Se Elimino Correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
            });
        }
    });
}

function certificado(curd_id) {
    console.log(curd_id);
    window.open('../UsuCertificado/index.php?curd_id=' + curd_id + '', '_blank');

}

/* TODO ELIMINAR DEL MANTENIMIENTO DETALLE CERTIFICADO */
function eliminar(curd_id) { //tener encuenta que el cur_id viene de la sentencia eliminar
    swal.fire({
        title: "Elimianr",
        text: "Deseas Eliminar Registro ?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => { // preguntamos si el boton presionado es si
        if (result.value) {
            $.post("../../Controller/curso.php?op=eliminar_curso_usuario", { curd_id, curd_id }, function(data) { // eliminamos el registro 
                $('#detalle_data').DataTable().ajax.reload();
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
/* TODO boton nuevo para para traer mi modal de Usuario */
function nuevo() {
    /*TODO validamos que se seleccione un curso en mi combo de mi mantenimiento de detallecurso */
    if ($('#cur_id').val() == '') {
        swal.fire({
            title: 'Error !',
            text: 'Seleccione Curso',
            icon: 'warning',
            confirmButtonText: 'Aceptar'
        })
    } else {
        var cur_id = $('#cur_id').val();

        $('#lbltitulo').html('Tabla de Usuarios');
        listar_usuario(cur_id);
        $('#modalmantenimiento').modal('show');
    }

}

/*TODO listamo los datos de mi tabla mantenimiento usuarios */
function listar_usuario(cur_id) {
    $('#usuario_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax": {
            url: "../../Controller/usuario.php?op=listar_usuario_mant_detalle_certificado",
            type: "post",
            data: { cur_id: cur_id }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
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

}


/*TODO  aca al momento que le damos click en el boton capturamos el
usu_id que viene de la tabla de usuarios del modal de mantenimiento detalle certificado
y lo utilizamos para poder registra en la tabla principa de este mantenimiento */

function registrardetalle() {
    table = $('#usuario_data').DataTable();
    var usu_id = [];

    table.rows().every(function(rowIdx, tableLoop, rowLoop) {
        cell1 = table.cell({ row: rowIdx, column: 0 }).node();
        if ($('input', cell1).prop("checked") == true) {
            id = $('input', cell1).val();
            usu_id.push([id]);
        }
    });

    if (usu_id == 0) {
        Swal.fire({
            title: 'Error!',
            text: 'Seleccionar Usuarios',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        })
    } else {
        /* Creando formulario */
        const formData = new FormData($("#form_detalle")[0]);
        formData.append('cur_id', cur_id);
        formData.append('usu_id', usu_id);

        $.ajax({
            url: "../../Controller/curso.php?op=insert_curso_usuario",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                data = JSON.parse(data);

                data.forEach(e => {
                    e.forEach(i => {
                        console.log(i['curd_id']);
                        $.ajax({
                            type: "POST",
                            url: "../../Controller/curso.php?op=generar_qr",
                            data: { curd_id: i['curd_id'] },
                            dataType: "json"
                        });
                    });
                });
            }
        });

        /* Recargar datatable de los usuarios del curso */
        $('#detalle_data').DataTable().ajax.reload();

        $('#usuario_data').DataTable().ajax.reload();
        /* ocultar modal */
        $('#modalmantenimiento').modal('hide');

    }
}