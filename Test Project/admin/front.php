<?php
require_once("../site/bootstrap.php");
$user = \Model\User\Repository::getLoggedUser();
if (!$user) {
    header("Location: login.php");
}
$className = ucfirst($_GET['controller'])."Controller";
require_once "controllers/".$className.".php";
$controller = new $className();
$action = $_GET['action']."Action";
include "_partials/header.php";
$controller->$action();
include "views/".$_GET['controller']."/".$_GET['action'].".phtml";
include "_partials/footer.php";

