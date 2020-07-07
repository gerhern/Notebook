<?php

class Controlador{

   public function modelo($modelo){
      //cargamos el modelo
      require_once '../app/modelos/' .$modelo .'.php';
      //instanciar modelo
      return new $modelo;
   }//modeleo

   public function vista($vista, $datos = []){
      //checar si existe la vista
      if(file_exists('../app/vistas/' . $vista . '.php')){
         require_once '../app/vistas/' .$vista . '.php';
      }else{
         //si a vista no existe
         die('La vista no existe');
      }
   }//vista

}//class controladdor
