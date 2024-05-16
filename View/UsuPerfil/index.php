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
          <a class="breadcrumb-item" href="#">Perfil</a>
          <span class="breadcrumb-item active">Profile</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Perfil</h4>
        <p class="mg-b-0">Introducing Bracket apps &amp; pages, the most handsome admin template of all time.</p>
      </div>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   <?php 
   
    require_once ("../html/MainJs.php");
   
   ?>
  </body>
</html>
<?php 

}else{

  /* sino a iniciado session entonces lo redireccionara a la ruta principal */
  //header("Location:".Conectar::ruta()."index.php"); //para validar si cerre session y no abrir el url copiado antes que ingrese 
  header("Location:".Conectar::ruta()."View/404");//por url------esta linea********ojo puede llamar al 404
}

?>