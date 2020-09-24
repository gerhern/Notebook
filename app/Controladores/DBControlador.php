<?php

namespace App\Controladores;
use Illuminate\Database\Capsule\Manager as Capsule;

class DBControlador{
  protected $capsule;

  protected function iniciarDB(){
    $this->capsule = new Capsule;
    $this->capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'notebook',
      'username'  => 'root',
      'password'  => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ]);

    $this->capsule->setAsGlobal();
    $this->capsule->bootEloquent();

  }// fin de iniciar DB
  
}//fin de DBControlador
