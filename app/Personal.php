<?php namespace Clinica;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model {

	protected $table = 'personal';

	protected $fillable = [
		'persona_id',
		'cargo_id',
	];

	public function add($values)
	{
		$this->fill($values);
		return $this->save();
	}
}
