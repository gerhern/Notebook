<?php

/* Mapeo de la url que se ingresa en el navegador

1.-Controlador
2.-metodo
3.-parametro
/Controlador/Metodo/Parametro
*/

class Core {

   protected $controladorActual = "Inicio";
   protected $metodoActual = "index";
   protected $parametros = [];

   public function __construct(){
      $url = $this->getUrl();

      //buscar en controladores si el controlador existe
      if(file_exists('../app/controladores/'.
         ucwords($url[0]).'.php')){
            //si existe hay que setearlo como controlador por defecto
            $this->controladorActual = ucwords($url[0]);

            //unset indice
            unset($url[0]);
         }
         //requerir el nuevo controlador
         require_once '../app/controladores/' . $this->controladorActual . '.php';
         $this->controladorActual = new $this->controladorActual;

         //checar la segunda parte de la url para setear el metodo
         if(isset($url[1])){
            if(method_exists($this->controladorActual, $url[1])){
               $this->metodoActual = $url[1];
               unset($url[1]);
            }
         }

         //obtener parametros
         $this->parametros = $url ? array_values($url) : [];

         //llamar callback con parametros
         call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
   }//constructor

   public function getUrl(){
      if(isset($_GET['url'])){
         $url = rtrim($_GET['url'], '/');
         $url = filter_var($url,
            FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
      }
   }//fin de get url
}//fin de class core
