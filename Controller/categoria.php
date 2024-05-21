<?php 
require_once("../config/conexion.php");
require_once("../Models/Categoria.php");

$categoria = new Categoria();

switch($_GET["op"]){

    case "guardaryeditar":
        if(empty($_POST["cat_id"])){
            $categoria->insert_categoria($_POST["cat_nom"],$_POST["cat_fech"]);
            
        }else{
            $categoria->update_categoria($_POST["cat_id"], $_POST["cat_nom"],$_POST["cat_fech"]);
        }
        break;

        /* creando json segun el ID.... mostrar en lisata */
    case "mostrar":
        $datos=$categoria->get_categoria_id($_POST["cat_id"]);
        if(is_array($datos)==true and count($datos) <> 0 ){
            foreach($datos as $row){
                $output["cat_id"]=$row["cat_id"];
                $output["cat_nom"]=$row["cat_nom"];
                $output["cat_fech"]=$row["cat_fech"];

            }
           echo json_encode($output);
        }
            break;
            

    /* ELIMINAR SEGUN ID */
    case "eliminar":
        $categoria->delete_categoria($_POST["cat_id"]);
            break;
    

            /* LISTAMOS SIN EL ID  SOLO LISTAMOS TODO */

    case "listar":

        $datos=$categoria->get_categoria();
        $data =Array();
        foreach($datos as $row){
            $sub_array=array();
            $sub_array[]=$row["cat_nom"];
            $sub_array[]=$row["cat_fech"];
            $sub_array[]='<button type="button" onClick="editar(' . $row["cat_id"] . ');"  id="' . $row["cat_id"] . '" class="btn btn-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[]='<button type="button" onClick="eliminar(' . $row["cat_id"] . ');"  id="' . $row["cat_id"] . '" class="btn btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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