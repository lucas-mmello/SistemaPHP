<?php
require_once('class.BancoDeDados.php');
class Aluno extends BancoDeDados{
  
  public function listarAlunos()
  {
    $arrayAluno = $this->retornaArray('select * from aluno');
    return $arrayAluno;
  }

  public function listarAluno($idaluno)
  {
    $arrayAluno = $this->retornaArray('select * from aluno where idaluno=' . $idaluno);
    return $arrayAluno;
  }

  public function alterarAluno($idaluno, $nmaluno)
  {
    $this->executarConsulta('update aluno set nmAluno="' . $nmaluno . '" where idaluno=' . $idaluno);
  }

  public function excluirAluno($idaluno)
  {
    try 
    {
      $this->executarConsulta('delete from aluno where idaluno=' . $idaluno);
    } catch (Exception $e) {
      echo '<script>alert("Aluno não excluído, uma vez que já possui notas lançadas.");</script>';
    }
  }

  public function incluirAluno($nmaluno)
  {
    $this->executarConsulta('insert into aluno(nmAluno) values ("' . $nmaluno . '")');
  }
}