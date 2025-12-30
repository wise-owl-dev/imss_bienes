// tests/DocumentacionServiceTest.php
<?php

use App\Domain\Entity\Trabajador;
use App\Domain\Entity\Bien;
use App\Domain\Service\DocumentoService;

class DocumentoServiceTest extends PHPUnit_Framework_TestCase
{
    protected $service;
    protected $documentoRepository;
    protected $bienRepository;
    protected $documentoFactory;

    public function setUp()
    {
        // Crear mocks de los repositorios
        $this->documentoRepository = $this->getMockBuilder(
            'App\Domain\Repository\DocumentoRepositoryInterface'
        )->getMock();

        $this->bienRepository = $this->getMockBuilder(
            'App\Domain\Repository\BienRepositoryInterface'
        )->getMock();

        $this->documentoFactory = new App\Domain\Factory\DocumentoFactory();

        // Crear el servicio con los mocks
        $this->service = new DocumentoService(
            $this->documentoRepository,
            $this->bienRepository,
            $this->documentoFactory
        );
    }

    public function testGenerarDocumentoResguardoCreatesDocument()
    {
        // ARRANGE
        $trabajador = new Trabajador();
        $trabajador->setId(1);
        $trabajador->setNombre('Juan Pérez');

        $bien = new Bien();
        $bien->setCantidad(1);
        $bien->setDescripcion('Laptop HP');

        $bienes = array($bien);

        // Configurar el mock para que simule guardar
        $this->documentoRepository
            ->expects($this->once())
            ->method('begin');

        $this->documentoRepository
            ->expects($this->once())
            ->method('persist');

        $this->documentoRepository
            ->expects($this->once())
            ->method('commit');

        // ACT
        $resultado = $this->service->generarDocumentoResguardo(
            $trabajador,
            'FORMATO_RESGUARDO',
            $bienes
        );

        // ASSERT
        $this->assertArrayHasKey('documento', $resultado);
        $this->assertArrayHasKey('bienes', $resultado);
        $this->assertInstanceOf(
            'App\Domain\Entity\Documento',
            $resultado['documento']
        );
    }

    public function testGenerarDocumentoAsignasTrabajador()
    {
        // ARRANGE
        $trabajador = new Trabajador();
        $trabajador->setId(999);

        $this->documentoRepository
            ->expects($this->once())
            ->method('persist');

        // ACT
        $resultado = $this->service->generarDocumentoResguardo(
            $trabajador,
            'FORMATO_RESGUARDO',
            array()
        );

        // ASSERT
        $this->assertEquals(
            999,
            $resultado['documento']->getTrabajadorId()
        );
    }

    public function testGenerarDocumentoAsociaBienes()
    {
        // ARRANGE
        $trabajador = new Trabajador();
        $trabajador->setId(1);

        $bien1 = new Bien();
        $bien1->setDescripcion('Item 1');
        
        $bien2 = new Bien();
        $bien2->setDescripcion('Item 2');

        $bienes = array($bien1, $bien2);

        // Simular que el documento se guarda con ID = 100
        $this->documentoRepository
            ->method('persist')
            ->will($this->returnCallback(function($doc) {
                $doc->setId(100);
            }));

        $this->bienRepository
            ->expects($this->exactly(2))
            ->method('persist');

        // ACT
        $resultado = $this->service->generarDocumentoResguardo(
            $trabajador,
            'FORMATO_RESGUARDO',
            $bienes
        );

        // ASSERT
        $this->assertCount(2, $resultado['bienes']);
        $this->assertEquals(
            100,
            $resultado['bienes'][0]->getDocumentoId()
        );
    }
}
