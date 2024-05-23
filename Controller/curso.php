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
        $datos=$curso->get_curso_id($_POST["cur_id"]);
        if(is_array($datos)==true and count($datos) <> 0 ){
            foreach($datos as $row){
                $output["cur_id"]=$row["cur_id"];
                $output["cat_id"]=$row["cat_id"];
                $output["inst_id"]=$row["inst_id"];
                $output["cur_nom"]=$row["cur_nom"];
                $output["cur_fechini"]=$row["cur_fechini"];
                $output["cur_fechfin"]=$row["cur_fechfin"];
                $output["cur_descr"]=$row["cur_descr"];

            }
           echo json_encode($output);
        }
            break;
            

    /* ELIMINAR SEGUN ID */
    case "eliminar":
        $curso->delete_curso($_POST["cur_id"]);
            break;
    

            /* LISTAMOS SIN EL ID  SOLO LISTAMOS TODO */

    case "listar":

        $datos=$curso->get_curso();
        $data =Array();
        foreach($datos as $row){
            $sub_array=array();
            $sub_array[]=$row["cat_nom"];
            //$sub_array[]=$row["inst_nom"]." ".$row["inst_apep"]." ".$row["inst_apem"]; TODO en un inicio fue asi pero luego le agregamos
            $sub_array[]='<a href="'.$row["cur_img"].'" target="_blank">'.strtoupper($row["cur_nom"]).'</a>'; //le agregamo la etiqueta <a>ruta </a>
           
            $sub_array[]=$row["cur_fechini"];
            $sub_array[]=$row["cur_fechfin"];
            $sub_array[]=$row["inst_nom"] ." ". $row["inst_apep"] ." ". $row["inst_apem"];
            $sub_array[]=$row["cur_descr"];
            $sub_array[]='<button type="button" onClick="editar(' . $row["cur_id"] . ');"  id="' . $row["cur_id"] . '" class="btn btn-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            $sub_array[]='<button type="button" onClick="eliminar(' . $row["cur_id"] . ');"  id="' . $row["cur_id"] . '" class="btn btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            $sub_array[] ='<button type="button" onClick="imagen('.$row["cur_id"].');"  id="'.$row["cur_id"].'" class="btn btn-outline-success btn-icon"><div><i class="fa fa-file"></i></div></button>';  
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
           

            //este combo me ayudar a mi combo de manteniemiento detalle- certificado a llenar de informacion 
            case "combo":
                $datos=$curso->get_curso();
                if(is_array($datos)==true and count($datos)>0){
                    $html= " <option label='Seleccione'></option>";
                    foreach($datos as $row){
                        $html.= "<option value='".$row['cur_id']."'>".$row['cur_nom']."</option>";
                    }
                    echo $html;
                }
                break;
                
                /* TODO ELIMINAR PARA EL MANTENIMIENTO DETALLE CERTIFICADO */
                case "eliminar_curso_usuario":
                    $curso->delete_curso_usuario($_POST["curd_id"]);
                    break;
                       
                    
                    /* TODO COMO SELECCIONAMOS EL EL CHECKBOX LO ENVIAMOS COMO ARRAY Y LO NECESITAMOS RECORRE */
                    
                  /*TODO: Insetar detalle de curso usuario */
        case "insert_curso_usuario":
            /*TODO: Array de usuario separado por comas */
            $datos = explode(',', $_POST['usu_id']);
            /*TODO: Registrar tantos usuarios vengan de la vista */
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $idx=$curso->insert_curso_usuario($_POST["cur_id"],$row);
                $sub_array[] = $idx;
                $data[] = $sub_array;
            }

            echo json_encode($data);
            break;
                
           
            case "generar_qr":
                require 'phpqrcode/qrlib.php'; 	
                //Primer Parametro - Text del QR
                //Segundo Parametro - Ruta donde se guardara el archivo
                QRcode::png(conectar::ruta()."view/UsuCertificado/index.php?curd_id=".$_POST["curd_id"],"../Public/qr/".$_POST["curd_id"].".png",'L',32,5);
                break;
                
                case "update_imagen_curso":
                    $curso->update_imagen_curso($_POST["curx_idx"],$_POST["cur_img"]);
                    break;
}
?>