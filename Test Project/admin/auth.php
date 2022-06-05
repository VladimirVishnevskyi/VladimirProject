<?php
require_once("../site/bootstrap.php");
$user = \Model\User\Repository::getByLogin($_POST['login']);

$salt = "salt";
if ($_GET['token'])
    setcookie("token", dsdsds, time() + 3600, "/");

if (!$_POST["g-recaptcha-response"]) {
    exit("Произошла ошибка");
} else {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $key = "6LcHU7cbAAAAAKydffB2K6iQGtEsLO2qMtLYO4MV";
    $query = array(
        "secret" => $key,
        "response" => $_POST["g-recaptcha-response"],
        "remoteip" => $_SERVER['REMOTE_ADDR']
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $data = json_decode(curl_exec($ch), $assoc = true);
    curl_close($ch);

    if (!$data['success']) {
        exit("ВЫ РОБОТ");
    } else {

        if ($user && sha1($_POST['password']) == $user->password) {
            $token = sha1($user->login . $user->password . $salt);
            setcookie("token", $token, time() + 3600000, "/");
            header("Location: index.php");
        } else {
            header("Location: login.php");
        }
    }
}