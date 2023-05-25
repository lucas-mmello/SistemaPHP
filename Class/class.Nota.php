<?php

require_once('class.BancoDeDados.php');
class Nota extends BancoDeDados{
  
  public function listarAvaliacoes()
  {
    $arrayNota = $this->retornaArray('select * FROM avaliacao av LEFT OUTER JOIN aluno a ON av.idaluno = a.idaluno LEFT OUTER JOIN disciplina d ON av.iddisciplina = d.iddisciplina');
    return $arrayNota;
  }

  public function listarAvaliacao($idavaliacao)
  {
    $arrayNota = $this->retornaArray('select * FROM avaliacao av LEFT JOIN aluno al ON av.idaluno = al.idaluno WHERE av.idavaliacao=' . $idavaliacao);
    return $arrayNota;
  }

  public function alterarNota($idavaliacao, $nota)
  {
    $this->executarConsulta('update avaliacao set nota =' . $nota . ' where idavaliacao=' . $idavaliacao);
  }

  public function excluirNota($idavaliacao)
  {
    $this->executarConsulta('delete from avaliacao where idavaliacao=' . $idavaliacao);
  }

  public function incluirNota($nota, $idaluno, $iddisciplina)
  {
    $this->executarConsulta('insert into avaliacao(nota,idaluno,iddisciplina) values (' . $nota .', ' . $idaluno .', ' . $iddisciplina . ')');
  }
}