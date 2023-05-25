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

  public function AlterarAluno($idaluno, $nmaluno)
  {
    $this->executarConsulta('update aluno set nmAluno=' . $nmaluno . ' where idaluno=' . $idaluno);
  }

  public function ExcluirAluno($idaluno)
  {
    $this->executarConsulta('delete from aluno where idaluno=' . $idaluno);
  }

  public function IncluirAluno($nmaluno)
  {
    $this->executarConsulta('insert into aluno(nmAluno) values (' . $nmaluno . ')');
  }
}