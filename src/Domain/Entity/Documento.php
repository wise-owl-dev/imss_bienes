<?php
// src/Domain/Entity/Documento.php

namespace App\Domain\Entity;

class Documento extends AbstractEntity
{
    protected $trabajadorId;
    protected $tipoDocumento;
    protected $fechaDocumento;
    protected $folio;
    protected $lugarExpedicion;

    public function getTrabajadorId() {
        return $this->trabajadorId;
    }

    public function setTrabajadorId($trabajadorId) {
        $this->trabajadorId = $trabajadorId;
        return $this;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
        return $this;
    }

    public function getFechaDocumento() {
        return $this->fechaDocumento;
    }

    public function setFechaDocumento($fechaDocumento) {
        $this->fechaDocumento = $fechaDocumento;
        return $this;
    }

    public function getFolio() {
        return $this->folio;
    }

    public function setFolio($folio) {
        $this->folio = $folio;
        return $this;
    }

    public function getLugarExpedicion() {
        return $this->lugarExpedicion;
    }

    public function setLugarExpedicion($lugarExpedicion) {
        $this->lugarExpedicion = $lugarExpedicion;
        return $this;
    }
}

