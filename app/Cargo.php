<?php namespace Clinica;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {

	protected $table = 'cargos';

	public function listar()
	{
		return $this->get(['id', 'cargo']);
	}

}
