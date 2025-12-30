<?php
// src/Domain/Entity/ConstanciaSalida.php

namespace App\Domain\Entity;

class ConstanciaSalida extends AbstractEntity
{
    protected $documentoId;
    protected $areaSalida;
    protected $propositoSalida;
    protected $observacionesEstado;
    protected $sujetoDevolucion;
    protected $fechaDevolucion;
    protected $responsableControlBienes;
    protected $responsableSolicitante;
    protected $responsableVigilancia;

    public function getDocumentoId() {
        return $this->documentoId;
    }

    public function setDocumentoId($documentoId) {
        $this->documentoId = $documentoId;
        return $this;
    }

    public function getAreaSalida() {
        return $this->areaSalida;
    }

    public function setAreaSalida($areaSalida) {
        $this->areaSalida = $areaSalida;
        return $this;
    }

    public function getPropositoSalida() {
        return $this->propositoSalida;
    }

    public function setPropositoSalida($propositoSalida) {
        $this->propositoSalida = $propositoSalida;
        return $this;
    }

    public function getObservacionesEstado() {
        return $this->observacionesEstado;
    }

    public function setObservacionesEstado($observacionesEstado) {
        $this->observacionesEstado = $observacionesEstado;
        return $this;
    }

    public function getSujetoDevolucion() {
        return $this->sujetoDevolucion;
    }

    public function setSujetoDevolucion($sujetoDevolucion) {
        $this->sujetoDevolucion = $sujetoDevolucion;
        return $this;
    }

    public function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    public function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
        return $this;
    }

    public function getResponsableControlBienes() {
        return $this->responsableControlBienes;
    }

    public function setResponsableControlBienes($responsableControlBienes) {
        $this->responsableControlBienes = $responsableControlBienes;
        return $this;
    }

    public function getResponsableSolicitante() {
        return $this->responsableSolicitante;
    }

    public function setResponsableSolicitante($responsableSolicitante) {
        $this->responsableSolicitante = $responsableSolicitante;
        return $this;
    }

    public function getResponsableVigilancia() {
        return $this->responsableVigilancia;
    }

    public function setResponsableVigilancia($responsableVigilancia) {
        $this->responsableVigilancia = $responsableVigilancia;
        return $this;
    }
}

