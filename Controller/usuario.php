<?php

require_once("../config/conexion.php"); //llamando la cadena de coneccion 

require_once("../Models/Usuario.php");  //llamamos a la clase Usuario donde realizamos las transacciones

$usuario = new Usuario();                 //Iniciamos la Clase


/* OPCION DE SOLICITUD DE CONTROLLER */
/* OPCION DE SOLICITUD DE CONTROLLER */
switch ($_GET["op"]) {                    //pasamos la variable 


    case "guardaryeditar":
        if(empty($_POST["usu_id"])){
            $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_apep"],$_POST["usu_apem"],$_POST["usu_correo"],$_POST["usu_pas"],$_POST["usu_sex"],$_POST["usu_tel"],$_POST["usu_rol"]);
            
        }else{
            $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nom"],$_POST["usu_apep"],$_POST["usu_apem"],$_POST["usu_correo"],$_POST["usu_pas"],$_POST["usu_sex"],$_POST["usu_tel"],$_POST["usu_rol"]);
        }
        break;


        /*******************************************CASO 1**********************************************/
        /*******************************************CASO 1**********************************************/
        /* MICRO SERVICIOS PARA PODER MOSTRAR EL LISTADO DE CURSOS */
    case "listar_cursos":
        $datos = $usuario->get_cursos_por_usuario($_POST["usu_id"]); //guardamo en una variable el resultado de la base de datos
        //le pasamos un post que viene de la vista    

        $data = Array();                                        //ahora realizamos un arreglo para mostrarlo en mi datatable.js
        foreach ($datos as $row) {                             //array de mi variable de datos

            /* HORA DECLARO CADA UNO DE LOS NOMBRE DE LAS VARIABLE */
            /* HORA DECLARO CADA UNO DE LOS NOMBRE DE LAS VARIABLE */
            /* OSEA NUESTRAS COLUMNAS DE NUESTRAS TABLAS QUE DESEAMOS MOSTRAR*/
            $sub_array = array();
            $sub_array[] = $row["cur_nom"];
            $sub_array[] = $row["cur_fechini"];
            $sub_array[] = $row["cur_fechfin"];
            $sub_array[] = $row["inst_nom"];

            /*  TAMBIEN PODEMOS PONER UN BOTON PARA PODER VISUALIZAR MI CERTIFICADO */
            /*  TAMBIEN PODEMOS PONER UN BOTON PARA PODER VISUALIZAR MI CERTIFICADO */
            $sub_array[] = '<button type="button" onClick="certificado(' . $row["curd_id"] . ');"  id="' . $row["curd_id"] . '" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
            $data[] = $sub_array;
        }

        /* PARA LISTAR UN DATA TABLE SERA ESTE FORMATO LO UNICO QUE SE CAMBIA SON LAS VARIABLE 
                ES UN JSON PARA QUE CALCE PERFECTO CON EL FORMATO DE MI FRAME */
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
        /*******************************************CASO 1**********************************************/
        /*******************************************CASO 1**********************************************/








        /*******************************************CASO 2**********************************************/
        /*******************************************CASO 2**********************************************/
        /* imformacion con el certificado con el curd_id */
    case "mostrar_curso_detalle":
        $datos = $usuario->get_cursos_por_id_detalle($_POST["curd_id"]);
        if (is_array($datos) == true and count($datos) <> 0) { //si es una arrays y tambien si es mayor que cero entonces, si cumple 
            foreach ($datos as $row) { //recorremos la varibale datos
                //AHORA CREAMOS UN OUPUT CON LO DATOS|
                $output["curd_id"] = $row["curd_id"];
                $output["cur_id"] = $row["cur_id"];
                $output["usu_id"] = $row["usu_id"];
                $output["usu_nom"] = $row["usu_nom"];

                $output["usu_apep"] = $row["usu_apep"];
                $output["usu_apem"] = $row["usu_apem"];
                $output["cur_nom"] = $row["cur_nom"];
                $output["cur_descr"] = $row["cur_descr"];
                $output["cur_fechini"] = $row["cur_fechini"];
                $output["cur_fechfin"] = $row["cur_fechfin"];
                $output["cur_img"] = $row["cur_img"];
                $output["inst_id"] = $row["inst_id"];
                $output["inst_nom"] = $row["inst_nom"];
                $output["inst_apep"] = $row["inst_apep"];
                $output["inst_apem"] = $row["inst_apem"];
            }
            // lo vamos a consumir en usucertificado.js
            echo json_encode($output); // lo convierte en json cada ves que mandemos curd_id
        }
        break;
        /*******************************************CASO 2**********************************************/
        /*******************************************CASO 2**********************************************/





        /*******************************************CASO 3**********************************************/
        /*******************************************CASO 3**********************************************/
        /* cantidad de registros que tiene el usuario */
    case "total":
        $datos = $usuario->get_total_cursos_por_usuario($_POST["usu_id"]); //guardamos en la variable datos la instancia de Models/Usuario.php y//le pasamos lo que viene por $_POST
        if (is_array($datos) == true and count($datos) <> 0) { //si el dato tiene valores en arrays y es diferente de cero entonces
            foreach ($datos as $row) { //recorro con un foreach los resultado de lo que viene de $datos y que fue pasado por $_POST["usu_id]
                $output["total_reg_cursos"] = $row["total_reg_cursos"]; //$output captura el resultado y lo guadar y lo sede al $row
            }
            echo json_encode($output); //el resultado que trae output lo imprimos en unjson 
        }
        //ahora si es un array o si tiene informacion                                                         
        break;
        /*******************************************CASO 3**********************************************/
        /*******************************************CASO 3**********************************************/







        /*******************************************CASO 4**********************************************/
        /*******************************************CASO 4**********************************************/
        /* solo mostrar los registros deseados en este caso 10*/
    case "10registros":
        $datos = $usuario->get_curso_por_usuarios_top10($_POST["usu_id"]); //guardamos en la variable datos la instancia de Models/Usuario.php y//le pasamos lo que viene por $_POST
           $data=Array();
           foreach ($datos as $row) {
             $sub_array= array();
             $sub_array[] = $row["cur_nom"];
             $sub_array[] = $row["cur_fechini"];
             $sub_array[] = $row["cur_fechfin"];
             $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
             $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
             $data[]=$sub_array;
           }

           $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($results);

        break;
        /*******************************************CASO 4**********************************************/
        /*******************************************CASO 4**********************************************/




        /*******************************************CASO 5**********************************************/
        /*******************************************CASO 5**********************************************/
            /* mostra los usuarios que contengan el id de ingres o con el que se logean */
        case "mostrar":
            $datos=$usuario->get_usuario_por_id($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["usu_id"]=$row["usu_id"];
                    $output["usu_nom"]=$row["usu_nom"];
                    $output["usu_apep"]=$row["usu_apep"];
                    $output["usu_apem"]=$row["usu_apem"];
                    $output["usu_correo"]=$row["usu_correo"];
                    $output["usu_pas"]=$row["usu_pas"];
                    $output["usu_sex"]=$row["usu_sex"];
                    $output["usu_fech"]=$row["usu_fech"];
                    $output["usu_estado"]=$row["usu_estado"];
                    $output["usu_tel"]=$row["usu_tel"];
                    $output["usu_rol"]=$row["usu_rol"];
                    
                }
         
                echo json_encode($output);
            }

            break;


        /*******************************************CASO 5**********************************************/
        /*******************************************CASO 5**********************************************/
        




        /*******************************************CASO 6**********************************************/
        /*******************************************CASO 6**********************************************//*******************************************CASO 5**********************************************/
        /* actualizar mis datos de quien ingreso al sistema, actualizando el perfil */
        case "Update_perfil":
            $usuario->update_usuario_perfil(
                $_POST["usu_id"],
                $_POST["usu_nom"],
                $_POST["usu_apep"],
                $_POST["usu_apem"],
                $_POST["usu_pass"],
                $_POST["usu_sex"],
                $_POST["usu_tel"]
            );
            
            break;
        
        /*******************************************CASO 6**********************************************//*******************************************CASO 5**********************************************/
        /*******************************************CASO 6**********************************************/


        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
                break;
        
    
                /* LISTAMOS SIN EL ID  SOLO LISTAMOS TODO */
    
        case "listar":
    
            $datos=$usuario->get_usuario();
            $data =Array();
            foreach($datos as $row){
                $sub_array=array();
                $sub_array[]=$row["usu_nom"];
                $sub_array[]=$row["usu_apep"];
                $sub_array[]=$row["usu_apem"];
                $sub_array[]=$row["usu_correo"];
                if($row["usu_rol"]==1){
                    $sub_array[]="Usuario";
                }else{

                $sub_array[]="Administrador";
                }
                $sub_array[]=$row["usu_tel"];
                $sub_array[]='<button type="button" onClick="editar(' . $row["usu_id"] . ');"  id="' . $row["usu_id"] . '" class="btn btn-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[]='<button type="button" onClick="eliminar(' . $row["usu_id"] . ');"  id="' . $row["usu_id"] . '" class="btn btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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



                /* listar a todos lo usuarios pertenecientes a curso */
                case "listar_cursos_usuario":
                    $datos = $usuario->get_curso_usuario_x_id($_POST["cur_id"]); //guardamos en la variable datos la instancia de Models/Usuario.php y//le pasamos lo que viene por $_POST
                       $data=Array();
                       foreach ($datos as $row) {
                         $sub_array= array();
                         $sub_array[] = $row["cur_nom"];
                         $sub_array[] = $row["usu_nom"]." ".$row["usu_apep"]." ".$row["usu_apem"];
                         $sub_array[] = $row["cur_fechini"];
                         $sub_array[] = $row["cur_fechfin"];
                         $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
                         $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-info btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                         $sub_array[]='<button type="button" onClick="eliminar(' . $row["curd_id"] . ');"  id="' . $row["curd_id"] . '" class="btn btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                         $data[]=$sub_array;
                       }
            
                       $results = array(
                        "sEcho"=>1,
                        "iTotalRecords"=>count($data),
                        "iTotalDisplayRecords"=>count($data),
                        "aaData"=>$data);
                    echo json_encode($results);
            
                    break;



                    /*TODO LISTA PARA MANTENIMIENTO USUARIO QUE ESTA EN MI MODAL DE MANTENIMIENTO DETALLE CERTIFCADO */
                    case "listar_usuario_mant_detalle_certificado":
    
                        $datos=$usuario->get_usuario_modal($_POST["cur_id"]);
                        $data =Array();
                        foreach($datos as $row){
                            $sub_array=array();
                            /*TODO agredamos en un sub arrays el checkbox para la tabla que esta en el modal de mntdetallecurso */
                            $sub_array[] = "<input type='checkbox' name='detallecheck[]' value='". $row["usu_id"] ."'>";
                            $sub_array[]=$row["usu_nom"];
                            $sub_array[]=$row["usu_apep"];
                            $sub_array[]=$row["usu_apem"];
                            $sub_array[]=$row["usu_correo"];
                            $sub_array[]=$row["usu_tel"];
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
