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

  public function alterarDisciplina($iddisciplina, $dsdisciplina)
  {
    $this->executarConsulta('update disciplina set dsdisciplina=' . $dsdisciplina . ' where idaluno=' . $iddisciplina);
  }

  public function ExcluirDisciplina($iddisciplina)
  {
    $this->executarConsulta('delete from disciplina where iddisciplina=' . $iddisciplina);
  }

  public function IncluirDisciplina($dsdisciplina)
  {
    $this->executarConsulta('insert into disciplina(dsdisciplina) values (' . $dsdisciplina . ')');
  }
}