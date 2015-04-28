<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Registrar</h1>
	<form action="register" method="POST">
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
			<input type="login" name="nacimiento" placeholder="Login">
		</div>
		<div>
			<input type="text" name="dni" placeholder="Dni">
		</div>
		<div>
			<label>Cargo</label>
			<select name="cargo_id" id="cargo_id">
			@foreach($cargos as $rec)
				<option value="{{ $rec->id }}">{{ $rec->cargo }}</option>
			@endforeach
			</select>
		</div>
		<div>
			<label>Tipo Rol</label>
			<select name="rol_id" id="rol_id">
			@foreach($roles as $rec)
				<option value="{{ $rec->id }}">{{ $rec->nombre }}</option>
			@endforeach
			</select>
		</div>
		<div><button>Insertar</button></div>

		@if(Session::has('error'))
		<p>{{ Session::get('error') }}</p>
		@endif

		@if(Session::has('success'))
		<p>{{ Session::get('success') }}</p>
		@endif
	</form>
</body>
</html>