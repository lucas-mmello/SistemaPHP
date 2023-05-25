<?php

require_once('class.BancoDeDados.php');
class Disciplina extends BancoDeDados{
  
  public function ListarDisciplinas()
  {
    $arrayDisciplina = $this->retornaArray('select * from disciplina');
    return $arrayDisciplina;
  }

  public function ListarDisciplina($iddisciplina)
  {
    $arrayDisciplina = $this->retornaArray('select * from disciplina where iddisciplina=' . $iddisciplina);
    return $arrayDisciplina;
  }
}