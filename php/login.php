<?php

if(!isset($_POST['dslogin']) || !isset($_POST['dssenha'])){
  header('location:../index.php');
}

require_once('../class/class.ValidacaoDeFormularios.php');
require_once('../class/class.Login.php');
$logar = new Login();
$valida = new ValidacaoDeFormulario;

if($valida->validarNome($_POST['dslogin']) == 'ok'){
  $login = $_POST['dslogin'];
}
else{
  header('location:../index.php?erro' . $valida->validarNome($_POST['dslogin']));
}

if($valida->ValidarSenha($_POST['dssenha']) == 'ok'){
  $senha = md5($_POST['dssenha']);
}
else{
  header('location:../index.php?erro' . $valida->ValidarSenha($_POST['dssenha']));
}


if($logar->validarLogin($login, $senha))
{
    echo "<br /> login: $login,senha: $senha, ip: " . $_SERVER['REMOTE_ADDR'] .",browser: " . $_SERVER['HTTP_USER_AGENT'];
    $token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    session_name($token);

    session_start();
    
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    
    $_SESSION['token'] = $token;

    header("location:../welcomepage.php");
}
else
{
    header("location:../index.php?erro=NAOLOCALIZADO");
}

?>