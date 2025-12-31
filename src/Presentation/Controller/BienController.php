<?php
// src/Presentation/Controller/BienController.php

namespace App\Presentation\Controller;

use App\Domain\Repository\BienRepositoryInterface;
use Exception; // <<<< AGREGADO

class BienController
{
    protected $bienRepository;

    public function __construct(BienRepositoryInterface $bienRepository)
    {
        $this->bienRepository = $bienRepository;
    }

    /**
     * Muestra la vista de búsqueda y listado de bienes
     */
    public function index()
    {
        // Obtener parámetros de búsqueda y filtros
        $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
        $tipoBien = isset($_GET['tipo']) ? $_GET['tipo'] : '';
        $estatus = isset($_GET['estatus']) ? $_GET['estatus'] : '';
        $ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';
        $fechaRegistro = isset($_GET['fecha']) ? $_GET['fecha'] : '';
        
        // Paginación
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
        
        // Obtener todos los bienes
        $todosLosBienes = $this->bienRepository->getAll();
        
        // Aplicar filtros
        $bienesFiltrados = $this->aplicarFiltros(
            $todosLosBienes, 
            $searchQuery, 
            $tipoBien, 
            $estatus, 
            $ubicacion,
            $fechaRegistro
        );
        
        // Calcular paginación
        $totalBienes = count($bienesFiltrados);
        $totalPages = ceil($totalBienes / $perPage);
        $offset = ($page - 1) * $perPage;
        
        // Obtener bienes de la página actual
        $bienes = array_slice($bienesFiltrados, $offset, $perPage);
        
        // Calcular estadísticas para mostrar en el footer
        $showingFrom = $totalBienes > 0 ? $offset + 1 : 0;
        $showingTo = min($offset + $perPage, $totalBienes);
        
        // Datos para la vista
        $data = array(
            'bienes' => $bienes,
            'searchQuery' => $searchQuery,
            'tipoBien' => $tipoBien,
            'estatus' => $estatus,
            'ubicacion' => $ubicacion,
            'fechaRegistro' => $fechaRegistro,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'totalBienes' => $totalBienes,
            'showingFrom' => $showingFrom,
            'showingTo' => $showingTo,
            'hasFilters' => !empty($searchQuery) || !empty($tipoBien) || !empty($estatus) || !empty($ubicacion) || !empty($fechaRegistro)
        );
        
        // Cargar vista
        require __DIR__ . '/../View/bienes/buscar.php';
    }

    /**
     * Muestra el detalle de un bien específico
     */
    public function ver($id)
    {
        $bien = $this->bienRepository->getById($id);
        
        if (!$bien) {
            header('HTTP/1.0 404 Not Found');
            echo 'Bien no encontrado';
            return;
        }

        require __DIR__ . '/../View/bienes/ver.php';
    }

    /**
     * Muestra el formulario para crear un nuevo bien
     */
    public function crear()
    {
        // Cargar vista
        require __DIR__ . '/../View/bienes/crear.php';
    }

