<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Trabajador;

interface TrabajadorRepositoryInterface extends RepositoryInterface
{
    public function buscarPorMatricula(string $matricula): ?Trabajador;
}

