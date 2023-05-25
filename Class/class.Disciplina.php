<?php

require_once('class.BancoDeDados.php');
class Disciplina extends BancoDeDados{
  
  public function listarDisciplinas()
  {
    $arrayDisciplina = $this->retornaArray('select * from disciplina');
    return $arrayDisciplina;
  }

  public function listarDisciplina($iddisciplina)
  {
    $arrayDisciplina = $this->retornaArray('select * from disciplina where iddisciplina=' . $iddisciplina);
    return $arrayDisciplina;
  }

  public function alterarDisciplina($iddisciplina, $dsdisciplina)
  {
    $this->executarConsulta('update disciplina set dsdisciplina="' . $dsdisciplina . '" where idaluno=' . $iddisciplina);
  }

  public function excluirDisciplina($iddisciplina)
  {
    $this->executarConsulta('delete from disciplina where iddisciplina=' . $iddisciplina);
  }

  public function incluirDisciplina($dsdisciplina)
  {
    $this->executarConsulta('insert into disciplina(dsdisciplina) values ("' . $dsdisciplina . '")');
  }
}