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
    private $fotoMotorista;
    private $fotoCarteira;
    private $fotoCRLV;

    public function set($Propriedade, $Valor)
    {
        $this->$Propriedade = $Valor;
    }
    public function get($Propriedade)
    {
        return $this->$Propriedade;
    }

}

class Escola {
    private $id;
    private $nome;
    public function set($Propriedade, $Valor)
    {
        $this->$Propriedade = $Valor;
    }
    public function get($Propriedade)
    {
        return $this->$Propriedade;
    }
}

class Responsavel {

    private  $Nome;
    private  $Cpf;
    private  $Sexo;
    private  $Telefone;
    private  $Cep;
    private  $Email;

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