<?php

class aluno
{
  private $CpfResponsavel;
  private $NomeAluno;
  private $Idade;
  private $RegiaoOndeMora;
  private $NomeEscola;
  private $Sexo;

  public function getCpfResponsavel() {
	return $this->CpfResponsavel;
}

  public function getNomeAluno() {
		return $this->NomeAluno;
	}

  public function getIdade() {
		return $this->Idade;
	}

	public function getRegiaoOndeMora() {
		return $this->RegiaoOndeMora;
	}

  public function getNomeEscola() {
		return $this->NomeEscola;
	}

  public function getSexo() {
		return $this->Sexo;
	}

	public function setCpfResponsavel($CpfResponsavel) {
		$this->CpfResponsavel = $CpfResponsavel;
	}

	public function setNomeAluno($NomeAluno) {
		$this->NomeAluno = $NomeAluno;
	}

  public function setIdade($Idade) {
		$this->Idade = $Idade;
	}

	public function setRegiaoOndeMora($RegiaoOndeMora) {
		$this->RegiaoOndeMora = $RegiaoOndeMora;
	}

  public function setNomeEscola($NomeEscola) {
		$this->NomeEscola = $NomeEscola;
	}

  public function setSexo($Sexo) {
		$this->Sexo = $Sexo;
	}

}
?>