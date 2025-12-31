<?php
// src/Presentation/Controller/DocumentoController.php

namespace App\Presentation\Controller;

use App\Domain\Repository\DocumentoRepositoryInterface;
use App\Domain\Repository\BienRepositoryInterface;
use App\Domain\Repository\TrabajadorRepositoryInterface;
use App\Domain\Service\DocumentoService;
use App\Domain\Entity\Trabajador;
use App\Domain\Entity\Bien;

class DocumentoController
{
    protected $documentoRepository;
    protected $bienRepository;
    protected $trabajadorRepository;
    protected $documentoService;

    public function __construct(
        DocumentoRepositoryInterface $documentoRepository,
        BienRepositoryInterface $bienRepository,
        TrabajadorRepositoryInterface $trabajadorRepository,
        DocumentoService $documentoService
    ) {
        $this->documentoRepository = $documentoRepository;
        $this->bienRepository = $bienRepository;
        $this->trabajadorRepository = $trabajadorRepository;
        $this->documentoService = $documentoService;
    }

    /**
     * Muestra el formulario de creación de documentos
     */
    public function crear()
    {
        // Obtener datos necesarios para el formulario
        $tiposDocumento = array(
            'CONSTANCIA_SALIDA' => 'Constancia de Salida',
            'RESGUARDO_INDIVIDUAL' => 'Resguardo Individual',
            'PRESTAMO_TEMPORAL' => 'Préstamo Temporal',
            'TRANSFERENCIA_INTERNA' => 'Transferencia Interna'
        );

        // Obtener bienes disponibles
        $bienes = $this->bienRepository->getAll();
        
        // Obtener trabajadores
        $trabajadores = $this->trabajadorRepository->getAll();

        // Cargar vista
        require __DIR__ . '/../View/documentos/crear.php';
    }

    /**
     * Procesa el formulario y crea el documento
     */
    public function guardar()
    {
        try {
            // Validar datos del POST
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Método no permitido');
            }

            // Obtener datos del formulario
            $tipoDocumento = isset($_POST['doc-type']) ? $_POST['doc-type'] : null;
            $fechaDocumento = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
            $motivo = isset($_POST['reason']) ? $_POST['reason'] : '';
            $matriculaSolicitante = isset($_POST['matricula-solicitante']) ? $_POST['matricula-solicitante'] : null;
            $matriculaAutoriza = isset($_POST['matricula-autoriza']) ? $_POST['matricula-autoriza'] : null;
            $bienesIds = isset($_POST['bienes']) ? $_POST['bienes'] : array();

            // Validaciones
            if (empty($tipoDocumento)) {
                throw new Exception('El tipo de documento es requerido');
            }

            if (empty($matriculaSolicitante)) {
                throw new Exception('La matrícula del solicitante es requerida');
            }

            if (empty($bienesIds)) {
                throw new Exception('Debe seleccionar al menos un bien');
            }

            // Buscar trabajador
            $trabajador = $this->trabajadorRepository->buscarPorMatricula($matriculaSolicitante);
            
            if (!$trabajador) {
                throw new Exception('No se encontró el trabajador con la matrícula proporcionada');
            }

            // Obtener bienes seleccionados
            $bienes = array();
            foreach ($bienesIds as $bienId) {
                $bien = $this->bienRepository->getById($bienId);
                if ($bien) {
                    $bienes[] = $bien;
                }
            }

            // Generar documento
            $resultado = $this->documentoService->generarDocumentoResguardo(
                $trabajador,
                $tipoDocumento,
                $bienes
            );

            // Redireccionar con mensaje de éxito
            header('Location: /documentos?success=1');
            exit;

        } catch (Exception $e) {
            // En caso de error, volver al formulario con mensaje
            $_SESSION['error'] = $e->getMessage();
            header('Location: /documentos/crear');
            exit;
        }
    }

    /**
     * Lista todos los documentos
     */
    public function index()
    {
        $documentos = $this->documentoRepository->getAll();
        require __DIR__ . '/../View/documentos/index.php';
    }

    /**
     * Muestra un documento específico
     */
    public function ver($id)
    {
        $documento = $this->documentoRepository->getById($id);
        
        if (!$documento) {
            header('HTTP/1.0 404 Not Found');
            echo 'Documento no encontrado';
            return;
        }

        $trabajador = $this->trabajadorRepository->getById($documento->getTrabajadorId());
        $bienes = $this->bienRepository->buscarPorDocumento($documento->getId());

        require __DIR__ . '/../View/documentos/ver.php';
    }

    /**
     * Busca trabajador por matrícula (AJAX)
     */
    public function buscarTrabajador()
    {
        header('Content-Type: application/json');
        
        $matricula = isset($_GET['matricula']) ? $_GET['matricula'] : null;
        
        if (!$matricula) {
            echo json_encode(array('success' => false, 'message' => 'Matrícula requerida'));
            return;
        }

        $trabajador = $this->trabajadorRepository->buscarPorMatricula($matricula);
        
        if (!$trabajador) {
            echo json_encode(array('success' => false, 'message' => 'Trabajador no encontrado'));
            return;
        }

        echo json_encode(array(
            'success' => true,
            'trabajador' => array(
                'id' => $trabajador->getId(),
                'nombre' => $trabajador->getNombre(),
                'cargo' => $trabajador->getCargo(),
                'adscripcion' => $trabajador->getAdscripcion(),
                'matricula' => $trabajador->getMatricula()
            )
        ));
    }

    /**
     * Busca bienes (AJAX)
     */
    public function buscarBienes()
    {
        header('Content-Type: application/json');
        
        $query = isset($_GET['q']) ? $_GET['q'] : '';
        
        $bienes = $this->bienRepository->getAll();
        
        // Filtrar por búsqueda si hay query
        if (!empty($query)) {
            $queryLower = strtolower($query);
            $bienes = array_filter($bienes, function($bien) use ($queryLower) {
                return strpos(strtolower($bien->getDescripcion()), $queryLower) !== false ||
                       strpos(strtolower($bien->getIdentificacionNumero()), $queryLower) !== false ||
                       strpos(strtolower($bien->getSerie()), $queryLower) !== false;
            });
        }

        $resultado = array_map(function($bien) {
            return array(
                'id' => $bien->getId(),
                'identificacion' => $bien->getIdentificacionNumero(),
                'descripcion' => $bien->getDescripcion(),
                'marca' => $bien->getMarca(),
                'modelo' => $bien->getModelo(),
                'serie' => $bien->getSerie(),
                'naturaleza' => $bien->getNaturaleza()
            );
        }, array_values($bienes));

        echo json_encode(array(
            'success' => true,
            'bienes' => $resultado
        ));
    }
}