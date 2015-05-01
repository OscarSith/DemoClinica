<?php namespace Clinica\Rol;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

	protected $table = 'rol';

	public function listar()
	{
		return $this->lists('nombre', 'id');
	}

}
