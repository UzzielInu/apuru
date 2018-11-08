@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Editar Servicio o Soporte Nuevo</h3>
      <a href="{{ url('service') }}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($service, ['action' => ['ServiceController@update', $service->id], 'method' => 'PUT']) !!}
    <div class="card-body">
      <div class="row justify-content-center my-2">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{$service->nombre}}" class="form-control text-center" placeholder="Nombre del Servicio o Soporte">
      </div>
      <div class="row justify-content-center my-2">
        <label for="descripcion">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" value="{{$service->descripcion}}" class="form-control text-center" placeholder="Descripcion del Servicio o Soporte">
      </div>
      <div class="row justify-content-center my-2">
        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name="tipo" value="{{$service->tipo}}" class="form-control text-center" placeholder="Servicio o Soporte">
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
