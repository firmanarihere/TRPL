<?php
  require_once('library/Router.php');

  session_start();
  $router       = new Router();
  $config       = array('router'=>$router);
  $controller   = null;
  $function     = null;
  if(!isset($_GET['c'])){
    include_once('controllers/FrontController.php');
    $controller = new FrontController($config);
    $controller->index();
  }else{
    $controllerName = $_GET['c'];
    $functionName   = $_GET['f'];
    include_once('controllers/'.$controllerName.'.php');
    $controller     = new $controllerName($config);
    $controller->$functionName();
  }



?>
