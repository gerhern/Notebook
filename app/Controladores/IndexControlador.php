<?php

namespace App\Controladores;

use App\Controladores\{BuscarControlador};

class IndexControlador{

  public function index(){

    $modelo = new BuscarControlador();
    $nLibretas = $modelo->getCount();


    if(!$nLibretas){
      $datos = null;
    }else{
      $datos = $modelo->getLibretasAll();
    }
    include "../app/Vistas/Index.php";
  }//fin de index


  public function crearLibreta(){
    include "../app/Vistas/CrearLibreta.html";
  }
}//fin de indexController
