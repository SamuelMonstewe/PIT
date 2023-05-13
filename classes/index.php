<?php
class Motorista
{
    private string $Cpf;
    private string $Nome;
    private string $Sexo;
    private int $Idade;
    private string $Telefone;
    private string $Endereco;
    private string $Turno;
    private string $Escolas;

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