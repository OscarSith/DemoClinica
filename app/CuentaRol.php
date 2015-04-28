<?php namespace Clinica;

use Illuminate\Database\Eloquent\Model;

class CuentaRol extends Model {

	protected $table = 'cuenta_rol';

	protected $fillable = [
		'id_app',
		'rol_id',
		'cuenta_id'
	];

	public function add($values)
	{
		$this->fill($values);
		return $this->save();
	}
}
