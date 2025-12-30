<?php
// src/Infrastructure/Repository/MySQLTrabajadorRepository.php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Trabajador;
use App\Domain\Repository\TrabajadorRepositoryInterface;
use PDO;

class MySQLTrabajadorRepository implements TrabajadorRepositoryInterface
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function begin()
    {
        $this->pdo->beginTransaction();
    }

    public function commit()
    {
        $this->pdo->commit();
    }

    public function persist($trabajador)
    {
        if ($trabajador->getId()) {
            return $this->update($trabajador);
        }
        return $this->insert($trabajador);
    }

    protected function insert($trabajador)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO trabajador 
            (nombre, institucion, adscripcion, cargo, direccion, matricula, telefono, identificacion) 
            VALUES (:nombre, :institucion, :adscripcion, :cargo, :direccion, :matricula, :telefono, :identificacion)"
        );

        $stmt->execute([
            ':nombre' => $trabajador->getNombre(),
            ':institucion' => $trabajador->getInstitucion(),
            ':adscripcion' => $trabajador->getAdscripcion(),
            ':cargo' => $trabajador->getCargo(),
            ':direccion' => $trabajador->getDireccion(),
            ':matricula' => $trabajador->getMatricula(),
            ':telefono' => $trabajador->getTelefono(),
            ':identificacion' => $trabajador->getIdentificacion()
        ]);

        $trabajador->setId($this->pdo->lastInsertId());
        return $trabajador;
    }

    protected function update($trabajador)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE trabajador 
            SET nombre = :nombre,
                institucion = :institucion,
                adscripcion = :adscripcion,
                cargo = :cargo,
                direccion = :direccion,
                matricula = :matricula,
                telefono = :telefono,
                identificacion = :identificacion
            WHERE id = :id"
        );

        $stmt->execute([
            ':id' => $trabajador->getId(),
            ':nombre' => $trabajador->getNombre(),
            ':institucion' => $trabajador->getInstitucion(),
            ':adscripcion' => $trabajador->getAdscripcion(),
            ':cargo' => $trabajador->getCargo(),
            ':direccion' => $trabajador->getDireccion(),
            ':matricula' => $trabajador->getMatricula(),
            ':telefono' => $trabajador->getTelefono(),
            ':identificacion' => $trabajador->getIdentificacion()
        ]);

        return $trabajador;
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM trabajador WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->hydrate($row);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM trabajador ORDER BY nombre ASC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $trabajadores = [];
        foreach ($rows as $row) {
            $trabajadores[] = $this->hydrate($row);
        }

        return $trabajadores;
    }

    public function buscarPorMatricula($matricula)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM trabajador WHERE matricula = :matricula"
        );
        $stmt->execute([':matricula' => $matricula]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->hydrate($row);
    }

    protected function hydrate(array $row)
    {
        $trabajador = new Trabajador();
        $trabajador->setId($row['id'])
            ->setNombre($row['nombre'])
            ->setInstitucion($row['institucion'])
            ->setAdscripcion($row['adscripcion'])
            ->setCargo($row['cargo'])
            ->setDireccion($row['direccion'])
            ->setMatricula($row['matricula'])
            ->setTelefono($row['telefono'])
            ->setIdentificacion($row['identificacion']);

        return $trabajador;
    }
}