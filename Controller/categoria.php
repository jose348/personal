<?php 
require_once("../config/conexion.php");
require_once("../Models/Categoria.php");

$categoria = new Categoria();

switch($_GET["op"]){

    /* LLENANDO MI COMBO EN MI MODAL DE MI MODAL DE mant Curso */
    /* LLENANDO MI COMBO EN MI MODAL DE MI MODAL DE mant Curso */
    /* LLENANDO MI COMBO EN MI MODAL DE MI MODAL DE mant Curso */
    case "combo":
        $datos=$categoria->get_categoria();
        if(is_array($datos)==true and count($datos)>0){
            $html= " <option label='Seleccione'></option>";
            foreach($datos as $row){
                $html.= "<option value='".$row['cat_id']."'>".$row['cat_nom']."</option>";
            }
            echo $html;
        }
        break;
    /* LLENANDO MI COMBO EN MI MODAL DE MI MODAL DE mant Curso */
    /* LLENANDO MI COMBO EN MI MODAL DE MI MODAL DE mant Curso */
    /* LLENANDO MI COMBO EN MI MODAL DE MI MODAL DE mant Curso */
    


}




?>