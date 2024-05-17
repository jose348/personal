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
    <title>Certificados::Perfil</title>


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
          <span class="breadcrumb-item active">Profile</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <strong class="d-block d-sm-inline-block-force text text-primary">MI PERFIL</strong>


        <!-- TABLA PARA IMPLEMENTACION CON JS  -->
        <!-- TABLA PARA IMPLEMENTACION CON JS  -->
        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Registro</h6> 
            
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_nom" id="usu_nom" placeholder="Ingrese Nombre" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Apellido Paterno: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_apep" id="usu_apep" placeholder="Ingrese Apellido Paterno" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Apellido Materno: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_apem" id="usu_apem" placeholder="Ingrese Apellido Materno" required >
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" >Email <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="usu_correo" id="usu_correo" readonly>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="usu_pass" id="usu_pass" placeholder="Ingrese Contraseña" required >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label" >Telefono <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="usu_tel" id="usu_tel" >
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sexo: <span class="tx-danger">*</span></label>
                  <select class="form-control select2"  name="usu_sex" id="usu_sex" data-placeholder="Seleccione">
                    
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="form-layout-footer justify-content-center row row-12">
              <button id="btnactualizar" class="btn btn-outline-primary btn-oblong bd-2 pd-x-30 pd-y-15 tx-uppercase tx-bold tx-spacing-6 tx-15"><span class="icon ion-refresh "> </span> Actualizar</button>
            </div><!-- form-layout-footer -->
          </div>
        </div>
        


      </div>
    </div> <!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php

    require_once("../html/MainJs.php");

    ?>
    <script type="text/javascript" src="usuperfil.js"></script>
  </body>

  </html>
<?php

} else {

  /* sino a iniciado session entonces lo redireccionara a la ruta principal */
  //header("Location:".Conectar::ruta()."index.php"); //para validar si cerre session y no abrir el url copiado antes que ingrese 
  header("Location:" . Conectar::ruta() . "View/404"); //por url------esta linea********ojo puede llamar al 404
}

?>