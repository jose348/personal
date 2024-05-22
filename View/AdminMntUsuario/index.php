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
    <title>Mantenimiento::Usuario</title>


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
          <span class="breadcrumb-item active">Mantenimiento del Curso</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <strong class="d-block d-sm-inline-block-force text text-primary">MANTENIMIENTO DEL CURSO</strong>


        <!-- TABLA PARA IMPLEMENTACION CON JS  -->
        <!-- TABLA PARA IMPLEMENTACION CON JS  -->
        <div class="br-pagebody ">
          <div class="br-section-wrapper">
  <!-- #region  --> 

            <button class="col-sm-3 btn btn-outline-primary" id="add_button" onclick="nuevo()">
              <i class="fa fa-plus mg-r-10"></i>Nuevo Registro
            </button>



            <div class="table-wrapper">
              <br>
              <table id="usuario_data" class="table display responsive nowrap">
                 <thead>
                    <tr>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-15p">Ape.Paterno</th>
                    <th class="wd-15p">Ape.Materno</th>
                    <th class="wd-15p">Correo</th>
                    
                    <th class="wd-15p">Rol</th>
                    <th class="wd-15p">Telefono</th>
                    <th class="wd-10p"></th>
                    <th class="wd-10p"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>



      </div>
    </div> <!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php
    require_once("modalmantenimiento.php");
    require_once("../html/MainJs.php");

    ?>
    <script type="text/javascript" src="adminmntusuario.js"></script>
  </body>

  </html>
<?php

} else {

  /* sino a iniciado session entonces lo redireccionara a la ruta principal */
  //header("Location:".Conectar::ruta()."index.php"); //para validar si cerre session y no abrir el url copiado antes que ingrese 
  header("Location:" . Conectar::ruta() . "View/404"); //por url------esta linea********ojo puede llamar al 404
}

?>