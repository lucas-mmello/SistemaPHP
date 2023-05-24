<?php

class BancoDeDados{
  private $host;
  private $usuario;
  private $senha;
  private $banco;
  private $conexao;

  public function __construct($host = 'localhost',
  $usuario = 'root', $senha = '', $banco = 'aedb_quinto')
  {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $this->host = $host;
    $this->usuario = $usuario;
    $this->senha = $senha;
    $this->banco = $banco;
  }
  public function conectar(){
    $this->conexao = mysqli_connect($this->host, $this->usuario, $this->senha) or die('Erro na conexão');
  }
}