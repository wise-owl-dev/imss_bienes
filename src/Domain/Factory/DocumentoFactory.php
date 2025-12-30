<?php

namespace App\Domain\Factory;

use App\Domain\Entity\Documento;
use App\Domain\Entity\Trabajador;

class DocumentoFactory
{
	/**
	 * Crea un documento básico con un trabajador
	 * @param Trabajador $trabajador
	 * @return Documento
	 */
	public function create(Trabajador $trabajador)
	{
		$documento = new Documento();

		$documento->setTrabajadorId($trabajador->getId());
		$documento->setFechaDocumento(new \DateTime());

		return $documento;
	}

	 /**
	  * Crea un documento completo con tipo y bienes asociados
	  * @param Trabajador $trabajador
	  * @param string $tipo
	  * @param array $bienes
	  * @return array Retorna array con 'documento' y 'bienes'
	  */
	public function createFromData( Trabajador $trabajador, $tipo, array $bienes) 
	{
		$documento = new Documento();

		$documento->setTrabajadorId($trabajador->getId());
		$documento->setTipoDocumento($tipo);
		$documento->setFechaDocumento(new \DateTime());

		// Los bienes se retornan por separado porque necesitan 
		// el documento_id después de que se guarde el documento
		return array(
			'documento' => $documento,
			'bienes' => $bienes
		);
		return $documento;
	}
}

