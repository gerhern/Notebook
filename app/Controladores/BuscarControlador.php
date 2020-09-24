<?php

namespace App\Controladores;
use App\Modelos\{Materia};

class BuscarControlador extends DBControlador{

  public function __construct(){
    //inicia la coneccion de la db desde la clase bdcontrolador
    $this->iniciarDB();
  }//fin constructor

  public function getLibretasAll(){
    return Materia::all();
  }

  public function getCount(){
    return Materia::count();
  }
}//fin clase buscar controlodaor
