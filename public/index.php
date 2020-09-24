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

$map->get('index', RUTA_URL, [
  'controlador'=>'App\Controladores\IndexControlador',
  'accion' => 'index'
]);

$map->get('crear',RUTA_URL."crearlibreta",[
  'controlador'=>'App\Controladores\IndexControlador',
  'accion' => 'crearLibreta'
]);

$map->post('crearP',RUTA_URL."crearlibreta",[
  'controlador'=>'App\Controladores\CrearControlador',
  'accion' => 'crearLibreta'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if(!$route){
  echo 'No hay ruta <br>';
}else{
  $handler = $route->handler;
  $controladorNombre = $handler['controlador'];
  $accion = $handler['accion'];

  $contolador = new $controladorNombre;
  $contolador->$accion();
}
