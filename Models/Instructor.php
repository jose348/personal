<?php 
class Instructor extends Conectar {

    public function insert_instructor($inst_nom, $inst_apep, $inst_apem, $inst_correo, $inst_sex, $inst_tel)
        {
            $conx = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_instructor(inst_nom, inst_apep, inst_apem, inst_correo, inst_sex,inst_fech,inst_estado, inst_tel)
                            VALUES(?,?,?,?,?,now(),'1',?)";
            $sql = $conx->prepare($sql);
            $sql->bindValue(1, $inst_nom);
            $sql->bindValue(2, $inst_apep);
            $sql->bindValue(3, $inst_apem);
            $sql->bindValue(4, $inst_correo);
            $sql->bindValue(5, $inst_sex);
            $sql->bindValue(6, $inst_tel);
            $sql->execute();
            return $resultado = $sql->fetchALL();
        }


        public function update_instructor($inst_id,$inst_nom, $inst_apep, $inst_apem, $inst_correo, $inst_sex, $inst_tel)
        {
            $conx = parent::conexion();
            $sql = "UPDATE tm_instructor
                    SET 
                    inst_nom=?,
                    inst_apep=?,
                    inst_apem=?,
                    inst_correo=?,
                    inst_sex=?,
                    inst_tel=?
                    WHERE 
                    inst_id=?";
            $sql = $conx->prepare($sql);
            $sql->bindValue(1, $inst_nom);
            $sql->bindValue(2, $inst_apep);
            $sql->bindValue(3, $inst_apem);
            $sql->bindValue(4, $inst_correo);
            $sql->bindValue(5, $inst_sex);
            $sql->bindValue(6, $inst_tel);
            $sql->bindValue(7, $inst_id);
            $sql->execute();
            return $resultado = $sql->fetchALL();
        }

    public function delete_instructor($inst_id)
    {
        $cnx = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_instructor
          SET 
          inst_estado=0
          WHERE 
          inst_id=?";
        $sql = $cnx->prepare($sql);
        $sql->bindValue(1, $inst_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }


    /* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
public function get_instructor(){
    $conn=parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM tm_instructor WHERE inst_estado=1";
    $sql=$conn->prepare($sql);  
    $sql->execute();
    return  $resultado=$sql->fetchAll();
 }
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */





public function get_instructor_id($inst_id){
    $conn=parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM tm_instructor WHERE inst_id=";
    $sql=$conn->prepare($sql);  
    $sql->bindValue(1 , $inst_id);
    $sql->execute();
    return  $resultado=$sql->fetchAll();
 }
}
?>