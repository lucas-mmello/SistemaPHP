<?php   
require_once('class.TratamentoDeInput.php');

class ValidacaoDeFormulario extends TratamentoDeInput
{
    const _MAXNOME = 10;
    const _MINNOME = 5;
    const _MINSENHA = 5;
    const _MAXEMAIL = 300;

    public function validarNome($nome) 
    {
        if(!parent::caracterInvalido($nome))
        {
            if(strlen($nome) > self::_MAXNOME) return "não";
            if(strlen($nome) < self::_MINNOME) return "não";
        }
        
        return "ok";
    }
     public function ValidarSenha($senha)
    {
        if(!parent::caracterInvalido($senha))
        {
            if(strlen($senha) < self::_MINSENHA) return "não";
        }
        
        return "ok";
    } 
    public function ValidarEmail($email)
    {
        if(!parent::caracterInvalido($email))
        {
            if(strlen($email) < self::_MAXEMAIL) return "não";
            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) return "não";
        }
        
        return "ok";
    } 
}
