<?php

//clase para conectar base de datos y ejecutar consultas por medio de PDO
class Base{
   private $host = DB_HOST;
   private $usuario = DB_USUARIO;
   private $password = DB_PASSWORD;
   private $nombreBase = DB_NOMBRE;

   private $dbh;
   private $stmt;
   private $error;

   public function __construct(){
      //configuracion de coneccion
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombreBase;
      $opciones = array(
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      //instanciamos el PDO
      try{
         $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
         $this->dbh->exec('set names utf8');
      }catch(PDOException $e){
         $this->error = $e->getMessage();
         echo $this->error;
      }
   }//construct

   public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
   }//query

   public function bind($parametro, $valor, $tipo = null){
      //se vincula la consulta
      if(is_null($tipo)){
         switch(true){

            case is_int($valor):
               $tipo = PDO::PARAM_INT;
            break;

            case is_bool($valor):
               $tipo = PDO::PARAM_BOOL;
            break;

            case is_null($valor):
               $tipo = PDO::PARAM_NULL;
            break;

            default:
               $tipo = PDO::PARAM_STR;
            break;
         }//switch
      }
      $this->stmt->bindValue($parametro, $valor, $tipo);
   }//bind

   public function execute(){
      //se ejecuta la consulta
      return $this->stmt->execute();
   }//execute

   public function registros(){
      //retorna VARIOS REGISTROS un array de objetos
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
   }//registros

   public function registro(){
      //retorna UN REGISTROS
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
   }//registros

   public function rowCount(){
      //retorna el numero de registros
      return $this->stmt->rowCount();
   }
}//class base
