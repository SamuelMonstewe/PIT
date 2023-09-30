<?php


class Van {
	private $cpfMotoristaDaVan;
    private $Chassi;
    private $Placa;
    private $Marca;
    private $Modelo;
    private $Quantlugar;
    private $LaudoInspecaoVeicular;
    private $FotoInterna;
    private $FotoExterna;
  

	public function getCpfMotoristaDaVan(){
		return $this->cpfMotoristaDaVan;
	}
	public function setCpfMotoristaDaVan($cpfMotoristaDaVan){
		return $this->cpfMotoristaDaVan = $cpfMotoristaDaVan;
	}

	public function getChassi() {
		return $this->Chassi;
	}
	
	
	public function setChassi($Chassi) {
		$this->Chassi = $Chassi;
		
	}
	
	
	public function getPlaca() {
		return $this->Placa;
	}
	
	
	public function setPlaca($Placa) {
		$this->Placa = $Placa;
	
	}
	
	
	public function getMarca() {
		return $this->Marca;
	}
	

	public function setMarca($Marca) {
		$this->Marca = $Marca;
		
	}
	
	
	public function getModelo() {
		return $this->Modelo;
	}
	

	public function setModelo($Modelo) {
		$this->Modelo = $Modelo;
		
	}
	
	
	public function getQuantlugar() {
		return $this->Quantlugar;
	}
	

	public function setQuantlugar($Quantlugar) {
		$this->Quantlugar = $Quantlugar;
	
	}
	
	
	public function getLaudoInspecaoVeicular() {
		return $this->LaudoInspecaoVeicular;
	}
	
	
	public function setLaudoInspecaoVeicular($LaudoInspecaoVeicular) {
		$this->LaudoInspecaoVeicular = $LaudoInspecaoVeicular;
		
	}
	

	public function getFotoInterna() {
		return $this->FotoInterna;
	}
	

	public function setFotoInterna($FotoInterna) {
		$this->FotoInterna = $FotoInterna;
		
	}

	public function getFotoExterna() {
		return $this->FotoExterna;
	}
	
	
	public function setFotoExterna($FotoExterna) {
		$this->FotoExterna = $FotoExterna;
		
	}
}