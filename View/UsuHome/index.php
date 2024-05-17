<?php

require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) { //para validar si cerre session y no abrir el url copiado antes que ingrese 
  //por url------esta linea 
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php
    require_once("../html/MainHead.php");
    ?>
    <title>Certificados::Home</title>


  </head>

  <body>

    <?php
    require_once("../html/MainMenu.php");

    ?>
    <!-- ########## END: LEFT PANEL ########## -->

    <?php
    require_once("../html/MainHeader.php");

    ?>
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="../UsuHome/index.php">Inicio</a>
          <span class="breadcrumb-item active">Home</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <strong class="d-block d-sm-inline-block-force text text-primary">PRINCIPAL</strong>

        <div class="br-pagebody mg-t-5 pd-x-30">
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
              <div class="bg-teal rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                  <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total de cursos:</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1" id="lbltotal"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">TOP ULTIMOS CURSOS</h6>
    

            <div class="table-wrapper">
              <table id="cursos_data" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Curso</th>
                    <th class="wd-15p">Fecha Inicio</th>
                    <th class="wd-20p">Fecha Fin</th>
                    <th class="wd-15p">Instructor</th>
                    <th class="wd-10p">Certificado</th>

                  </tr>
                </thead>
                <tbody>


                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- TABLA PARA IMPLEMENTACION CON JS  -->
        <!-- TABLA PARA IMPLEMENTACION CON JS  -->



      </div>
    </div>








    <!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php

    require_once("../html/MainJs.php");

    ?>
    <script type="text/javascript" src="usuhome.js"></script>

  </body>

  </html>
<?php

} else {

  /* sino a iniciado session entonces lo redireccionara a la ruta principal */
  //header("Location:".Conectar::ruta()."index.php"); //para validar si cerre session y no abrir el url copiado antes que ingrese 
  header("Location:" . Conectar::ruta() . "View/404"); //por url------esta linea********ojo puede llamar al 404
}

?>