var usu_id = $('#usu_idx').val(); // traigo el id que viene de mainHeader/usu_idx

/* CUANDO SE INICIA EL DOCUMENTO SE EJECUTA Y LLAMA A LA LISTA DE NUESTRO DATATABLE */
/* CUANDO SE INICIA EL DOCUMENTO SE EJECUTA Y LLAMA A LA LISTA DE NUESTRO DATATABLE */
/* ESTE CODIGO ES REPETIBLE PARA MISTABLAS LO UNICO QUE CAMBIA SON MISID PARA TARAER LOS DATOS */
/* ESTE CODIGO ES REPETIBLE PARA MISTABLAS LO UNICO QUE CAMBIA SON MISID PARA TARAER LOS DATOS */
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
            url: "../../Controller/usuario.php?op=listar_cursos", //ruta para recibir mi servicio que viene desde mi controller
            type: "post", // tipo de envio 
            data: { usu_id: usu_id }, //tipo de data a enviar
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


/*  creamo una funcion donde pasamos la id para obtener el id del certificado */
/*  creamo una funcion donde pasamos la id para obtener el id del certificado */
function certificado(curd_id) {
    console.log(curd_id);
    window.open('../UsuCertificado/index.php?curd_id=' + curd_id + '', '_blank'); /* abrimos la pagina Certificado que hemos mandado por ID */
    /* window.open('../UsuCertificado/index.php?curd_id='+curd_id+'', '_blank', );  MANDAMOS EL ID POR LA URL DONDE SE VISUALIZA EL CERTIFICADO */
    /* console.log(curd_id); comprobamos si obtenermos el Del certificado */

}