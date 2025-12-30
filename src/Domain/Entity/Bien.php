<?php

namespace App\Domain\Entity;

class Bien extends AbstractEntity{
	//Llaves foraneas
    protected $documento_id;

	//Atributos
    protected $cantidad;
    protected $naturaleza;
    protected $descripcion;
    protected $identificacion_numero;
    protected $marca;
    protected $modelo;
	protected $serie;

	public function getDocumentoId(){
		return $this->documento_id;
	}
	
	public function setDocumentoId($documento_id){
		$this->documento_id = $documento_id;
		return $this;	
	}
		
	public function getCantidad(){
		return $this->cantidad;
	}
	
	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
		return $this;	
	}

	public function getNaturaleza(){
		return $this->naturaleza;
	}
	
	public function setNaturaleza($naturaleza){
		$this->naturaleza = $naturaleza;
		return $this;	
	}	

	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
		return $this;	
	}

	public function getIdentificacionNumero(){
		return $this->identificacion_numero;
	}
	
	public function setIdentificacionNumero($identificacion_numero){
		$this->identificacion_numero = $identificacion_numero;
		return $this;	
	}	

	
	public function getMarca(){
		return $this->documento_id;
	}
	
	public function setMarca($documento_id){
		$this->documento_id = $documento_id;
		return $this;	
	}


	public function getModelo(){
		return $this->documento_id;
	}
	
	public function setModelo($documento_id){
		$this->documento_id = $documento_id;
		return $this;	
	}
	
		
	public function getSerie(){
		return $this->documento_id;
	}
	
	public function setSerie($documento_id){
		$this->documento_id = $documento_id;
		return $this;	
	}

}
