<?php namespace Clinica\Http\Controllers;

use Clinica\Cargo\Cargo;
use Clinica\Rol\Rol;
use Clinica\Persona\Persona;
use Clinica\Personal\Personal;
use Clinica\Cuenta\Cuenta;
use Clinica\CuentaRol\CuentaRol;
use Clinica\Servicio\Servicio;
use Clinica\Paciente\Paciente;

use Clinica\Http\Requests\RegisterAccount;
use Clinica\Http\Requests\RegisterPatient;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function login()
	{
		return view('auth.login');
	}

	/**
	 * Show the application login screen to the user.
	 *
	 * @return Response
	 */
	public function registerAccount()
	{
		$Cargo = new Cargo();
		$cargos = $Cargo->listar();

		$Rol = new Rol();
		$roles = $Rol->listar();

		return view('registerAccount', compact('cargos', 'roles'));
	}

	public function register(RegisterAccount $request)
	{
		$values = $request->all();
		try {
			\DB::transaction(function() use ($values){
				$Persona = new Persona();
				$Persona->newRegister($values);

				$values['persona_id'] = $Persona->getKey();
				$Personal = new Personal();
				$Personal->add($values);

				$values['personal_id'] = $Personal->getKey();
				$values['password'] = '123456';
				$Cuenta = new Cuenta();
				$Cuenta->add($values);

				$values['cuenta_id'] = $Cuenta->getKey();
				$CuentaRol = new CuentaRol();
				$CuentaRol->add($values);
			});
		} catch (Exception $e) {
			return \Redirect::back()->with('error', $e->getMessage());
		}

		return \Redirect::back()->with('success', 'Registrado');
	}

	public function paciente()
	{
		$Servicio = new Servicio();
		$servicios = $Servicio->listar();

		return view('paciente', compact('servicios'));
	}

	public function addPaciente(RegisterPatient $request)
	{
		$values = $request->all();
		try {
			\DB::transaction(function() use ($values) {

				$Persona = new Persona();
				$Persona->newRegister($values);

				$values['persona_id'] = $Persona->getKey();
				$values['tipo_analisis'] = 'No se que analisis es';
				$Paciente = new Paciente();
				$Paciente->add($values);
			});
		} catch (Exception $e) {
			return \Redirect::back()->with('error', $e->getMessage());
		}

		return \Redirect::back()->with('success', 'Paciente agregado exitosamente');
	}
}
