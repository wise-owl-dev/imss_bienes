<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Entity\Bien;
use App\Domain\Repository\BienRepositoryInterface;
use App\Infrastructure\Persistence\Database\Connection;
use PDO;

class MySQLBienRepository implements BienRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    public function save(Bien $bien): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO bienes
            (trabajador_id, tipo_documento, fecha_documento)
            VALUES (:trabajador, :tipo, :fecha)
        ");

        $stmt->execute([
            'trabajador' => $documento->getTrabajadorId(),
            'tipo' => $documento->getTipo(),
            'fecha' => $documento->getFecha()->format('Y-m-d')
        ]);

        return (int)$this->db->lastInsertId();
    }

    public function findById(int $id): ?Documento
    {
        // Implementación similar a Trabajador
        return null;
    }

    public function findByTrabajador(int $trabajadorId): array
    {
        // Devuelve arreglo de Documentos
        return [];
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare(
            "DELETE FROM documentos WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
    }
}

