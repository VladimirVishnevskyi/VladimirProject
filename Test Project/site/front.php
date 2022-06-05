<?php
require_once("bootstrap.php");


if (array_key_exists('controller',$_GET)===false){
    $controller = "index";
}else {
    $controller = $_GET['controller'];
}
$className = ucfirst($controller)."Controller";
require_once "controllers/".$className.".php";
$controllerObject = new $className();
if (array_key_exists('action',$_GET)===false){
    $action = "default";
}else {
    $action = $_GET['action'];
}
$callAction = $action."Action";
include "_partials/header.php";
$controllerObject->$callAction();
include "views/".$controller."/".$action.".phtml";
include "_partials/footer.php";

