<?php

namespace App\Controladores;
use App\Modelos\{Materia, Apunte};

class CrearControlador extends DBControlador{

  public function __construct(){
    //inicia la coneccion de la db desde la clase bdcontrolador
    $this->iniciarDB();
  }//fin constructor

  public function crearLibreta($post){
    //instanciamos el modelo de la tabla materia
    $materia = new Materia();
    //separamos los datos del post en tipo JSON
    $datos = $post->getparsedBody();

    //ahora manupular la imagen subida
    //obtenemos el archivo subido
    $archivo  = $post->getUploadedFiles();
    $imagen = $archivo['imagenLibreta'];

     //Generamos un nuevo nombre para el archivo
    $nombreImg = $this->generarNombre($imagen->getClientFilename(), $datos['nombreLibreta']);

     //mevemos el archivo a la carpeta que queremos
    $imagen->moveTo("img/$nombreImg");

    //Guardamos en la base de datos
    $materia->nombre_materia = $datos['nombreLibreta'];
    $materia->img_materia = $nombreImg;
    $materia->save();

    header(sprintf('%s: %s', 'location', '/notebook/'), false);
  }//fin de crear libreta

  public function generarNombre($nombreImagen, $nuevoNombre){
    //agregaremos el nombre al archivo
     $nombreImagen = explode('.', $nombreImagen);
     return $nuevoNombre . '.'. $nombreImagen[1];
   }//fin de generar nombres

   public function crearApunte($post){
     $materia = new Materia();
     $apunte = new Apunte();
     $datos = $post->getparsedBody();
     //separamos los datos del post en tipo JSON

     $apunte->tema_apunte = $datos['titulo'];
     $apunte->fecha_apunte = $datos['fecha'];
     $apunte->texto_apunte = $datos['texto'];
     $apunte->unidad_apunte = $datos['unidad'];
     $apunte->id_materia = $datos['id'];

     $apunte->save();

     header(sprintf('%s: %s', 'location', '/notebook/verLibreta/'. $datos['id']), false);
   }


}//fin clase buscar controlodaor
