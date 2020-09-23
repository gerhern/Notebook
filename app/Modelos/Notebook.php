<?php

namespace App\Modelos;

  class Notebook{

    public $materia;
    public $imagen;
    public $unidad;

    public function __construct($materia, $img){
      $this->materia = $materia;
      $this->img = $img;
    }

    public function imprimir(){
      echo $this->materia;
      echo $this->img;
    }



  }//fin clase notebook
