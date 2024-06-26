var usu_id = $('#usu_idx').val();

function init() {
    $("#usuario_form").on("submit", function(e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../Controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {

            $('#usuario_data').DataTable().ajax.reload();
            $('#modalmantenimiento').modal('hide');

            Swal.fire({
                title: 'Correcto!',
                text: 'Se Registro Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });
}

$(document).ready(function() {

    $('#usu_sex').select2({
        dropdownParent: $('#modalmantenimiento')
    });

    $('#usu_rol').select2({
        dropdownParent: $('#modalmantenimiento')
    });

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
            url: "../../Controller/usuario.php?op=listar",
            type: "post"
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

function editar(usu_id) {
    $.post("../../Controller/usuario.php?op=mostrar", { usu_id: usu_id }, function(data) {
        console.log(data);
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_apep').val(data.usu_apep);
        $('#usu_apem').val(data.usu_apem);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pas').val(data.usu_pas);
        $('#usu_sex').val(data.usu_sex).trigger('change');
        $('#usu_rol').val(data.usu_rol).trigger('change');
        $('#usu_tel').val(data.usu_tel);
        $('#usu_dni').val(data.usu_dni);
    });
    $('#lbltitulo').html('Editar Registro');
    $('#modalmantenimiento').modal('show');
}

function eliminar(usu_id) {
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            $.post("../../Controller/usuario.php?op=eliminar", { usu_id: usu_id }, function(data) {
                $('#usuario_data').DataTable().ajax.reload();

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

function nuevo() {
    $('#usu_id').val('');
    $('#usu_sex').val('').trigger('change');
    $('#usu_rol').val('').trigger('change');
    $('#lbltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
}
/* abriendo mi modalplantilla */
$(document).on("click", "#btnplantilla", function() {
    $('#modalplantilla').modal('show');
});

var ExcelToJSON = function() { // inicializamos la libreria que agregamos
    this.parseExcel = function(file) { //solicitamos el archivo 
        var reader = new FileReader(); //declaramos lo que leera el archivo

        reader.onload = function(e) { //reload
            var data = e.target.result; //detecta la info
            var workbook = XLSX.read(data, { //lee el archivo xls tipo binario
                type: 'binary'
            });
            //TODO: Recorrido a todas las pestañas
            workbook.SheetNames.forEach(function(sheetName) {
                // Here is your object
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.stringify(XL_row_object);
                UserList = JSON.parse(json_object);

                console.log(UserList)
                for (i = 0; i < UserList.length; i++) {

                    var columns = Object.values(UserList[i])

                    $.post("../../Controller/usuario.php?op=guardar_desde_excel", {
                        usu_nom: columns[0],
                        usu_apep: columns[1],
                        usu_apem: columns[2],
                        usu_correo: columns[3],
                        usu_pas: columns[4],
                        usu_sex: columns[5],
                        usu_tel: columns[6],
                        usu_rol: columns[7],
                        usu_dni: columns[8]
                    }, function(data) {
                        console.log(data);
                    });

                }
                /* TODO:Despues de subir la informacion limpiar inputfile */
                document.getElementById("upload").value = null;

                /* TODO: Actualizar Datatable JS */
                $('#usuario_data').DataTable().ajax.reload();
                $('#modalplantilla').modal('hide');
            })
        };
        reader.onerror = function(ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
    };
};

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(files[0]);
}

document.getElementById('upload').addEventListener('change', handleFileSelect, false);
init();