<?php
    
   /*  Iniciamos la session del usuario   */
    session_start();


    /* CONECTANDONOS A LA BASE DE DATOS*/
class Conectar{

    /** Funcion protegidad de la cadena de conexion */
    protected $dbh;
    protected function Conexion(){
        $host="localhost";
        $dbname="certificado";
        $username="postgres";
        $password= "postgres";
        try{
            /**
             * CADEMA DE CONEXION 
             */
            $conectar =$this->dbh=new PDO("pgsql:host=$host; dbname=$dbname",$username,$password);
            //$conectar=pg_connect("host=$host dbname=$dbname user=$username password=$password");
            
            return $conectar;
        }catch(Exception $e){
            print "no se conecto a la  BD ". $e->getMessage() ."</br>";
            die();
    }
    //return ($conectar);
 }

 /**para evitar problemas  de sintaxis con la Ñ  */
 public function set_names(){
   return $this->dbh -> query("SET NAMES 'utf8'");
 }

 //** ruta principal del Proyecto */

 public static function ruta(){
    return "http://localhost/personal/";
 }

}
    
?>