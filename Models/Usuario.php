<?php
class Usuario extends Conectar
{
    /*TODO LOGIN PARA ACCESO DE USUARIO */
    public function login()
    {
        $Conectar = parent::conexion(); //guardamos en la variable $Conectar luego con parent
        //llamamos la conexion()
        parent::set_names(); //con parent llamamos set_name() Conexion

        if (isset($_POST["enviar"])) { //seteamos si biene definida mi variabkle
            $correo = $_POST["correo"];
            $password = $_POST["pass"];

            if (empty($correo) and empty($password)) { // suponiendo que estan vacios los campos empty

                header("Location:" . conectar::ruta() . "index.php?m=2"); //si estan vacios ambos se enviara un mensaje 

                exit(); // luego salimos
            } else {
                $sql = "SELECT * FROM tm_usuarios WHERE usu_correo=? AND usu_pas=? AND usu_estado=1"; //si no estan vacios,,, osea si llegan con informacion entonces trabajamos con la bd

                $stmt = $Conectar->prepare($sql); //preparamos la sentencia SQL 
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $password);
                $stmt->execute(); //ejecutamos la consulta y la guardamos en $resultado
                $resultado = $stmt->fetch(); //guardamos nuestro resultado en un varibale para seguir definiendo

                if (is_array($resultado) and count($resultado) > 0) { //validamos lo obtenido por la sentencia SQL
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["usu_nom"] = $resultado["usu_nom"];
                    $_SESSION["usu_apep"] = $resultado["usu_apep"];
                    $_SESSION["usu_correo"] = $resultado["usu_correo"];
                    $_SESSION["rol_id"] = $resultado["usu_rol"];
                    header("Location:" . Conectar::ruta() . "view/UsuHome"); //ahora lo redirecciono al Home porque aca pude ingresar
                } else {
                    //el usuario y la contraseña vienen vacias 
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }


    /*TODO LISTA CURSOS QUE TIENE UN USUARIO */
    public function get_cursos_por_usuario($usu_id)
    { // para poder llamar la funcion utilizamos parametros $usu_id
        $conectar = parent::conexion(); // traemos la conexion 
        parent::set_names();           // linea par excepcion de las ñ

        ## ahora digitamos la sentencia que de los datos que queresmo seleccionar
        ## en este caso es union de tablas 
        $sql = "SELECT                    
            td_curso_usuario.curd_id,      
            tm_curso.cur_id,
            tm_usuarios.usu_id,
            tm_usuarios.usu_nom,
            tm_usuarios.usu_apep,
            tm_usuarios.usu_apem,
            tm_curso.cur_nom,
            tm_curso.cur_descr,
            tm_instructor.inst_id,
            tm_instructor.inst_nom,
            tm_instructor.inst_apep,
            tm_instructor.inst_apem,
            tm_curso.cur_fechini,
            tm_curso.cur_fechfin
            FROM td_curso_usuario INNER JOIN tm_curso on td_curso_usuario.cur_id=tm_curso.cur_id
                                  INNER JOIN tm_usuarios on td_curso_usuario.usu_id=tm_usuarios.usu_id
                                  INNER JOIN tm_instructor on tm_curso.inst_id=tm_instructor.inst_id
            WHERE td_curso_usuario.usu_id=?";

        $sql = $conectar->prepare($sql); 
        $sql->bindValue(1, $usu_id);    
        $sql->execute();               
           
        return $resultado = $sql->fetchAll();            

    }


       /*TODO MOSTRAR LOS DATOS DEL CURSO CURSO POR ID DE TD */
       public function get_cursos_por_id_detalle($curd_id)
       { // para poder llamar la funcion utilizamos parametros $usu_id
           $conectar = parent::conexion(); // traemos la clase conexion 
           parent::set_names();           // linea par excepcion de las ñ
   
           ## ahora digitamos la sentencia que de los datos que queresmo seleccionar
           ## en este caso es union de tablas 
           $sql = "SELECT                    
           td_curso_usuario.curd_id,      
           tm_curso.cur_id,
           tm_usuarios.usu_id,
           tm_usuarios.usu_nom,
           tm_usuarios.usu_apep,
           tm_usuarios.usu_apem,
           tm_curso.cur_nom,
           tm_curso.cur_descr,
           tm_instructor.inst_id,
           tm_instructor.inst_nom,
           tm_instructor.inst_apep,
           tm_instructor.inst_apem,
           tm_curso.cur_fechini,
           tm_curso.cur_fechfin,
            tm_curso.cur_img
           FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id=tm_curso.cur_id
                                 INNER JOIN tm_usuarios ON td_curso_usuario.usu_id=tm_usuarios.usu_id
                                 INNER JOIN tm_instructor ON tm_curso.inst_id=tm_instructor.inst_id
           WHERE td_curso_usuario.curd_id=?";
   
           $sql = $conectar->prepare($sql); //preparamos la sentencia
           $sql->bindValue(1, $curd_id);    //obtenemos el parametro 
           $sql->execute();               //lo ejecutamos
           $resultado = $sql->fetchAll();   //lo guardamos en una variable
           return $resultado;              //retornamos los resultados
   
       }



       /*TODO contar la cntidad de curso que ah llevado un usuario */
       public function  get_total_cursos_por_usuario($usu_id){//traemos cantidad de cursos con el id
        $conectar=parent::conexion();//nos conectamos a la clase conexio guardandola en una variable
        parent::set_names(); // ignoramos las ñ
        $sql="SELECT count(*) as total_reg_cursos FROM td_curso_usuario WHERE usu_id=?";
        $sql = $conectar->prepare($sql); //preparamos la sentencia 
        $sql->bindValue(1, $usu_id); //los valore del bindValue
        $sql->execute();//ejecutamos
        return $resultado=$sql->fetchAll();//retornamos todos
    }



    /*TODO LIMITANDO LA CANTIDAD DE FILAS QUE QUIERO QUE SE MUETREN */
    public function get_curso_por_usuarios_top10($usu_id){
        // para poder llamar la funcion utilizamos parametros $usu_id
            $conectar = parent::conexion(); // traemos la clase conexion 
            parent::set_names();           // linea par excepcion de las ñ
            ## ahora digitamos la sentencia que de los datos que queresmo seleccionar
            ## en este caso es union de tablas 
            $sql = "SELECT                    
                td_curso_usuario.curd_id,      
                tm_curso.cur_id,
                tm_usuarios.usu_id,
                tm_usuarios.usu_nom,
                tm_usuarios.usu_apep,
                tm_usuarios.usu_apem,
                tm_curso.cur_nom,
                tm_curso.cur_descr,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem,
                tm_curso.cur_fechini,
                tm_curso.cur_fechfin
                FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id=tm_curso.cur_id
                                      INNER JOIN tm_usuarios ON td_curso_usuario.usu_id=tm_usuarios.usu_id
                                      INNER JOIN tm_instructor ON tm_curso.inst_id=tm_instructor.inst_id
                WHERE td_curso_usuario.usu_id=?
                AND td_curso_usuario.curd_estado=1
                LIMIT 10";
    
            $sql = $conectar->prepare($sql); //preparamos la sentencia
            $sql->bindValue(1, $usu_id);    //obtenemos el parametro 
            $sql->execute();               //lo ejecutamos
            $resultado = $sql->fetchAll();   //lo guardamos en una variable
            return $resultado;              //retornamos los resultados
    }

    public function get_curso_usuario_x_id($cur_id){
        $conectar = parent::conexion(); //TODO traemos la clase conexion 
        parent::set_names();           // linea par excepcion de las ñ
        ## ahora digitamos la sentencia que de los datos que queresmo seleccionar
        ## en este caso es union de tablas 
        $sql = "SELECT                    
            td_curso_usuario.curd_id,      
            tm_curso.cur_id,
            tm_usuarios.usu_id,
            tm_usuarios.usu_nom,
            tm_usuarios.usu_apep,
            tm_usuarios.usu_apem,
            tm_curso.cur_nom,
            tm_curso.cur_descr,
            tm_instructor.inst_id,
            tm_instructor.inst_nom,
            tm_instructor.inst_apep,
            tm_instructor.inst_apem,
            tm_curso.cur_fechini,
            tm_curso.cur_fechfin
            FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id=tm_curso.cur_id
                                  INNER JOIN tm_usuarios ON td_curso_usuario.usu_id=tm_usuarios.usu_id
                                  INNER JOIN tm_instructor ON tm_curso.inst_id=tm_instructor.inst_id
            WHERE tm_curso.cur_id=?
            AND td_curso_usuario.curd_estado=1";
          

        $sql = $conectar->prepare($sql); //preparamos la sentencia
        $sql->bindValue(1, $cur_id);    //obtenemos el parametro 
        $sql->execute();               //lo ejecutamos
        $resultado = $sql->fetchAll();   //lo guardamos en una variable
        return $resultado;              //retornamos los resultados
    }

    /*TODO AHORA TRABAJAREMOS CON EL ID DEL USUARIOS PARA TRAER DATOS DE  USUARIOS */
    public function get_usuario_por_id($usu_id){
        $conectar =parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM  tm_usuarios WHERE usu_estado=1 AND usu_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_id);
        $sql->execute();
        $resultado = $sql->fetchAll();
        return $resultado;

    }


    /*TODO ahroa actualzimos mis datos perfil */
    public function update_usuario_perfil($usu_id,$usu_nom,$usu_apep,$usu_apem,$usu_pass,$usu_sex,$usu_tel){// siempre pasamos los datos a actualizar
         $conetar=parent::conexion();  
         parent:: set_names();
         $sql="UPDATE tm_usuarios
                SET usu_nom=?,
                    usu_apep=?,
                    usu_apem=?,
                    usu_pas=?,
                    usu_sex=?,
                    usu_tel=?
                    
                WHERE   
                    usu_id=? ";     
         $sql=$conetar->prepare($sql);
         $sql->bindValue(1,$usu_nom);
         $sql->bindValue(2,$usu_apep);
         $sql->bindValue(3,$usu_apem);
         $sql->bindValue(4,$usu_pass);
         $sql->bindValue(5,$usu_sex);
         $sql->bindValue(6,$usu_tel);
         
         $sql->bindValue(7,$usu_id);

         $sql->execute();
         $resultado=$sql->fetchAll();    
        return $resultado;
    }

    
      
        public function insert_usuario($usu_nom, $usu_apep,$usu_apem,$usu_correo,$usu_pas,$usu_sex,$usu_tel,$usu_rol){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_usuarios (usu_nom, usu_apep,usu_apem,usu_correo,usu_pas,usu_sex,usu_fech,usu_estado,usu_tel,usu_rol) 
                        VALUES (null,?,?,?,?,?,?,now(),'1',?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_apep);
            $sql->bindValue(3, $usu_apem);
            $sql->bindValue(4, $usu_correo);
            $sql->bindValue(5, $usu_pas);
            $sql->bindValue(6, $usu_sex);
            $sql->bindValue(7, $usu_tel);
            $sql->bindValue(8, $usu_rol);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        

        public function update_usuario($usu_id,$usu_nom, $usu_apep,$usu_apem,$usu_correo,$usu_pas,$usu_sex,$usu_tel,$usu_rol){
            $conx = parent::conexion();
            $sql = "UPDATE tm_usuarios
                    SET 
                    usu_nom=?,
                    usu_apep=?,
                    usu_apem=?,
                    usu_correo=?,
                    usu_pas=?,
                    usu_sex=?,
                    usu_tel=?,
                    usu_rol=?
                    WHERE 
                    usu_id=?";
            $sql = $conx->prepare($sql);
            $sql->bindValue(1, $usu_nom);
            $sql->bindValue(2, $usu_apep);
            $sql->bindValue(3, $usu_apem);
            $sql->bindValue(4, $usu_correo);
            $sql->bindValue(5, $usu_pas);
            $sql->bindValue(6, $usu_sex);
            $sql->bindValue(7, $usu_tel);
            $sql->bindValue(8, $usu_rol);
            $sql->bindValue(9, $usu_id);
            $sql->execute();
            return $resultado = $sql->fetchALL();
        }
 

        public function delete_usuario($usu_id)
        {
            $cnx = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_usuarios
              SET 
              usu_estado=0
              WHERE 
              usu_id=?"; 
            $sql = $cnx->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
  
        
        /*TODO LISTAR TODOS LOS USUARIOS */
        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuarios WHERE usu_estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO LISTAR USUARIO QUE NO PERTENEZCAN A ESE CURSO DE MI COMBO, YA 
        QUE EN MI MNTDETALLECERTIFICADO LOS TENGO POR COMBO, EN ESTE CASO EN MI CUR_ID 
        TRAEMOS LOS USUARIOS QUE NO ESTEN AHI  */
        public function get_usuario_modal($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuarios WHERE usu_estado=1
            AND usu_id NOT IN (SELECT usu_id FROM td_curso_usuario WHERE cur_id=? AND curd_estado=1)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
}
