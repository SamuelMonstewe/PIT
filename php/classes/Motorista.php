<?php

class Motorista
{
    private  $Cpf;
    private  $Nome;
    private  $Sexo;
    private  $Idade;
    private  $Telefone;
    private  $TurnoManha;
    private  $TurnoTarde;
    private  $TurnoNoite;
    private  $Escolas;
    private  $RegiaoDeAtuacao;
    private $fotoMotorista;
    private $fotoCarteira;
    private $fotoCRLV;

	public function getCpf() {
		return $this->Cpf;
	}
	
	
	public function setCpf($Cpf) {
		$this->Cpf = $Cpf;
		return $this;
	}
	
	
	public function getNome() {
		return $this->Nome;
	}
	
	
	public function setNome($Nome) {
		$this->Nome = $Nome;
		return $this;
	}
	
	
	public function getSexo() {
		return $this->Sexo;
	}
	
	
	public function setSexo($Sexo) {
		$this->Sexo = $Sexo;
		return $this;
	}
	
	
	public function getIdade() {
		return $this->Idade;
	}
	
	
	public function setIdade($Idade) {
		$this->Idade = $Idade;
		return $this;
	}
	
	
	public function getTelefone() {
		return $this->Telefone;
	}
	

	public function setTelefone($Telefone) {
		$this->Telefone = $Telefone;
		return $this;
	}
	
	
	
	
	
	public function getEscolas() {
		return $this->Escolas;
	}
	
	
	public function setEscolas($Escolas) {
		$this->Escolas = $Escolas;
		return $this;
	}

	
	
	
	public function getFotoMotorista() {
		return $this->fotoMotorista;
	}
	
	
	public function setFotoMotorista($fotoMotorista) {
		$this->fotoMotorista = $fotoMotorista;
		return $this;
	}

	public function getFotoCarteira() {
		return $this->fotoCarteira;
	}
	
	
	public function setFotoCarteira($fotoCarteira) {
		$this->fotoCarteira = $fotoCarteira;
		return $this;
	}
	
	
	public function getFotoCRLV() {
		return $this->fotoCRLV;
	}
	
	
	public function setFotoCRLV($fotoCRLV) {
		$this->fotoCRLV = $fotoCRLV;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTurnoManha() {
		return $this->TurnoManha;
	}
	
	/**
	 * @param mixed $TurnoManha 
	 * @return self
	 */
	public function setTurnoManha($TurnoManha): self {
		$this->TurnoManha = $TurnoManha;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTurnoTarde() {
		return $this->TurnoTarde;
	}
	
	/**
	 * @param mixed $TurnoTarde 
	 * @return self
	 */
	public function setTurnoTarde($TurnoTarde): self {
		$this->TurnoTarde = $TurnoTarde;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTurnoNoite() {
		return $this->TurnoNoite;
	}
	
	/**
	 * @param mixed $TurnoNoite 
	 * @return self
	 */
	public function setTurnoNoite($TurnoNoite): self {
		$this->TurnoNoite = $TurnoNoite;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRegiaoDeAtuacao() {
		return $this->RegiaoDeAtuacao;
	}
	
	/**
	 * @param mixed $RegiaoDeAtuacao 
	 * @return self
	 */
	public function setRegiaoDeAtuacao($RegiaoDeAtuacao): self {
		$this->RegiaoDeAtuacao = $RegiaoDeAtuacao;
		return $this;
	}
}