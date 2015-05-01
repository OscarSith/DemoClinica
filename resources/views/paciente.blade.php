<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paciente</title>
</head>
<body>
	<a href="/">Home</a>
	<hr>
	<h1>Nuevo paciente</h1>
	@include('partials.show_errors')

	{!! Form::open(['route' => 'newPaciente', 'method' => 'POST', 'novalidate']) !!}
		<div>
			{!! Form::text('nombre', null, ['placeholder'=>"Nombre"]) !!}
		</div>
		<div>
			{!! Form::text('apellido_pa', null, ['placeholder'=>"Apellido_pa"]) !!}
		</div>
		<div>
			{!! Form::text('apellido_ma', null, ['placeholder'=>"Apellido_ma"]) !!}
		</div>
		<div>
			{!! Form::text('nacimiento', null, ['placeholder'=>"Nacimiento"]) !!}
		</div>
		<div>
			{!! Form::text('dni', null, ['placeholder'=>"DNI"]) !!}
		</div>
		<div>
			{!! Form::email('correo', null, ['placeholder'=>"Correo Electrónico"]) !!}
		</div>
		<div>
			{!! Form::select('servicio_id', $servicios, old('servicio_id')) !!}
		</div>
		<div>
			<button>Guardar</button>
		</div>
		@if(Session::has('error'))
		<p>{{ Session::get('error') }}</p>
		@endif

		@if(Session::has('success'))
		<p>{{ Session::get('success') }}</p>
		@endif
	</form>
</body>
</html>