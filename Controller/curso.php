<?php 

require_once("../config/conexion.php");
require_once("../Models/Curso.php"); 

$curso= new Curso();

switch($_GET["op"]){
    /* GUARDAR Y EDTIAE CUANDO SE TENGA EL ID */
    case "guardaryeditar":
        if(empty($_POST["cur_id"])){
            $curso->insert_curso($_POST["cat_id"],$_POST["inst_id"],$_POST["cur_nom"],$_POST["cur_fechini"],$_POST["cur_fechfin"],$_POST["cur_descr"]);
            
        }else{
            $curso->update_curso($_POST["cur_id"],$_POST["cat_id"],$_POST["inst_id"],$_POST["cur_nom"],$_POST["cur_fechini"],$_POST["cur_fechfin"],$_POST["cur_descr"]);
        }
        break;

        /* creando json segun el ID.... mostrar en lisata */
    case "mostrar":
        $datos=$curso->gte_curso_id("cur_id");
        if(is_array($datos)==true and count($datos) <> 0 ){
            foreach($datos as $row){
                $output["cur_id"]=$row["cur_id"];
                $output["cat_id"]=$row["cat_id"];
                $output["inst_id"]=$row["inst_id"];
                $output["cur_nom"]=$row["cur_nom"];
                $output["cur_fechini"]=$row["cur_fechini"];
                $output["cur_fechfin"]=$row["cur_fechfin"];
                $output["cur_desc"]=$row["cur_desc"];

            }
            json_encode($output);
        }
            break;
            

    /* ELIMINAR SEGUN ID */
    case "eliminar":
        $curso->delete_curso($cur_id);
            break;
    

            /* LISTAMOS SIN EL ID  SOLO LISTAMOS TODO */

    case "listar":

        $datos=$curso->get_curso();
        $data =Array();
        foreach($datos as $row){
            $sub_array=array();
            $sub_array[]=$row["cat_id"];
            $sub_array[]=$row["inst_id"];
            $sub_array[]=$row["cur_nom"];
            $sub_array[]=$row["cur_fechini"];
            $sub_array[]=$row["cur_fechfin"];
            $sub_array[]=$row["cur_descr"];
            $sub_array[]='<button type="button" onClick="editar(' . $row["cur_id"] . ');"  id="' . $row["cur_id"] . '" class="btn btn-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[]='<button type="button" onClick="eliminar(' . $row["cur_id"] . ');"  id="' . $row["cur_id"] . '" class="btn btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $data[]=$sub_array;            
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
echo json_encode($results);
            break; 
           
}
?>