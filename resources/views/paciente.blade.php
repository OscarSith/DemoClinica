{!! Form::open(['route' => 'newPaciente', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::text('nombre', null, ['placeholder'=>"Nombre", 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('apellido_pa', null, ['placeholder'=>"Apellido_pa", 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('apellido_ma', null, ['placeholder'=>"Apellido_ma", 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('nacimiento', null, ['placeholder'=>"Nacimiento", 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('dni', null, ['placeholder'=>"DNI", 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::email('correo', null, ['placeholder'=>"Correo Electrónico", 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::select('servicio_id', $servicios, old('servicio_id'), ['class' => 'form-control']) !!}
	</div>
{!! Form::close() !!}