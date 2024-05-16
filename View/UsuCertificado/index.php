<!DOCTYPE html>
<html lang="en" class="pos-relative">
  <head>
    <?php
    
        require_once("../html/MainHead.php");
    
    ?>

    <title>Certificado::Imagen</title>
  </head>

  <body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">

      
      <canvas id="canvas" height="600px" width="850px" class="img-fluid" alt="Responsive image"></canvas>

         
      <h5></h5>
      <p class="tx-16 mg-b-30 text-justify" id="cur_descr"></p>

        <div class="d-flex justify-content-center">
          <div class="input-group wd-xs-300"> 
            
            <div class="form-layout-footer">
                <button class="btn btn-outline-info" id="btnpng"><i class="fa fa-send mg-r-10"></i>PNG</button> <!-- realizamos la funcion de descarga ya sea por PNG en usucertificado.js -->
                <button class="btn btn-outline-success" id="btnpdf"><i class="fa fa-send mg-r-10"></i>PDF</button> <!-- realizamos la funcion de descarga ya sea por PNG en usucertificado.js -->
            </div>

          </div><!-- input-group -->
        </div><!-- d-flex -->
      </div>
    </div><!-- ht-100v -->

    <?php  require_once("../html/MainJs.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>s
    
    <script type="text/javascript" src="usucertificado.js"></script>


  </body>
</html>
