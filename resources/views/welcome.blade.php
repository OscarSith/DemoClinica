<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="registrar-paciente">Registrar Paciente</a>
	<hr>
	<h1>Registrar</h1>

	@include('partials.show_errors')

	{!! Form::open(['route' => 'register', 'method' => 'post', 'novalidate']) !!}
		<div>
			{!! Form::text('nombre', null, ['placeholder' => 'Nombre']) !!}
		</div>
		<div>
			{!! Form::text('apellido_pa', null, ['placeholder' => 'Appelido Paterno']) !!}
		</div>
		<div>
			{!! Form::text('apellido_ma', null, ['placeholder' => 'Apellido_ma']) !!}
		</div>
		<div>
			{!! Form::text('nacimiento', null, ['placeholder' => 'Nacimiento']) !!}
		</div>
		<div>
			{!! Form::email('correo', null, ['placeholder' => 'Correo electrónico']) !!}
		</div>
		<div>
			{!! Form::text('login', null, ['placeholder' => 'Login']) !!}
		</div>
		<div>
			{!! Form::text('dni', null, ['placeholder' => 'Dni']) !!}
		</div>
		<div>
			<label>Cargo</label>
			{!! Form::select('cargo_id', $cargos, old('cargo_id')) !!}
		</div>
		<div>
			<label>Tipo Rol</label>
			{!! Form::select('rol_id', $roles, old('rol_id')) !!}
		</div>
		<div><button>Insertar</button></div>

		@if(Session::has('error'))
		<p>{{ Session::get('error') }}</p>
		@endif

		@if(Session::has('success'))
		<p>{{ Session::get('success') }}</p>
		@endif
	{!! Form::close() !!}
</body>
</html>