<?php

require_once('class.BancoDeDados.php');
class Login extends BancoDeDados{
  
  public function listarLogins()
  {
    $arrayLogin = $this->retornaArray('select * FROM login l left outer join aluno a on l.idaluno = a.idaluno');
    return $arrayLogin;
  }

  public function listarAlunosNaoRelacionados()
  {
    $arrayLogin = $this->retornaArray('select * from aluno a where a.idaluno not in (select l.idaluno from login l where l.idaluno = a.idaluno)');
    return $arrayLogin;
  }

  public function alterarAcesso($dslogin, $dssenha)
  {
    $this->executarConsulta('update login set dssenha ="' . $dssenha . '" where dslogin="' . $dslogin .'"');
  }

  public function excluirAcesso($dslogin)
  {
    $this->executarConsulta('delete from login where dslogin="' . $dslogin . '"');
  }

  public function incluirLogin($dslogin, $dssenha, $idaluno)
  {
    $this->executarConsulta('insert into login(dslogin,dssenha,idaluno) values ("' . $dslogin .'", "' . $dssenha .'", "' . $idaluno . '")');
  }
  public function validarLogin($login, $senha)
  {
    $arrayLogin = $this->executarConsulta('select * FROM login l WHERE l.dslogin ="' . $login .'" and l.dssenha ="' . $senha . '"');
    $resultado = mysqli_num_rows($arrayLogin);
    if ($resultado == 1) return true;
    return false;
  }
}