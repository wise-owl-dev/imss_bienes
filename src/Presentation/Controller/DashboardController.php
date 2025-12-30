<?php
// src/Presentation/Controller/DashboardController.php

namespace App\Presentation\Controller;

use App\Domain\Repository\DocumentoRepositoryInterface;
use App\Domain\Repository\BienRepositoryInterface;
use App\Domain\Repository\TrabajadorRepositoryInterface;

class DashboardController
{
    protected $documentoRepository;
    protected $bienRepository;
    protected $trabajadorRepository;

    public function __construct(
        DocumentoRepositoryInterface $documentoRepository,
        BienRepositoryInterface $bienRepository,
        TrabajadorRepositoryInterface $trabajadorRepository
    ) {
        $this->documentoRepository = $documentoRepository;
        $this->bienRepository = $bienRepository;
        $this->trabajadorRepository = $trabajadorRepository;
    }

    public function index()
    {
        // Obtener estadísticas para el dashboard
        $stats = [
            'total_bienes' => $this->getTotalBienes(),
            'prestamos_activos' => $this->getPrestamosActivos(),
            'pendientes_firma' => $this->getPendientesFirma(),
            'valor_inventario' => $this->getValorInventario()
        ];

        // Obtener movimientos recientes (últimos 5)
        $movimientos_recientes = $this->getMovimientosRecientes(5);

        // Cargar vista del dashboard
        require __DIR__ . '/../View/dashboard.php';
    }

    protected function getTotalBienes()
    {
        try {
            $bienes = $this->bienRepository->getAll();
            return count($bienes);
        } catch (\Exception $e) {
            return 0;
        }
    }

    protected function getPrestamosActivos()
    {
        try {
            $prestamos = $this->documentoRepository->buscarPorTipo('CONSTANCIA_PRESTAMO');
            return count($prestamos);
        } catch (\Exception $e) {
            return 0;
        }
    }

    protected function getPendientesFirma()
    {
        // Por ahora retornamos un número fijo
        // Aquí podrías implementar lógica para documentos sin folio
        return 0;
    }

    protected function getValorInventario()
    {
        // Por ahora retornamos un valor ficticio
        // Aquí podrías implementar lógica para calcular el valor total
        return '45.2M';
    }

    protected function getMovimientosRecientes($limit = 5)
    {
        try {
            $documentos = $this->documentoRepository->getAll();
            
            // Limitar a los más recientes
            $documentos = array_slice($documentos, 0, $limit);
            
            // Enriquecer con información de bienes
            $movimientos = [];
            foreach ($documentos as $documento) {
                $bienes = $this->bienRepository->buscarPorDocumento($documento->getId());
                $movimientos[] = [
                    'documento' => $documento,
                    'bienes' => $bienes,
                    'bien_principal' => isset($bienes[0]) ? $bienes[0] : null
                ];
            }
            
            return $movimientos;
        } catch (\Exception $e) {
            return [];
        }
    }
}