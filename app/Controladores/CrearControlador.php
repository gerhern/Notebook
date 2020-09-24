<?php

namespace App\Controladores;
use App\Modelos\{Materia};

class CrearControlador extends DBControlador{

  public function __construct(){
    //inicia la coneccion de la db desde la clase bdcontrolador
    $this->iniciarDB();
  }//fin constructor

  public function crearLibreta($post){


    $libretanom = $post['nombreLibreta'];
    $libretaim= $post['imagenLibreta'];

    echo $libretanom;


  }


}//fin clase buscar controlodaor
