<?php namespace Clinica\Persona;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

	protected $table = 'persona';

	protected $fillable = [
		'dni',
		'nombre',
		'apellido_pa',
		'apellido_ma',
		'nacimiento',
		'correo',
	];

	public function newRegister($values)
	{
		$this->fill($values);
		$this->estado = 1;
		return $this->save();
	}

}
