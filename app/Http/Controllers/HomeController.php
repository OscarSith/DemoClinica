<?php namespace Clinica\Http\Controllers;

use Clinica\Paciente\RepoPatient;
use Clinica\Servicio\Servicio;
use Clinica\Paciente\Paciente;
use Clinica\Persona\Persona;

use Clinica\Http\Requests\RegisterPatient;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$RepoPatient = new RepoPatient();
		$Servicio = new Servicio();

		$pacientes = $RepoPatient->getPactients();

		$servicios = $Servicio->listar();

		return view('home', compact('pacientes', 'servicios'));
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
