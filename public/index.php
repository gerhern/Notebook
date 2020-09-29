<?php
use Aura\Router\RouterContainer;

ini_set('display_errors',1);
ini_set('display_startup_error',1);
error_reporting(E_ALL);

define('RUTA_URL', '/notebook/');
define('RAIZ', dirname(__DIR__));


require_once '../vendor/autoload.php';
// se usa la libreria de laminas diactoros para el manejo de las url
//de acuerdo con los estandares de psr-7
//el objeto request manejara todas las peticiones del servidor

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

//index
$map->get('index', RUTA_URL, [
  'controlador'=>'App\Controladores\IndexControlador',
  'accion' => 'index'
]);

//Crear
$map->get('nueva',RUTA_URL."nuevaLibreta",[
  'controlador'=>'App\Controladores\IndexControlador',
  'accion' => 'nuevaLibreta',
]);

$map->post('nuevaP',RUTA_URL."nuevaLibreta",[
  'controlador'=>'App\Controladores\CrearControlador',
  'accion' => 'crearLibreta',
]);

$map->get('+apunte', RUTA_URL."agregarApunte/{id}",[
  'controlador' =>'App\Controladores\IndexControlador',
  'accion' => 'nuevoApunte',
]);

$map->post('+apunteP', RUTA_URL."agregarApunte/{id}",[
  'controlador' =>'App\Controladores\CrearControlador',
  'accion' => 'crearApunte',
]);

//consultar
$map->get('libreta',RUTA_URL."verLibreta/{id}",[
  'controlador'=>'App\Controladores\IndexControlador',
  'accion' =>'consultarLibreta'
]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


if(!$route){
  echo 'No hay ruta <br>';
}else{
  $handler = $route->handler;
  $controladorNombre = $handler['controlador'];
  $accion = $handler['accion'];
  $controlador = new $controladorNombre;
  $dato = $route->attributes;
  if($dato!=null && $request->getMethod()=='GET'){
    $handler['id'] = $dato['id'];
    $controlador->$accion($dato);
  }else{
    $controlador->$accion($request);
  }
}
