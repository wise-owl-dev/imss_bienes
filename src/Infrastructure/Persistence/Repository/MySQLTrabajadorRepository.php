<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Entity\Trabajador;
use App\Domain\Repository\TrabajadorRepositoryInterface;
use App\Infrastructure\Persistence\Database\Connection;
use PDO;

class MySQLTrabajadorRepository implements TrabajadorRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    public function guardar(Trabajador $trabajador): int
    {
        $sql = "INSERT INTO trabajadores 
                (nombre, matricula, institucion, adscripcion, cargo)
                VALUES (:nombre, :matricula, :institucion, :adscripcion, :cargo)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'nombre' => $trabajador->getNombre(),
            'matricula' => $trabajador->getMatricula(),
            'institucion' => $trabajador->getInstitucion(),
            'adscripcion' => null,
            'cargo' => null
        ]);

        return (int)$this->db->lastInsertId();
    }

    public function buscarPorId(int $id): ?Trabajador
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM trabajadores WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();

        if (!$row) return null;

        return new Trabajador(
            $row['nombre'],
            $row['matricula'],
            $row['institucion']
        );
    }

    public function buscarPorMatricula(string $matricula): ?Trabajador
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM trabajadores WHERE matricula = :matricula"
        );
        $stmt->execute(['matricula' => $matricula]);

        $row = $stmt->fetch();

        return $row
            ? new Trabajador($row['nombre'], $row['matricula'], $row['institucion'])
            : null;
    }

    public function actualizar(Trabajador $trabajador): void
    {
        // implementar después si lo necesitas
    }

    public function eliminar(int $id): void
    {
        $stmt = $this->db->prepare(
            "DELETE FROM trabajadores WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
    }
}

