<?php
class Motorista
{
    private  $Cpf;
    private  $Nome;
    private  $Sexo;
    private  $Idade;
    private  $Telefone;
    private  $Turno;
    private  $Escolas;
    private  $Rota;

    public function set($Propriedade, $Valor)
    {
        $this->$Propriedade = $Valor;
    }
    public function get($Propriedade)
    {
        return $this->$Propriedade;
    }

}

class Responsavel 
{
    private string $Nome;
    private string $Cpf;
    private string $Sexo;
    private string $Telefone;
    private string $Cep;
    private string $Email;

    public function set($Propriedade, $Valor)
    {
        $this->$Propriedade = $Valor;
    }
    public function get($Propriedade)
    {
        return $this->$Propriedade;
    }

}

?>