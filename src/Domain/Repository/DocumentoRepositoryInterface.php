<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Documento;

interface DocumentoRepositoryInterface extends RepositoryInterface
{
    public function buscarPorFolio($folio);

    public function buscarPorTipo($tipo);
}

