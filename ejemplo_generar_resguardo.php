<?php
// ejemplo_generar_resguardo.php

require __DIR__ . '/config/bootstrap.php';

use App\Domain\Entity\Trabajador;
use App\Domain\Entity\Bien;

// Obtener servicios del contenedor
$container = require __DIR__ . '/config/bootstrap.php';
$trabajadorRepo = $container['trabajadorRepository'];
$documentoService = $container['documentoService'];

try {
    // 1. Crear o buscar trabajador
    $trabajador = new Trabajador();
    $trabajador->setNombre('Juan Pérez López')
        ->setInstitucion('INSTITUTO MEXICANO DEL SEGURO SOCIAL')
        ->setAdscripcion('Dirección de Prestaciones Médicas')
        ->setCargo('Jefe de Departamento')
        ->setDireccion('Av. Reforma 123, Col. Centro')
        ->setMatricula('98765432')
        ->setTelefono('555-1234-5678')
        ->setIdentificacion('CURP123456789');

    // Guardar trabajador
    $trabajadorRepo->persist($trabajador);
    
    echo "✓ Trabajador creado con ID: " . $trabajador->getId() . "\n";

    // 2. Crear bienes para el resguardo
    $bien1 = new Bien();
    $bien1->setCantidad(1)
        ->setNaturaleza('BMC')
        ->setDescripcion('Laptop HP EliteBook 840 G8')
        ->setIdentificacionNumero('INV-2024-001')
        ->setMarca('HP')
        ->setModelo('EliteBook 840 G8')
        ->setSerie('5CD12345AB');

    $bien2 = new Bien();
    $bien2->setCantidad(1)
        ->setNaturaleza('BMC')
        ->setDescripcion('Monitor Dell 24 pulgadas')
        ->setIdentificacionNumero('INV-2024-002')
        ->setMarca('Dell')
        ->setModelo('P2419H')
        ->setSerie('CN-0987654-12345');

    $bien3 = new Bien();
    $bien3->setCantidad(1)
        ->setNaturaleza('BMNC')
        ->setDescripcion('Mouse inalámbrico Logitech')
        ->setMarca('Logitech')
        ->setModelo('M720 Triathlon')
        ->setSerie('LGT-987654');

    $bienes = [$bien1, $bien2, $bien3];

    // 3. Generar documento de resguardo
    echo "\n→ Generando documento de resguardo...\n";
    
    $resultado = $documentoService->generarDocumentoResguardo(
        $trabajador,
        'FORMATO_RESGUARDO',
        $bienes
    );

    $documento = $resultado['documento'];
    $bienesGuardados = $resultado['bienes'];

    echo "✓ Documento generado con ID: " . $documento->getId() . "\n";
    echo "✓ Tipo: " . $documento->getTipoDocumento() . "\n";
    echo "✓ Fecha: " . $documento->getFechaDocumento()->format('Y-m-d') . "\n";
    echo "✓ Bienes asociados: " . count($bienesGuardados) . "\n\n";

    // 4. Mostrar resumen
    echo "=== RESUMEN DEL RESGUARDO ===\n\n";
    echo "Trabajador: " . $trabajador->getNombre() . "\n";
    echo "Matrícula: " . $trabajador->getMatricula() . "\n";
    echo "Cargo: " . $trabajador->getCargo() . "\n\n";

    echo "Bienes en resguardo:\n";
    foreach ($bienesGuardados as $index => $bien) {
        echo ($index + 1) . ". " . $bien->getDescripcion() . "\n";
        echo "   Naturaleza: " . $bien->getNaturaleza() . "\n";
        echo "   Marca: " . $bien->getMarca() . " - Modelo: " . $bien->getModelo() . "\n";
        echo "   Serie: " . $bien->getSerie() . "\n";
        echo "   ID Inventario: " . $bien->getIdentificacionNumero() . "\n\n";
    }

    echo "\n✓ Proceso completado exitosamente\n";

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . "\n";
    echo "Línea: " . $e->getLine() . "\n";
}