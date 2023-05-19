<?php   
require_once('class.TratamentoDeInput.php');

class ValidacaoDeFormulario extends TratamentoDeInput
{
    const _MAXNOME = 10;
    const _MINSENHA = 5;

    public function validarNome($nome) 
    {
        if(!parent::caracterInvalido($nome))
        {
            if(strlen($nome) > self::_MAXNOME) return false;
        }
        
        return true;
    }
     public function ValidarSenha($senha)
    {
        if(!parent::caracterInvalido($senha))
        {
            if(strlen($senha) < self::_MINSENHA) return false;
        }
        
        return true;
    } 
}
