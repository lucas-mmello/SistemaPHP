<?php
require_once('class.BancoDeDados.php');
class Aluno extends BancoDeDados{
  
  public function ListarAlunos()
  {
    $arrayAluno = $this->retornaArray('select * from aluno');
    return $arrayAluno;
  }

  public function ListarAluno($idaluno)
  {
    $arrayAluno = $this->retornaArray('select * from aluno where idaluno=' . $idaluno);
    return $arrayAluno;
  }
}