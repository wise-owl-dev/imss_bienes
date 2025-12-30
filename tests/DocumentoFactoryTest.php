// tests/DocumentoFactoryTest.php
<?php

class DocumentoFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreateReturnsDocumentoInstance()
    {
        $trabajador = new App\Domain\Entity\Trabajador();
        $factory = new App\Domain\Factory\DocumentoFactory();
        
        $documento = $factory->create($trabajador);
        
        $this->assertInstanceOf(
            'App\Domain\Entity\Documento',
            $documento
        );
    }
    
    public function testAssignsTrabajadorToDocument()
    {
        $trabajador = new App\Domain\Entity\Trabajador();
        $trabajador->setId(123);
        
        $factory = new App\Domain\Factory\DocumentoFactory();
        $documento = $factory->create($trabajador);
        
        $this->assertEquals(
            123,
            $documento->getTrabajadorId()
        );
    }
    
    public function testSetsDocumentDate()
    {
        $trabajador = new App\Domain\Entity\Trabajador();
        $factory = new App\Domain\Factory\DocumentoFactory();
        
        $documento = $factory->create($trabajador);
        
        $this->assertInstanceOf(
            'DateTime',
            $documento->getFechaDocumento()
        );
        
        // Verificar que la fecha es de hoy
        $hoy = new DateTime();
        $this->assertEquals(
            $hoy->format('Y-m-d'),
            $documento->getFechaDocumento()->format('Y-m-d')
        );
    }
}
