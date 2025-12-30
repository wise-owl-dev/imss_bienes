<?php

namespace App\Domain\Service;

use App\Domain\Entity\Trabajador;
use App\Domain\Factory\DocumentoFactory;
use App\Domain\Repository\DocumentoRepositoryInterface;
use App\Domain\Repository\BienRepositoryInterface;

class DocumentoService
{
    protected $documentoRepository;
    protected $bienRepository;
    protected $documentoFactory;

    public function __construct(
        DocumentoRepositoryInterface $documentoRepository,
        BienRepositoryInterface $bienRepository,
        DocumentoFactory $documentoFactory
    ) {
        $this->documentoRepository = $documentoRepository;
        $this->bienRepository = $bienRepository;
        $this->documentoFactory = $documentoFactory;
    }

    /**
     * Genera un documento de resguardo con bienes para un trabajador
     * 
     * @param Trabajador $trabajador
     * @param string $tipoDocumento
     * @param array $bienes
     * @return array ['documento' => Documento, 'bienes' => array]
     */
    public function generarDocumentoResguardo(
        Trabajador $trabajador, 
        $tipoDocumento, 
        array $bienes
    ) {
        // 1. Crear el documento usando el factory
        $resultado = $this->documentoFactory->createFromData(
            $trabajador,
            $tipoDocumento,
            $bienes
        );

        $documento = $resultado['documento'];
        
        // 2. Persistir el documento
        $this->documentoRepository->begin();
        $this->documentoRepository->persist($documento);
        $this->documentoRepository->commit();

        // 3. Obtener el ID del documento guardado
        $documentoId = $documento->getId();

        // 4. Asociar y guardar los bienes
        $bienesGuardados = array();
        
        foreach ($resultado['bienes'] as $bien) {
            $bien->setDocumentoId($documentoId);
            $this->bienRepository->persist($bien);
            $bienesGuardados[] = $bien;
        }

        return array(
            'documento' => $documento,
            'bienes' => $bienesGuardados
        );
    }

    /**
     * Genera documentos para múltiples trabajadores
     * 
     * @param array $trabajadores Array de Trabajador
     * @param string $tipoDocumento
     * @return array Array de documentos generados
     */
    public function generarDocumentosLote(array $trabajadores, $tipoDocumento)
    {
        $documentos = array();

        foreach ($trabajadores as $trabajador) {
            $documento = $this->documentoFactory->create($trabajador);
            $documento->setTipoDocumento($tipoDocumento);
            
            $this->documentoRepository->persist($documento);
            $documentos[] = $documento;
        }

        return $documentos;
    }
}
