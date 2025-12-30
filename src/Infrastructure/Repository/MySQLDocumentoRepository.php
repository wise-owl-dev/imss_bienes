<?php
// src/Infrastructure/Repository/MySQLDocumentoRepository.php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Documento;
use App\Domain\Repository\DocumentoRepositoryInterface;
use PDO;

class MySQLDocumentoRepository implements DocumentoRepositoryInterface
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

    public function persist($documento)
    {
        if ($documento->getId()) {
            return $this->update($documento);
        }
        return $this->insert($documento);
    }

    protected function insert($documento)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO documento 
            (trabajador_id, tipo_documento, fecha_documento, folio, lugar_expedicion) 
            VALUES (:trabajador_id, :tipo_documento, :fecha_documento, :folio, :lugar_expedicion)"
        );

        $fechaDocumento = $documento->getFechaDocumento();
        $fechaStr = $fechaDocumento ? $fechaDocumento->format('Y-m-d') : date('Y-m-d');

        $stmt->execute([
            ':trabajador_id' => $documento->getTrabajadorId(),
            ':tipo_documento' => $documento->getTipoDocumento(),
            ':fecha_documento' => $fechaStr,
            ':folio' => $documento->getFolio(),
            ':lugar_expedicion' => $documento->getLugarExpedicion()
        ]);

        $documento->setId($this->pdo->lastInsertId());
        return $documento;
    }

    protected function update($documento)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE documento 
            SET trabajador_id = :trabajador_id,
                tipo_documento = :tipo_documento,
                fecha_documento = :fecha_documento,
                folio = :folio,
                lugar_expedicion = :lugar_expedicion
            WHERE id = :id"
        );

        $fechaDocumento = $documento->getFechaDocumento();
        $fechaStr = $fechaDocumento ? $fechaDocumento->format('Y-m-d') : date('Y-m-d');

        $stmt->execute([
            ':id' => $documento->getId(),
            ':trabajador_id' => $documento->getTrabajadorId(),
            ':tipo_documento' => $documento->getTipoDocumento(),
            ':fecha_documento' => $fechaStr,
            ':folio' => $documento->getFolio(),
            ':lugar_expedicion' => $documento->getLugarExpedicion()
        ]);

        return $documento;
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM documento WHERE id = :id"
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
        $stmt = $this->pdo->query("SELECT * FROM documento ORDER BY id DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $documentos = [];
        foreach ($rows as $row) {
            $documentos[] = $this->hydrate($row);
        }

        return $documentos;
    }

    public function buscarPorFolio($folio)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM documento WHERE folio = :folio"
        );
        $stmt->execute([':folio' => $folio]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->hydrate($row);
    }

    public function buscarPorTipo($tipo)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM documento WHERE tipo_documento = :tipo ORDER BY id DESC"
        );
        $stmt->execute([':tipo' => $tipo]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $documentos = [];
        foreach ($rows as $row) {
            $documentos[] = $this->hydrate($row);
        }

        return $documentos;
    }

    protected function hydrate(array $row)
    {
        $documento = new Documento();
        $documento->setId($row['id'])
            ->setTrabajadorId($row['trabajador_id'])
            ->setTipoDocumento($row['tipo_documento'])
            ->setFechaDocumento(new \DateTime($row['fecha_documento']))
            ->setFolio($row['folio'])
            ->setLugarExpedicion($row['lugar_expedicion']);

        return $documento;
    }
}