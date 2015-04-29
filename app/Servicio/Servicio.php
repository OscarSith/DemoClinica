<?php namespace Clinica\Servicio;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model {

	protected $table = 'servicio';

	public function listar()
	{
		return $this->get(['id', 'nombre']);
	}

}
