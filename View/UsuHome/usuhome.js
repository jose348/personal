var usu_id = $('#usu_idx').val(); // traigo el id que viene de mainHeader/usu_idx
$(document).ready(function() {

    $.post("../../Controller/usuario.php?op=total", { usu_id: usu_id }, function(data) { /* llamamos a nuestro controlado lo que esta el case*/

        data = JSON.parse(data);
        //console.log(data); //consumimos el resultado en este caso es el id y lo muestra en json
        $('#lbltotal').html(data.total_reg_cursos); //llamamos al id =lbltotal que esta en usuHome/index.php pero para que me lo muestre en ves de val() le ponemos html
        //luego data.total_reg_cursos que lo capturo el $output y lo remplazo en $row
    });

    $(document).ready(function() {

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
                url: "../../Controller/usuario.php?op=10registros", //ruta para recibir mi servicio que viene desde mi controller
                type: "post", // tipo de envio 
                data: { usu_id: usu_id }, //tipo de data a enviar
            },
            /* LLAMANDO MI JSON */
            /* LLAMANDO MI JSON */


            "bDestroy": true,
            "responsive": true,
            "bInfo": true,
            "iDisplayLength": 10, //filas a mostrar para mostrar 10
            "order": [
                [0, "desc"] //ordenamiento de la lista descendiente o ascendente
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

function certificado(curd_id) {
    console.log(curd_id);
    window.open('../UsuCertificado/index.php?curd_id=' + curd_id + '', '_blank');

}