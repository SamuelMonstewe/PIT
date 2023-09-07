<?php


class Usuario {
    private $NomeUsuario;
    private $Email;
    private $Senha;
    private $Chave;


	public function setNomeUsuario($NomeUsuario) {
		$this->NomeUsuario = $NomeUsuario;

	}
	
	
	public function setEmail($Email) {
		$this->Email = $Email;
		
	}
	
	public function setSenha($Senha) {
		$this->Senha = $Senha;
		
	}
	

	public function setChave($Chave) {
		$this->Chave = $Chave;
	
	}

	
	public function getNomeUsuario() {
		return $this->NomeUsuario;
	}
	
	
	public function getEmail() {
		return $this->Email;
	}
	
	
	public function getSenha() {
		return $this->Senha;
	}
	
	
	public function getChave() {
		return $this->Chave;
	}
}