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
            /*TODO: Cadena de Conexion QA*/
            $conectar =$this->dbh=new PDO("pgsql:host=$host; dbname=$dbname",$username,$password);

            /*TODO: Cadena de Conexion Produccion*/
				//$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_diplomas","diploma1","@ndercode");
            
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

     //QA
    return "http://localhost/personal/";

            //TODO Produccion
            //return "http://diplomas.anderson-bastidas.com/"; 

}

}
    
?>