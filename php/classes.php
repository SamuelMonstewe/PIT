<?php
class Motorista
{
    private string $Cpf;
    private string $Nome;
    private string $Sexo;
    private int $Idade;
    private string $Telefone;
    private string $Turno;
    private string $Escolas;
    private string $Rota;

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