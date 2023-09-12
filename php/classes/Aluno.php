<?php
class Aluno
{
    private $NomeAluno;
    private $Idade;
    private $NomeEscola;
    private $Sexo;

    public function getNomeAluno() {
		return $this->NomeAluno;
	}

    public function getIdade() {
		return $this->Idade;
	}

    public function getNomeEscola() {
		return $this->getNomeEscola;
	}

    public function getSexo() {
		return $this->Sexo;
	}

    public function setNomeAluno($NomeAluno)
    {
		$this->NomeAluno = $NomeAluno;
    }	

    public function setIdade($Idade)
    {
		$this->Idade = $Idade;
    }	

    public function setNomeEscola($NomeEscola)
    {
		$this->NomeEscola = $NomeEscola;
    }	

    public function setSexo($Sexo)
    {
		$this->Sexo = $Sexo;
    }	

}
?>