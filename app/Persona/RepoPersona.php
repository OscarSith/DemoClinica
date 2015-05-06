<?php namespace Clinica\Persona;

class RepoPersona
{
	protected $persona;

	function __construct()
	{
		$this->persona = new Persona();
	}
}