<?php

namespace App\Controladores;
use App\Modelos\{Materia, Apunte};

class BuscarControlador extends DBControlador{

  public function __construct(){
    //inicia la coneccion de la db desde la clase bdcontrolador
    $this->iniciarDB();
  }//fin constructor

  public function getLibretasAll(){
    return Materia::all();
  }//fin get all libretas

  public function getCount(){
    return Materia::count();
  }//fin get count $nLibretas

  public function getLibreta($id){
    return Materia::where('id_materia',$id)->first();
  }//fin de getLibreta

  public function getApuntesAll($id){
    return Apunte::where('id_materia',$id)->get();
  }
}//fin clase buscar controlodaor
