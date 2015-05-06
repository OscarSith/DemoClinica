@extends('layout.master_welcome')

@section('content')
<body class="register-page">
  <div class="register-box">
<div class="register-logo">
  <a href="{{ url('login') }}"><b>Admin</b>Clinica</a>
</div>

<div class="register-box-body">
  <p class="login-box-msg">Register a new membership</p>
  {!! Form::open(['route' => 'register', 'method' => 'post']) !!}
    @include('partials.show_errors')
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
    @endif
    <div class="form-group has-feedback">
      {!! Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) !!}
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      {!! Form::text('apellido_pa', null, ['placeholder' => 'Appelido Paterno', 'class' => 'form-control']) !!}
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      {!! Form::text('apellido_ma', null, ['placeholder' => 'Apellido Materno', 'class' => 'form-control']) !!}
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      {!! Form::text('login', null, ['placeholder' => 'Login', 'class' => 'form-control']) !!}
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      {!! Form::email('correo', null, ['placeholder' => 'Correo electrónico', 'class' => 'form-control']) !!}
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      {!! Form::text('dni', null, ['placeholder' => 'DNI', 'class' => 'form-control']) !!}
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      {!! Form::text('nacimiento', null, ['placeholder' => 'Nacimiento', 'class' => 'form-control', 'id' => 'nacimiento', 'data-inputmask' => "'alias': 'yyyy/mm/dd'"]) !!}
      <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" name="password" class="form-control" placeholder="Contraseña"/>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group">
      {!! Form::select('cargo_id', $cargos, old('cargo_id'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::select('rol_id', $roles, old('rol_id'), ['class' => 'form-control']) !!}
    </div>
    <!--<div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Retype password"/>
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>-->
    <div class="row">
      <div class="col-sm-8">
        <a href="{{ url('login') }}">I already have a membership</a>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
      </div><!-- /.col -->
    </div>
{!! Form::close() !!}
</div><!-- /.form-box -->
@stop
@section('inputmask')
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
  <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
  <script>
  $(function(){
    $("#nacimiento").inputmask();
  });
  </script>
@stop