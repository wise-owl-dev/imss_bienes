<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Documento;

interface DocumentoRepositoryInterface extends RepositoryInterface
{
    public function buscarPorFolio(string $folio): ?Documento;

    public function buscarPorTipo(string $tipo): array;
}

