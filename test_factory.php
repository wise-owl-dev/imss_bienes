<?php
require 'vendor/autoload.php';

use App\Domain\Factory\DocumentoFactory;
use App\Domain\Entity\Trabajador;
use App\Domain\Entity\Bien;

// 1. Crear trabajador
$trabajador = new Trabajador();
$trabajador->setId(1); // Asumiendo que ya existe en BD
$trabajador->setNombre('Juan Pérez');

// 2. Crear bienes
$bien1 = new Bien();
$bien1->setCantidad(1);
$bien1->setNaturaleza('BMC');
$bien1->setDescripcion('Laptop HP');
$bien1->setMarca('HP');
$bien1->setModelo('Pavilion');
$bien1->setSerie('XYZ123');

$bienes = array($bien1);

// 3. Usar el factory
$factory = new DocumentoFactory();
$resultado = $factory->createFromData(
    $trabajador, 
    'FORMATO_RESGUARDO', 
    $bienes
);

// 4. Guardar (esto lo harías en un Repository/Service)
// $documentoRepo->save($resultado['documento']);
// $documentoId = $resultado['documento']->getId();
// 
// foreach ($resultado['bienes'] as $bien) {
//     $bien->setDocumentoId($documentoId);
//     $bienRepo->save($bien);
// }

var_dump($resultado);
