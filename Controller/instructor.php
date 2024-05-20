<?php
require_once("../config/conexion.php");
require_once("../Models/Instructor.php");

$instructor = new Instructor();

switch($_GET["op"]){

    /* LLENANDO EL COMBO DE MI MNT CURSO BOTON NUEVO REGISTRO */
    /* LLENANDO EL COMBO DE MI MNT CURSO BOTON NUEVO REGISTRO */
    /* LLENANDO EL COMBO DE MI MNT CURSO BOTON NUEVO REGISTRO */
    case "combo":
        $datos=$instructor->get_instrcutores();
        if(is_array($datos)==true and count($datos)>0  ){
            $html="<option label='Seleccione'></option>";
            foreach($datos as $row){
                $html.="<option value='".$row['inst_id']."'>".$row['inst_nom']." ".$row['inst_apep']." ".$row['inst_apem']."</option>";
            }
        echo $html;
        }
    break;

    /* LLENANDO EL COMBO DE MI MNT CURSO BOTON NUEVO REGISTRO */
    /* LLENANDO EL COMBO DE MI MNT CURSO BOTON NUEVO REGISTRO */
    /* LLENANDO EL COMBO DE MI MNT CURSO BOTON NUEVO REGISTRO */


    }

?>