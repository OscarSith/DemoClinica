<?php namespace Clinica\Cargo;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model {

	protected $table = 'cargos';

	public function listar()
	{
		return $this->lists('cargo', 'id');
	}

}
