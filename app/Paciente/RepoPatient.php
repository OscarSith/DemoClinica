<?php namespace Clinica\Paciente;

class RepoPatient
{
	protected $paciente;

	function __construct()
	{
		$this->paciente = new Paciente();
	}

	public function getPactients()
	{
		return $this->paciente
					->join('persona', 'paciente.persona_id', '=', 'persona.id')
					->simplePaginate(20, [
						'persona.id',
						'nombre',
						'apellido_pa',
						'apellido_ma',
						'correo',
						'paciente.created_at',
					]);
	}
}