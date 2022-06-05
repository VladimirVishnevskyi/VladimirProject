<?php
session_start();
setcookie("token", $token, time()-1 ,"/");
header('Location: login.php');

?>

