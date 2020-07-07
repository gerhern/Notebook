<?php

class Inicio extends Controlador{

   public function __construct(){
      // ejemplo de modelo
      // $this->nuevoModelo = $this->modelo('nombreModelo');
   }

   public function index(){

      $this->vista('/Home/home');
   }
}
