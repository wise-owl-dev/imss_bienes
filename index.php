<?php
// index.php (en la raíz del proyecto)

require __DIR__ . '/vendor/autoload.php';

// Cargar dependencias
$container = require __DIR__ . '/config/bootstrap.php';

use App\Presentation\Controller\DashboardController;

// Router simple
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/imss-bienes', '', $uri); // Eliminar el prefijo del proyecto
$method = $_SERVER['REQUEST_METHOD'];

// Rutas
switch ($uri) {
    case '/':
    case '/index.php':
    case '/dashboard':
        $controller = new DashboardController(
            $container['documentoRepository'],
            $container['bienRepository'],
            $container['trabajadorRepository']
        );
        $controller->index();
        break;
    
    case '/documentos':
        // TODO: Implementar DocumentoController
        echo "Documentos";
        break;
    
    case '/trabajadores':
        // TODO: Implementar TrabajadorController
        echo "Trabajadores";
        break;
    
    case '/bienes':
        // TODO: Implementar BienController
        echo "Bienes";
        break;
    
    default:
        header("HTTP/1.0 404 Not Found");
        echo "404 - Página no encontrada";
        break;
}