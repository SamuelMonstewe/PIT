<?php

class Responsavel {

    private  $Nome;
    private  $Cpf;
    private  $Sexo;
    private  $Telefone;
    private  $Cep;
    private  $Email;

	public function getNome() {
		return $this->Nome;
	}
	
	
	public function setNome($Nome) {
		$this->Nome = $Nome;
		
	}
	
	
	public function getCpf() {
		return $this->Cpf;
	}
	
	
	public function setCpf($Cpf) {
		$this->Cpf = $Cpf;
		
	}
	
	
	public function getSexo() {
		return $this->Sexo;
	}
	

	public function setSexo($Sexo) {
		$this->Sexo = $Sexo;
		
	}
	
	
	public function getTelefone() {
		return $this->Telefone;
	}
	
	
	public function setTelefone($Telefone) {
		$this->Telefone = $Telefone;
		
	}

	public function getCep() {
		return $this->Cep;
	}
	
	
	public function setCep($Cep) {
		$this->Cep = $Cep;
	
	}
	
	
	public function getEmail() {
		return $this->Email;
	}
	
	
	public function setEmail($Email) {
		$this->Email = $Email;
		return $this;
	}
}