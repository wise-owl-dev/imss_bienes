<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Entity\Documento;
use App\Domain\Repository\DocumentoRepositoryInterface;
use App\Infrastructure\Persistence\Database\Connection;
use PDO;

class MySQLDocumentoRepository implements DocumentoRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    public function guardar(Documento $documento): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO documentos
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

    public function buscarPorId(int $id): ?Documento
    {
        // Implementación similar a Trabajador
        return null;
    }

    public function buscarPorTrabajador(int $trabajadorId): array
    {
        // Devuelve arreglo de Documentos
        return [];
    }

    public function eliminar(int $id): void
    {
        $stmt = $this->db->prepare(
            "DELETE FROM documentos WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
    }
}

