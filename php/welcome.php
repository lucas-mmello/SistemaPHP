<?php
require_once("funçao.php");
unset($_SESSION["login"]);
unset($_SESSION["senha"]);
unset($_SESSION["token"]);
$_SESSION = array();
session_start();



$token = md5($_SERVER["REMOTE_ADDR"] . $_SERVER['HTTP_USER_AGENT']);

session_name($token);
session_start();


if (!isset($_SESSION["login"]) || !isset($_SESSION["senha"]) || !isset($_SESSION["token"])){
    session_destroy();  
    header("location:index.php?erro=SEMLOGIN");
}

if (!isset($_SESSION["login"]) || !isset($_SESSION["senha"]) || isset($_SESSION["token"])){
    session_destroy();
    header("location:index.php?erro=SEMLOGIN");
}

if ($_SESSION["token"] != $token){
    session_destroy();
    header("location:index.php?errro=INVASAO");
}

Echo "Aqui";
?>