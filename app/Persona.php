<?php namespace Clinica;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

	protected $table = 'persona';

	protected $fillable = [
		'dni',
		'nombre',
		'apellido_pa',
		'apellido_ma',
		'nacimiento'
	];

	public function newRegister($values)
	{
		$this->fill($values);
		return $this->save();
	}

}
