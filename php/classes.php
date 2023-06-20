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

class Usuario {
    
    private $Usuario;
    private $Email;
    private $Senha;
    
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

class DadosVan {
    private $Chassi;
    private $Placa;
    private $Marca;
    private $Modelo;
    private $Quantlugar;
    private $MotoristaFk;
    private $LaudoInspecaoVeicular;
    private $FotoInterna;
    private $FotoExterna;
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