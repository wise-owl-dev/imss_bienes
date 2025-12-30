<?php

use App\Domain\Entity\Documento;
use App\Domain\Entity\Trabajador;
use App\Domain\Factory\DocumentoFactory;

describe('DocumentoFactory', function () {

    describe('->create()', function () {

        it('should return a Documento instance', function () {
            $trabajador = new Trabajador();
            $factory = new DocumentoFactory();

            $documento = $factory->create($trabajador);

            expect($documento)->to->be->instanceof(
                Documento::class
            );
        });

        it('should assign the trabajador to the document', function () {
            $trabajador = new Trabajador();
            $factory = new DocumentoFactory();

            $documento = $factory->create($trabajador);

            expect($documento->getTrabajador())
                ->to->equal($trabajador);
        });

        it('should set the document date', function () {
            $trabajador = new Trabajador();
            $factory = new DocumentoFactory();

            $documento = $factory->create($trabajador);

            expect($documento->getFecha())
                ->to->loosely->equal(new DateTime());
        });
    });
});

