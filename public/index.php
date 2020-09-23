<?php

ini_set('display_errors',1);
ini_set('display_startup_error',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

$ruta = $_GET['ruta'] ?? '/';

if($ruta == '/'){
  require '../index.php';
}else if ($ruta == '/notebook'){
  require '../app/Modelos/CrearLibreta.php';
}
