<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Bien;

interface BienRepositoryInterface extends RepositoryInterface
{
    public function buscarPorDocumento($documentoId);
}

