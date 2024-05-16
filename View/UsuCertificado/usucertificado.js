/* trabajando con al imagen para mi certificado */
/* trabajando con al imagen para mi certificado */

const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

/* trabajando con al imagen para mi certificado */
/* trabajando con al imagen para mi certificado */


/* Inicializamos la imagen */
const image = new Image();
/* Ruta de la Imagen */
image.src = '../../public/certificado.png';
/* SCRIPT QUE ME PERMITE OPTENER LOS DATOS QUE ESTEN ENVIANDO POR PARAMETROS EN LA URL POR EJE EN EST CASO POR curd_id*/
/* SCRIPT QUE ME PERMITE OPTENER LOS DATOS QUE ESTEN ENVIANDO POR PARAMETROS EN LA URL POR EJE EN EST CASO POR curd_id*/

$(document).ready(function() { // esto significa que llamamos a nuestras  varibale lo que haya dentro cuando el docuemnte est listo
    var curd_id = getUrlParameter('curd_id');


    /* aqui comsumimos lo que traemos del Controller/usuario.php */
    $.post("../../Controller/usuario.php?op=mostrar_curso_detalle", { curd_id: curd_id }, function(data) {

        data = JSON.parse(data);
        $('#cur_descr').html(data.cur_descr); //aqui llamamos las descripcion de mi certificado //usuCertificado/index.php id=cur_descr

        /* trabajando con al imagen para mi certificado */
        /* trabajando con al imagen para mi certificado */


        ctx.drawImage(image, 0, 0, canvas.width, canvas.height); //dimensionamos la imagen
        ctx.font = '40px Arial'; //fuente de la imagen
        ctx.textAlign = "center"; //centrado
        ctx.textBaseline = 'middle';
        var x = canvas.width / 2.5; //asi es mi centro de mi imagen
        var y = canvas.width / 2.4; //asi es mi centro de mi imagen
        ctx.font = '30px Arial Negrita';
        ctx.fillText(data.usu_nom + ' ' + data.usu_apep + ' ' + data.usu_apem, y, 340); //ahora le damos nombres para mis datos y lo movemos a donde queramos

        ctx.font = '25px Serif';
        ctx.fillText(data.cur_nom, y, 390);

        ctx.font = '20px Serif';
        ctx.fillText("Tutor : " + data.inst_nom + ' ' + data.inst_apep + ' ' + data.inst_apem, x, 545); //ahora le damos nombres para mis datos y lo movemos a donde queramos

        ctx.font = '20px Serif';
        ctx.fillText("Inicio :" + data.cur_fechini, y, 420);
        ctx.fillText("    Fin :" + data.cur_fechfin, y, 440);



        /* trabajando con al imagen para mi certificado */
        /* trabajando con al imagen para mi certificado */


    });
});

/* AHORA AQUI MANEJAMOS LAS DESCARGAS YA SEA PNG O PDF */
/* AHORA AQUI MANEJAMOS LAS DESCARGAS YA SEA PNG O PDF */
/* AHORA AQUI MANEJAMOS LAS DESCARGAS YA SEA PNG O PDF */

// AL HACER CLICK EN PNG O PDF, este boton tiene un id="btnpng" y id="btnPDF" y aqui los tramitamos esos id

$(document).on('click', '#btnpng', function() { /* AL HACER CLICK EN EL BOTON ID DE PNG-- AQUI MANEJAMOS LAS DESCARGAS*/

    /* EMPEZAMOS CON LA DESCARGAR */
    /* EMPEZAMOS CON LA DESCARGAR */
    let lblpng = document.createElement('a'); // Creamos una variable 
    lblpng.download = "Certificado.png"; // le damos el nombre con que quiero que se descarge
    lblpng.href = canvas.toDataURL(); //le damos una referencia
    lblpng.click(); //clickeamos en el boton
});

$(document).on("click", "#btnpdf", function() { /* AL HACER CLICK EN EL BOTON ID DE PDF-- AQUI MANEJAMOS LAS DESCARGAS */
    /*descargar un pdf necesitamos una libreia agregamos en usuCertificado /index.php => <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/polyfills.umd.js"></script>*/
    var imgData = canvas.toDataURL('image/png'); // referenciamos 
    var doc = new jsPDF('l', 'mm'); // declaro l anueva variable y llamo jsPDF --- la letra l significa que el pdf sera de manera horizontal
    doc.addImage(imgData, 'PNG', 30, 15); //agrego la imagen del certificado 
    doc.save('Certificado.pdf'); //lo guardo con nombre
});
/* AHORA AQUI MANEJAMOS LAS DESCARGAS YA SEA PNG O PDF */
/* AHORA AQUI MANEJAMOS LAS DESCARGAS YA SEA PNG O PDF */


/* //parametros  para obtener por la url al hacer click en el boton de certificado lo pasa por la url y aca capturamos */
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};