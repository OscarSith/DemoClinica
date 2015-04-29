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
	<form action="{{ route('newPaciente')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<input type="text" name="nombre" placeholder="Nombre">
		</div>
		<div>
			<input type="text" name="apellido_pa" placeholder="Apellido_pa">
		</div>
		<div>
			<input type="text" name="apellido_ma" placeholder="Apellido_ma">
		</div>
		<div>
			<input type="text" name="nacimiento" placeholder="Nacimiento">
		</div>
		<div>
			<input type="text" name="dni" placeholder="DNI">
		</div>
		<div>
			<input type="correo" name="correo" placeholder="Correo electrónico">
		</div>
		<div>
			<select name="servicio_id">
			@foreach($servicios as $rec)
				<option value="{{ $rec->id }}">{{ $rec->nombre }}</option>
			@endforeach
			</select>
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