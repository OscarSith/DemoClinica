<?php namespace Clinica\Http\Requests;

use Clinica\Http\Requests\Request;

class RegisterAccount extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nombre' => 'required',
			'apellido_pa' => 'required',
			'apellido_ma' => 'required',
			'nacimiento' => 'required|date',
			'correo' => 'required|unique:persona,correo',
			'login' => 'required|unique:cuenta,login',
			'dni' => 'required|numeric|digits_between:8,16|unique:persona,dni',
			'cargo_id' => 'required|numeric',
			'rol_id' => 'required|numeric'
		];
	}

}
