@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Usuario Nuevo</h3>
      <a href="{{url('users')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($user, ['action' => 'UserController@store']) !!}
    <div class="card-body">
      <div class="form-group row my-4">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control text-center" id="name" placeholder="Ejemplo : Juan Hernández Rodríguez" required>
        </div>
      </div>
      <div class="form-group row my-4">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control text-center" id="email" placeholder="Ejemplo : juanito@hotmail.com" required>
        </div>
      </div>
      <div class="form-group row my-4">
        <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control text-center" id="password" placeholder="Contraseña" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="password-confirm" class="col-md-2 col-form-label">Confirmar Contraseña</label>
        <div class="col-sm-10">
            <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" placeholder="Confirmar Contraseña" required>
        </div>
      </div>
      <div class="row justify-content-center mt-4">
        <button type="submit" name="button" class="btn btn-success btn-block col-md-3"><i class="fas fa-save fa-fw fa-lg"></i> Guardar</button>
      </div>
    </div>
    {!! Form::close() !!}
    <div class="card-footer text-muted">
      INECOL - 2018
    </div>
  </div>
</div>
@endsection
