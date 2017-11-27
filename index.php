<?php 
  define('YO', "HA");
  include('controller/BaseController.php');
  
  session_start();

  if(!isset($_SESSION['loginedUser'])) {
    $_SESSION['loginedUser'] = null;
  }
  if(!isset($_SESSION['loginedUserDetail'])) {
    $_SESSION['loginedUserDetail'] = null;
  }

  function dd($var) {
    var_dump($var);
    die();
  }

  // dd($_GET);
  $controller = isset($_GET['c']) ? $_GET['c'] : 'home';
  $method = isset($_GET['m']) ? $_GET['m'] : 'index';
  
  if($controller) {
    $controllerName =  ucfirst($controller) . 'Controller';
    include("controller/$controllerName.php");
    $controller = new $controllerName();
  }
  if(!$controller){
    header('location:index.php?c=home');
  }else{
    call_user_func([$controller, $method]);
  }

?>