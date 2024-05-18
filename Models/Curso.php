<?php
class Curso extends Conectar{

    public function insert_curso($cat_id,$inst_id,$cur_nom,$cur_fechini,$cur_fechfin,$cur_descr){
    $conx=parent::conexion();
    $sql="INSERT INTO tm_curso(cur_id, cat_id, inst_id, cur_nom, cur_fechini, cur_fechfin, cur_fechcrea,cur_estado,cur_descr)
                            VALUES(null,?,?,?,?,?,now(),'1',?)";
    $sql=$conx->prepare($sql);
    $sql->bindValue("1",$cat_id);
    $sql->bindValue("2",$inst_id);
    $sql->bindValue("3",$cur_nom);
    $sql->bindValue("4",$cur_fechini);
    $sql->bindValue("5",$cur_fechfin);
    $sql->bindValue("6",$cur_descr);
    $sql->execute();
    return $resultado=$sql->fetchALL();

    }

   
        public function update_curso($cur_id,$cat_id,$inst_id,$cur_nom,$cur_fechini,$cur_fechfin,$cur_descr){
            $conx=parent::conexion();
            $sql="UPDATE tm_curso
                    SET 
                    cat_id=?,
                    inst_id=?,
                    cur_nom=?,
                    cur_fechini=?,
                    cur_fechfin=?,
                    cur_descr=?
                    WHERE 
                    cur_id";
            $sql=$conx->prepare($sql);
            $sql->bindValue("1",$cat_id);
            $sql->bindValue("2",$inst_id);
            $sql->bindValue("3",$cur_nom);
            $sql->bindValue("4",$cur_fechini);
            $sql->bindValue("5",$cur_fechfin);
            $sql->bindValue("6",$cur_descr);
            $sql->bindValue("7",$cur_id);
            $sql->execute();
            return $resultado=$sql->fetchALL();
    }

    public function delete_curso($cur_id){
        $cnx=parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_curso 
              SET 
              cur_estado=0
              WHERE 
              cur_id=?";
        $sql=$cnx->prepare($sql);
        $sql->bindValue(1,$cur_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    /* obtener lo curso que tiene estado 1 */
    public function get_curso(){
        $conn=parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_curso WHERE cur_estado=1";
        $sql=$conn->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

/* SELECCIONAMOS LOS CURSOS POR ID */
public function gte_curso_id($cur_id){
    $conn=parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM tm_curso WHERE cur_estado=1 AND cur_id=?";
    $sql=$conn->prepare($sql);
    $sql->bindvalue(1,$cur_id);
    $sql->execute();
    return  $resultado=$sql->fetchAll();


}

}

?>  