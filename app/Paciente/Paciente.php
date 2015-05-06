<?php namespace Clinica\Paciente;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model {

	protected $table = 'paciente';

	protected $fillable = [
		'tipo_analisis',
		'persona_id',
		'servicio_id'
	];

	public function add($values)
	{
		$this->fill($values);
		return $this->save();
	}
}
