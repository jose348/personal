<?php 


class Instructor extends Conectar {


    /* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
/* OBTENEMOS MIS INSTRUCTORES PARA LLANARLO EN MI MODAL DE MI MNT CURSO DEL BOTON +nuevo registro */
public function get_instrcutores(){
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

}
?>