<?php



    class Categoria extends Conectar{
        

        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        public function get_categoria(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE cat_estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/


    }

?>