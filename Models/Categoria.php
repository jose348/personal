<?php
    class Categoria extends Conectar{
     

        /* INSERTAR CATEGORIA */
        /* INSERTAR CATEGORIA */
        /* INSERTAR CATEGORIA */
        /* INSERTAR CATEGORIA */
        public function insert_categoria($cat_nom,$cat_fech){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_categoria (cat_nom,cat_fech, cat_estado) 
                        VALUES (?,?,'1')";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_fech);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /* INSERTAR CATEGORIA */
        /* INSERTAR CATEGORIA */
        /* INSERTAR CATEGORIA */



        
/* ACTUALIZA CATEGORIA */
/* ACTUALIZA CATEGORIA */
/* ACTUALIZA CATEGORIA */
        public function update_categoria($cat_id, $cat_nom,$cat_fech){
            $conx = parent::conexion();
            $sql = "UPDATE tm_categoria
                    SET 
                    cat_nom=?,
                    cat_fech=?
                    WHERE 
                    cat_id=?";
            $sql = $conx->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_fech);
            
            $sql->bindValue(3, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchALL();
        }
/* ACTUALIZA CATEGORIA */
/* ACTUALIZA CATEGORIA */
/* ACTUALIZA CATEGORIA */




         /* ELIMINAMOS MI CATEGORIA POR ID*/
         /* ELIMINAMOS MI CATEGORIA POR ID*/
         /* ELIMINAMOS MI CATEGORIA POR ID*/       
        /* ELIMINAMOS  LAS CATEGORIAS POR ID*/
        public function delete_categoria($cat_id)
        {
            $cnx = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_categoria
              SET 
              cat_estado=0
              WHERE 
              cat_id=?"; 
            $sql = $cnx->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
         /* ELIMINAMOS MI CATEGORIA POR ID*/
         /* ELIMINAMOS MI CATEGORIA POR ID*/
         /* ELIMINAMOS MI CATEGORIA POR ID*/

        



        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* LISTAR TODAS LAS CATEGORIAS */
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





        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* LISTAR CATEGORIAS POR ID */
      /* Filtrar segun ID de categoria */
      public function get_categoria_id($cat_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_categoria WHERE cat_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/
        /* OBTENEMOS MIS CATEGORIAS PARA MI MODAL DE MANT CURSO del boton nuevo registro*/

    }

?>