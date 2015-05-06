<?php namespace Clinica\Services;

use Clinica\Cuenta\Cuenta;
use Clinica\Persona\Persona;
use Clinica\Personal\Personal;
use Clinica\CuentaRol\CuentaRol;

use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * The Guard implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	protected $auth;

	/**
	 * The registrar implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Registrar
	 */
	protected $registrar;

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'nombre' => 'required',
			'apellido_pa' => 'required',
			'apellido_ma' => 'required',
			'nacimiento' => 'required|date',
			'correo' => 'required|email|unique:persona,correo',
			'login' => 'required|unique:cuenta,login',
			'dni' => 'required|numeric|digits_between:8,16|unique:persona,dni',
			'cargo_id' => 'required|numeric',
			'rol_id' => 'required|numeric'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return \DB::transaction(function() use ($data) {

			$Persona = new Persona();
			$Persona->newRegister($data);

			$data['persona_id'] = $Persona->getKey();
			$Personal = new Personal();
			$Personal->add($data);

			$data['personal_id'] = $Personal->getKey();
			$Cuenta = Cuenta::create($data);

			$data['cuenta_id'] = $Cuenta->getKey();
			$CuentaRol = new CuentaRol();
			$CuentaRol->add($data);

			return $Cuenta;
		});
	}
}
