<?php

require_once __DIR__ . '/../class/class.Login.php';


function revalidarLogin()
{
    $logar = new Login();
    $token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    session_name($token);
    session_start();


    if (!isset($_SESSION["login"]) || !isset($_SESSION["senha"]) || !isset($_SESSION["token"])) {
        session_destroy();
        header("location:index.php?erro=SEMLOGIN");
    }

    if ($_SESSION["token"] != $token) {
        session_destroy();
        header("location:index.php?erro=INVASAO");
    }

    if (!$logar->validarLogin($_SESSION["login"], $_SESSION["senha"])) {
        session_destroy();
        header("location:index.php?erro=LOGININVALIDO");
    }
}

