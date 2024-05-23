    <?php
    class Curso extends Conectar
    {

        public function insert_curso($cat_id, $inst_id, $cur_nom, $cur_fechini, $cur_fechfin, $cur_descr)
        {
            $conx = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_curso(cat_id, inst_id, cur_nom, cur_fechini, cur_fechfin, cur_fechcrea, cur_estado, cur_descr, cur_img)
                            VALUES(?,?,?,?,?,now(),'1',?,'../../public/1.png')";
            $sql = $conx->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $inst_id);
            $sql->bindValue(3, $cur_nom);
            $sql->bindValue(4, $cur_fechini);
            $sql->bindValue(5, $cur_fechfin);
            $sql->bindValue(6, $cur_descr);
            $sql->execute();
            return $resultado = $sql->fetchALL();
        }


        public function update_curso($cur_id, $cat_id, $inst_id, $cur_nom, $cur_fechini, $cur_fechfin, $cur_descr)
        {
            $conx = parent::conexion();
            $sql = "UPDATE tm_curso
                    SET 
                    cat_id=?,
                    inst_id=?,
                    cur_nom=?,
                    cur_fechini=?,
                    cur_fechfin=?,
                    cur_descr=?
                    WHERE 
                    cur_id=?";
            $sql = $conx->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $inst_id);
            $sql->bindValue(3, $cur_nom);
            $sql->bindValue(4, $cur_fechini);
            $sql->bindValue(5, $cur_fechfin);
            $sql->bindValue(6, $cur_descr);
            $sql->bindValue(7, $cur_id);
            $sql->execute();
            return $resultado = $sql->fetchALL();
        }

        public function delete_curso($cur_id)
        {
            $cnx = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_curso 
              SET 
              cur_estado=0
              WHERE 
              cur_id=?";
            $sql = $cnx->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        /* obtener lo curso que tiene estado 1 */
        public function get_curso()
        {
            $conn = parent::conexion();
            parent::set_names();
            $sql = "SELECT
            tm_curso.cur_id,
            tm_curso.cur_nom,
            tm_curso.cur_descr,
            tm_curso.cur_fechini,
            tm_curso.cur_fechfin,
            tm_curso.cat_id,
            tm_curso.cur_img,
            tm_categoria.cat_nom,
            tm_curso.inst_id,
            tm_instructor.inst_nom,
            tm_instructor.inst_apep,
            tm_instructor.inst_apem,
            tm_instructor.inst_correo,
            tm_instructor.inst_tel
            FROM tm_curso
            INNER JOIN tm_categoria ON tm_curso.cat_id=tm_categoria.cat_id
            INNER JOIN tm_instructor ON tm_curso.inst_id=tm_instructor.inst_id
            WHERE cur_estado=1";
            $sql = $conn->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        /* SELECCIONAMOS LOS CURSOS POR ID */
        public function get_curso_id($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_curso WHERE cur_estado= 1 AND cur_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

          /* TODO ELIMINAR DE MI MANTENIMIENTO DETALLE CERTIFICADO */
        public function delete_curso_usuario($curd_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE td_curso_usuario
                SET
                    curd_estado = 0
                WHERE
                    curd_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $curd_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }

    /* TODO en mi modal mantenimientodetallecertificado */
    public function insert_curso_usuario($cur_id,$usu_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO td_curso_usuario (cur_id,usu_id, curd_fechacrea,curd_estado) VALUES (?,?,now(),1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cur_id);
        $sql->bindValue(2, $usu_id);
        $sql->execute();

        /* TODO PRIMERO INSERTAMOS DE ESTA FUNCION Y DESPUES GUARDAMOS EL ID QUE INSERTO */
        $sql1="select last_insert_id() as 'curd_id'";
        $sql1=$conectar->prepare($sql1);
        $sql1->execute();
        
         return $resultado=$sql1->fetchAll();

    }

    
    public function update_imagen_curso($cur_id,$cur_img){
        $conectar= parent::conexion();
        parent::set_names();

        require_once("Curso.php");
        $curx = new Curso();
        $cur_img = '';
        if ($_FILES["cur_img"]["name"]!=''){
            $cur_img = $curx->upload_file();
        }

        $sql="UPDATE tm_curso
            SET
                cur_img = ?
            WHERE
                cur_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cur_img);
        $sql->bindValue(2, $cur_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    /*TODO actualizar imagen para guardarlos en mantcurso */
    public function upload_file(){
        if(isset($_FILES["cur_img"])){//guardar aleatorio mis imagenes
            $extension = explode('.', $_FILES['cur_img']['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = '../Public/' . $new_name;
            move_uploaded_file($_FILES['cur_img']['tmp_name'], $destination);
            return "../../Public/".$new_name;
        }
    }
  
    }
    ?>  