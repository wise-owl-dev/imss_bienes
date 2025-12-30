<?php
// src/Domain/Entity/FormatoResguardo.php

namespace App\Domain\Entity;

class FormatoResguardo extends AbstractEntity
{
    protected $documentoId;
    protected $dependencia;
    protected $cargo;
    protected $direccion;
    protected $telefonoUnidad;
    protected $nombreEntrega;
    protected $cargoEntrega;
    protected $nombreRecibe;

    public function getDocumentoId() {
        return $this->documentoId;
    }

    public function setDocumentoId($documentoId) {
        $this->documentoId = $documentoId;
        return $this;
    }

    public function getDependencia() {
        return $this->dependencia;
    }

    public function setDependencia($dependencia) {
        $this->dependencia = $dependencia;
        return $this;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
        return $this;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
        return $this;
    }

    public function getTelefonoUnidad() {
        return $this->telefonoUnidad;
    }

    public function setTelefonoUnidad($telefonoUnidad) {
        $this->telefonoUnidad = $telefonoUnidad;
        return $this;
    }

    public function getNombreEntrega() {
        return $this->nombreEntrega;
    }

    public function setNombreEntrega($nombreEntrega) {
        $this->nombreEntrega = $nombreEntrega;
        return $this;
    }

    public function getCargoEntrega() {
        return $this->cargoEntrega;
    }

    public function setCargoEntrega($cargoEntrega) {
        $this->cargoEntrega = $cargoEntrega;
        return $this;
    }

    public function getNombreRecibe() {
        return $this->nombreRecibe;
    }

    public function setNombreRecibe($nombreRecibe) {
        $this->nombreRecibe = $nombreRecibe;
        return $this;
    }
}