    /**
     * Procesa el formulario y guarda un nuevo bien
     */
    public function guardar()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Método no permitido');
            }

            // Obtener datos del formulario
            $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
            $identificacionNumero = isset($_POST['identificacion_numero']) ? trim($_POST['identificacion_numero']) : '';
            $marca = isset($_POST['marca']) ? trim($_POST['marca']) : '';
            $modelo = isset($_POST['modelo']) ? trim($_POST['modelo']) : '';
            $serie = isset($_POST['serie']) ? trim($_POST['serie']) : '';
            $naturaleza = isset($_POST['naturaleza']) ? $_POST['naturaleza'] : 'BMC';
            $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 1;

            // Validaciones
            if (empty($descripcion)) {
                throw new Exception('La descripción es requerida');
            }

            // Crear el bien
            $bien = new \App\Domain\Entity\Bien();
            $bien->setDescripcion($descripcion)
                ->setIdentificacionNumero($identificacionNumero)
                ->setMarca($marca)
                ->setModelo($modelo)
                ->setSerie($serie)
                ->setNaturaleza($naturaleza)
                ->setCantidad($cantidad);

            // Guardar
            $this->bienRepository->persist($bien);

            // Redireccionar con mensaje de éxito
            header('Location: ' . BASE_URL . '/bienes?success=1');
            exit;

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '/bienes/crear');
            exit;
        }
    }

    /**
     * Exporta los bienes a un archivo CSV
     */
    public function exportar()
    {
        // Obtener bienes con los mismos filtros
        $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
        $tipoBien = isset($_GET['tipo']) ? $_GET['tipo'] : '';
        $estatus = isset($_GET['estatus']) ? $_GET['estatus'] : '';
        $ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';
        
        $todosLosBienes = $this->bienRepository->getAll();
        $bienesFiltrados = $this->aplicarFiltros(
            $todosLosBienes, 
            $searchQuery, 
            $tipoBien, 
            $estatus, 
            $ubicacion,
            ''
        );

        // Configurar headers para descarga
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="bienes_' . date('Y-m-d') . '.csv"');

        // Crear el archivo CSV
        $output = fopen('php://output', 'w');
        
        // Escribir BOM para UTF-8
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Escribir encabezados
        fputcsv($output, array('ID', 'Identificación', 'Descripción', 'Marca', 'Modelo', 'Serie', 'Naturaleza', 'Cantidad'));
        
        // Escribir datos
        foreach ($bienesFiltrados as $bien) {
            fputcsv($output, array(
                $bien->getId(),
                $bien->getIdentificacionNumero(),
                $bien->getDescripcion(),
                $bien->getMarca(),
                $bien->getModelo(),
                $bien->getSerie(),
                $bien->getNaturaleza(),
                $bien->getCantidad()
            ));
        }
        
        fclose($output);
        exit;
    }

    /**
     * Aplica filtros a la lista de bienes
     */
    protected function aplicarFiltros($bienes, $searchQuery, $tipoBien, $estatus, $ubicacion, $fechaRegistro)
    {
        $resultado = $bienes;

        // Filtro de búsqueda general
        if (!empty($searchQuery)) {
            $queryLower = strtolower($searchQuery);
            $resultado = array_filter($resultado, function($bien) use ($queryLower) {
                return strpos(strtolower($bien->getDescripcion()), $queryLower) !== false ||
                       strpos(strtolower($bien->getIdentificacionNumero()), $queryLower) !== false ||
                       strpos(strtolower($bien->getSerie()), $queryLower) !== false ||
                       strpos(strtolower($bien->getMarca()), $queryLower) !== false ||
                       strpos(strtolower($bien->getModelo()), $queryLower) !== false;
            });
        }

        // Filtro por tipo (basado en naturaleza o descripción)
        if (!empty($tipoBien)) {
            $resultado = array_filter($resultado, function($bien) use ($tipoBien) {
                // Aquí puedes implementar lógica más específica
                return true; // Por ahora retorna todos
            });
        }

        // Filtro por estatus
        // Nota: necesitarías agregar un campo "estatus" a la entidad Bien
        if (!empty($estatus)) {
            // Implementar cuando tengas el campo estatus
        }

        // Filtro por ubicación
        // Nota: necesitarías agregar un campo "ubicacion" a la entidad Bien
        if (!empty($ubicacion)) {
            // Implementar cuando tengas el campo ubicacion
        }

        // Filtro por fecha
        if (!empty($fechaRegistro)) {
            // Implementar cuando tengas el campo created_at
        }

        return array_values($resultado);
    }

    /**
     * Muestra el formulario de edición de un bien
     */
    public function editar($id)
    {
        $bien = $this->bienRepository->getById($id);
        
        if (!$bien) {
            $_SESSION['error'] = 'Bien no encontrado';
            header('Location: ' . BASE_URL . '/bienes');
            exit;
        }

        require __DIR__ . '/../View/bienes/editar.php';
    }

    /**
     * Actualiza los datos de un bien
     */
    public function actualizar($id)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Método no permitido');
            }

            // Buscar el bien
            $bien = $this->bienRepository->getById($id);
            
            if (!$bien) {
                throw new Exception('Bien no encontrado');
            }

            // Obtener datos del formulario
            $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
            $naturaleza = isset($_POST['naturaleza']) ? $_POST['naturaleza'] : 'BMC';
            $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 1;
            $serie = isset($_POST['serie']) ? trim($_POST['serie']) : '';
            $marca = isset($_POST['marca']) ? trim($_POST['marca']) : '';
            $modelo = isset($_POST['modelo']) ? trim($_POST['modelo']) : '';

            // Validaciones
            if (empty($descripcion)) {
                throw new Exception('La descripción es requerida');
            }

            // Actualizar el bien
            $bien->setDescripcion($descripcion)
                ->setNaturaleza($naturaleza)
                ->setCantidad($cantidad)
                ->setSerie($serie)
                ->setMarca($marca)
                ->setModelo($modelo);

            // Guardar
            $this->bienRepository->persist($bien);

            // Redireccionar con mensaje de éxito
            $_SESSION['success'] = 'Los cambios se guardaron correctamente';
            header('Location: ' . BASE_URL . '/bienes/' . $id . '/editar');
            exit;

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '/bienes/' . $id . '/editar');
            exit;
        }
    }

    /**
     * Elimina un bien
     */
    public function eliminar($id)
    {
        try {
            $bien = $this->bienRepository->getById($id);
            
            if (!$bien) {
                throw new Exception('Bien no encontrado');
            }

            // Verificar si está asociado a un documento
            if ($bien->getDocumentoId()) {
                throw new Exception('No se puede eliminar un bien asociado a un documento. Primero elimine el documento.');
            }

            // Aquí deberías implementar el método delete en el repositorio
            // Por ahora, redireccionamos con mensaje
            $_SESSION['error'] = 'Función de eliminación no implementada aún';
            header('Location: ' . BASE_URL . '/bienes');
            exit;

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . '/bienes');
            exit;
        }
    }

    /**
     * Retorna opciones para filtros (usado en AJAX)
     */
    public function obtenerOpciones()
    {
        header('Content-Type: application/json');
        
        $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
        
        $opciones = array();
        
        switch ($tipo) {
            case 'tipos':
                $opciones = array(
                    array('value' => 'EQUIPO_MEDICO', 'label' => 'Equipo Médico'),
                    array('value' => 'MOBILIARIO', 'label' => 'Mobiliario'),
                    array('value' => 'VEHICULOS', 'label' => 'Vehículos'),
                    array('value' => 'COMPUTO', 'label' => 'Cómputo'),
                    array('value' => 'OTROS', 'label' => 'Otros')
                );
                break;
            
            case 'ubicaciones':
                $opciones = array(
                    array('value' => 'URGENCIAS', 'label' => 'Urgencias'),
                    array('value' => 'HOSPITALIZACION', 'label' => 'Hospitalización'),
                    array('value' => 'QUIROFANOS', 'label' => 'Quirófanos'),
                    array('value' => 'UCI', 'label' => 'UCI'),
                    array('value' => 'ADMINISTRACION', 'label' => 'Administración')
                );
                break;
        }
        
        echo json_encode(array('success' => true, 'opciones' => $opciones));
    }
}