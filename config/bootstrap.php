<?php
// config/bootstrap.php

require __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Repository\MySQLDocumentoRepository;
use App\Infrastructure\Repository\MySQLBienRepository;
use App\Infrastructure\Repository\MySQLTrabajadorRepository;
use App\Domain\Factory\DocumentoFactory;
use App\Domain\Service\DocumentoService;

// Cargar configuración de base de datos
$dbConfig = require __DIR__ . '/database.php';

// Crear conexión PDO
$dsn = sprintf(
    '%s:host=%s;port=%s;dbname=%s;charset=%s',
    $dbConfig['driver'],
    $dbConfig['host'],
    $dbConfig['port'],
    $dbConfig['database'],
    $dbConfig['charset']
);

$pdo = new PDO(
    $dsn,
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['options']
);

// Crear repositorios
$documentoRepository = new MySQLDocumentoRepository($pdo);
$bienRepository = new MySQLBienRepository($pdo);
$trabajadorRepository = new MySQLTrabajadorRepository($pdo);

// Crear factories
$documentoFactory = new DocumentoFactory();

// Crear servicios
$documentoService = new DocumentoService(
    $documentoRepository,
    $bienRepository,
    $documentoFactory
);

// Retornar contenedor simple
return [
    'pdo' => $pdo,
    'documentoRepository' => $documentoRepository,
    'bienRepository' => $bienRepository,
    'trabajadorRepository' => $trabajadorRepository,
    'documentoFactory' => $documentoFactory,
    'documentoService' => $documentoService
];