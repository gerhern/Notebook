<?php

namespace App\Controladores;

use App\Controladores\{BuscarControlador, CrearControlador};

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


  public function nuevaLibreta($request){

    $crearController = new CrearControlador();

    if($request->getMethod()=='POST'){
      $crearController->crearLibreta($request);
    }
    include "../app/Vistas/CrearLibreta.php";
  }//fin de nueva $nLibretas

  public function consultarLibreta($id){

    $materia = new BuscarControlador();
    $datos = $materia->getApuntesAll($id);
    $libreta = $materia->getLibreta($id);
    $nlibretas = $materia->getLibretasAll();
    include "../app/Vistas/Libreta.php";
  }//fin de consultar libreta

  public function nuevoApunte($id){
    $materia = new BuscarControlador();
    $datos = $materia->getLibreta($id);
    include "../app/Vistas/NuevoApunte.php";
  }
}//fin de indexController
