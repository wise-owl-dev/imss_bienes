<?php
// index.php (en la raíz del proyecto)

require __DIR__ . '/vendor/autoload.php';

// Iniciar sesión para mensajes
session_start();

// Cargar dependencias
$container = require __DIR__ . '/config/bootstrap.php';

use App\Presentation\Controller\DashboardController;
use App\Presentation\Controller\DocumentoController;
use App\Presentation\Controller\BienController;

// Router simple
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/imss-bienes', '', $uri); // Eliminar el prefijo del proyecto
$method = $_SERVER['REQUEST_METHOD'];

define('BASE_URL', '/imss-bienes');

// Rutas
switch (true) {
    // Dashboard
    case $uri === '/' || $uri === '/index.php' || $uri === '/dashboard':
        $controller = new DashboardController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository']
        );
        $controller->index();
        break;
    
    // Documentos - Lista
    case $uri === '/documentos':
        $controller = new DocumentoController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository'],
            $container['documentoService']
        );
        $controller->index();
        break;
    
    // Documentos - Crear (GET)
    case $uri === '/documentos/crear' && $method === 'GET':
        $controller = new DocumentoController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository'],
            $container['documentoService']
        );
        $controller->crear();
        break;
    
    // Documentos - Guardar (POST)
    case $uri === '/documentos/guardar' && $method === 'POST':
        $controller = new DocumentoController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository'],
            $container['documentoService']
        );
        $controller->guardar();
        break;
    
    // Documentos - Buscar trabajador (AJAX)
    case $uri === '/documentos/buscar-trabajador':
        $controller = new DocumentoController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository'],
            $container['documentoService']
        );
        $controller->buscarTrabajador();
        break;
    
    // Documentos - Buscar bienes (AJAX)
    case $uri === '/documentos/buscar-bienes':
        $controller = new DocumentoController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository'],
            $container['documentoService']
        );
        $controller->buscarBienes();
        break;
    
    // Documentos - Ver específico
    case preg_match('/^\/documentos\/(\d+)$/', $uri, $matches):
        $controller = new DocumentoController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository'],
            $container['documentoService']
        );
        $controller->ver($matches[1]);
        break;
    
    // Trabajadores
    case $uri === '/trabajadores':
        // TODO: Implementar TrabajadorController
        echo "Trabajadores";
        break;
    
    // Bienes - Buscar/Listar
    case $uri === '/bienes':
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->index();
        break;
    
    // Bienes - Crear (GET)
    case $uri === '/bienes/crear' && $method === 'GET':
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->crear();
        break;
    
    // Bienes - Guardar (POST)
    case $uri === '/bienes/guardar' && $method === 'POST':
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->guardar();
        break;
    
    // Bienes - Exportar
    case $uri === '/bienes/exportar':
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->exportar();
        break;
    
    // Bienes - Editar (GET)
    case preg_match('/^\/bienes\/(\d+)\/editar$/', $uri, $matches):
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->editar($matches[1]);
        break;
    
    // Bienes - Actualizar (POST)
    case preg_match('/^\/bienes\/(\d+)\/actualizar$/', $uri, $matches) && $method === 'POST':
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->actualizar($matches[1]);
        break;
    
    // Bienes - Eliminar
    case preg_match('/^\/bienes\/(\d+)\/eliminar$/', $uri, $matches):
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->eliminar($matches[1]);
        break;
    
    // Bienes - Ver específico
    case preg_match('/^\/bienes\/(\d+)$/', $uri, $matches):
        $controller = new BienController(
            $container['bienRepository']
        );
        $controller->ver($matches[1]);
        break;

        
    // Reportes
    case $uri === '/reportes':
        echo "Reportes";
        break;
    
    // Configuración
    case $uri === '/configuracion':
        echo "Configuración";
        break;
    
    // 404
    default:
        header("HTTP/1.0 404 Not Found");
        echo "404 - Página no encontrada: " . htmlspecialchars($uri);
        break;
}