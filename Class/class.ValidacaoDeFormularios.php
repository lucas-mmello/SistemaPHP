<?php   
require_once('class.TratamentoDeInput.php');

class ValidacaoDeFormulario extends TratamentoDeInput
{
    const _MAXNOME = 20;
    const _MINNOME = 10;

    public function ValidarNome($nome) 
    {
        if(!parent::caracterInvalido($nome))
        {
            if(strlen($nome) > self::_MAXNOME) return false;
            if(strlen($nome) > self::_MINNOME) return false;
        }
        
        return true;
    }
    /* public function ValidarSenha($senha)
    {

    } */
}
$validar = new ValidacaoDeFormulario();
var_dump($validar->ValidarNome("Joao"));