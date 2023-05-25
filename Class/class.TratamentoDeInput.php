<?php
class TratamentoDeInput
{
   private $caracteresIndesejaveis = array('"','"','<','>','--');
        
    public function caracterInvalido($informacao)
    {
       foreach ($this-> caracteresIndesejaveis as $item)
        {
            if(str_contains($informacao, $item))
                {
                    return true;
                }
        }
        return false;
        }
}

class ValidarSenha extends TratamentoDeInput
{
    public function validarSenha($valor)
    {
        if(!parent::caracterInvalido($valor))
        {
            echo "Estou no metodo Herdado da classe pai <br />";
        }
        return true;
    }
}

