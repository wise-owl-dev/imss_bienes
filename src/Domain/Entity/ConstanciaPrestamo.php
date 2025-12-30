<?php
// src/Domain/Entity/ConstanciaPrestamo.php

namespace App\Domain\Entity;

class ConstanciaPrestamo extends AbstractEntity
{
    protected $documentoId;
    protected $departamento;
    protected $estadoFisico;
    protected $plazoDias;
    protected $fechaLimiteDevolucion;
    protected $responsableEntrega;
    protected $matriculaEntrega;
    protected $responsableRecibe;
    protected $matriculaRecibe;

    public function getDocumentoId() {
        return $this->documentoId;
    }

    public function setDocumentoId($documentoId) {
        $this->documentoId = $documentoId;
        return $this;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
        return $this;
    }

    public function getEstadoFisico() {
        return $this->estadoFisico;
    }

    public function setEstadoFisico($estadoFisico) {
        $this->estadoFisico = $estadoFisico;
        return $this;
    }

    public function getPlazoDias() {
        return $this->plazoDias;
    }

    public function setPlazoDias($plazoDias) {
        $this->plazoDias = $plazoDias;
        return $this;
    }

    public function getFechaLimiteDevolucion() {
        return $this->fechaLimiteDevolucion;
    }

    public function setFechaLimiteDevolucion($fechaLimiteDevolucion) {
        $this->fechaLimiteDevolucion = $fechaLimiteDevolucion;
        return $this;
    }

    public function getResponsableEntrega() {
        return $this->responsableEntrega;
    }

    public function setResponsableEntrega($responsableEntrega) {
        $this->responsableEntrega = $responsableEntrega;
        return $this;
    }

    public function getMatriculaEntrega() {
        return $this->matriculaEntrega;
    }

    public function setMatriculaEntrega($matriculaEntrega) {
        $this->matriculaEntrega = $matriculaEntrega;
        return $this;
    }

    public function getResponsableRecibe() {
        return $this->responsableRecibe;
    }

    public function setResponsableRecibe($responsableRecibe) {
        $this->responsableRecibe = $responsableRecibe;
        return $this;
    }

    public function getMatriculaRecibe() {
        return $this->matriculaRecibe;
    }

    public function setMatriculaRecibe($matriculaRecibe) {
        $this->matriculaRecibe = $matriculaRecibe;
        return $this;
    }
}

