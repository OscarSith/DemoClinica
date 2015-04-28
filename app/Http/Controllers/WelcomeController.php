<?php namespace Clinica\Http\Controllers;

use Request;
use Clinica\Cargo;
use Clinica\Rol;
use Clinica\Persona;
use Clinica\Personal;
use Clinica\Cuenta;
use Clinica\CuentaRol;

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

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Cargo = new Cargo();
		$cargos = $Cargo->listar();

		$Rol = new Rol();
		$roles = $Rol->listar();

		return view('welcome', compact('cargos', 'roles'));
	}

	public function register()
	{
		$values = Request::all();
		try {
			\DB::transaction(function() use ($values){
				$Persona = new Persona();
				$Persona->newRegister($values);

				$values['persona_id'] = $Persona->getKey();
				$Personal = new Personal();
				$Personal->add($values);

				$values['personal_id'] = $Personal->getKey();
				$values['password'] = \Hash::make('123456');
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

}
