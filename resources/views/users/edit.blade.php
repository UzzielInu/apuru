@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Editar Usuario</h3>
      <a href="{{url('users')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($user, ['action' => ['UserController@update', $user->id], 'method' => 'PUT']) !!}
    <div class="card-body">
      <div class="form-group row my-4">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control text-center" id="name" value="{{$user->name}}" required>
        </div>
      </div>
      <div class="form-group row my-4">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control text-center" id="email" value="{{$user->email}}" required>
        </div>
      </div>
      <div class="form-group row my-4">
        <label for="password" class="col-sm-2 col-form-label">Cambiar Contraseña</label>
        <div class="col-sm-10">
          <button type="button" name="button" class="btn btn-danger btn-block">Cambiar contraseña</button>
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
