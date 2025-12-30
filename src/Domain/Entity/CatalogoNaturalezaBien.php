<?php
// src/Domain/Entity/CatalogoNaturalezaBien.php

namespace App\Domain\Entity;

class CatalogoNaturalezaBien extends AbstractEntity
{
    protected $codigo;
    protected $descripcion;

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        return $this;
    }
}

