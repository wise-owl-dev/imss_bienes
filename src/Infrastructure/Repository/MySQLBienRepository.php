<?php
namespace App\Infrastructure\Repository;

use App\Domain\Entity\Bien;
use App\Domain\Repository\BienRepositoryInterface;
use PDO;

class MySQLBienRepository implements BienRepositoryInterface
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

    public function persist($bien)
    {
        if ($bien->getId()) {
            return $this->update($bien);
        }
        return $this->insert($bien);
    }

    protected function insert($bien)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO bien 
            (documento_id, cantidad, naturaleza, descripcion, identificacion_numero, marca, modelo, serie) 
            VALUES (:documento_id, :cantidad, :naturaleza, :descripcion, :identificacion_numero, :marca, :modelo, :serie)"
        );

        $stmt->execute([
            ':documento_id' => $bien->getDocumentoId(),
            ':cantidad' => $bien->getCantidad(),
            ':naturaleza' => $bien->getNaturaleza(),
            ':descripcion' => $bien->getDescripcion(),
            ':identificacion_numero' => $bien->getIdentificacionNumero(),
            ':marca' => $bien->getMarca(),
            ':modelo' => $bien->getModelo(),
            ':serie' => $bien->getSerie()
        ]);

        $bien->setId($this->pdo->lastInsertId());
        return $bien;
    }

    protected function update($bien)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE bien 
            SET documento_id = :documento_id,
                cantidad = :cantidad,
                naturaleza = :naturaleza,
                descripcion = :descripcion,
                identificacion_numero = :identificacion_numero,
                marca = :marca,
                modelo = :modelo,
                serie = :serie
            WHERE id = :id"
        );

        $stmt->execute([
            ':id' => $bien->getId(),
            ':documento_id' => $bien->getDocumentoId(),
            ':cantidad' => $bien->getCantidad(),
            ':naturaleza' => $bien->getNaturaleza(),
            ':descripcion' => $bien->getDescripcion(),
            ':identificacion_numero' => $bien->getIdentificacionNumero(),
            ':marca' => $bien->getMarca(),
            ':modelo' => $bien->getModelo(),
            ':serie' => $bien->getSerie()
        ]);

        return $bien;
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM bien WHERE id = :id"
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
        $stmt = $this->pdo->query("SELECT * FROM bien ORDER BY id DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bienes = [];
        foreach ($rows as $row) {
            $bienes[] = $this->hydrate($row);
        }

        return $bienes;
    }

    public function buscarPorDocumento($documentoId)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM bien WHERE documento_id = :documento_id ORDER BY id ASC"
        );
        $stmt->execute([':documento_id' => $documentoId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bienes = [];
        foreach ($rows as $row) {
            $bienes[] = $this->hydrate($row);
        }

        return $bienes;
    }

    protected function hydrate(array $row)
    {
        $bien = new Bien();
        $bien->setId($row['id'])
            ->setDocumentoId($row['documento_id'])
            ->setCantidad($row['cantidad'])
            ->setNaturaleza($row['naturaleza'])
            ->setDescripcion($row['descripcion'])
            ->setIdentificacionNumero($row['identificacion_numero'])
            ->setMarca($row['marca'])
            ->setModelo($row['modelo'])
            ->setSerie($row['serie']);

        return $bien;
    }
}
