@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Modelo del Dispositivo Nuevo</h3>
      <a href="{{ URL::previous() }}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($modeldevice, ['action' => 'ModelDeviceController@store']) !!}
    <div class="card-body">
      <div class="row justify-content-center my-2">
        <label for="marca">Marca </label>
        <input type="text" id="marca" name="marca" value="" class="form-control text-center" placeholder="Marca del Dispositivo">
      </div>
      <div class="row justify-content-center my-2">
        <label for="modelo">Modelo </label>
        <input type="text" id="modelo" name="modelo" value="" class="form-control text-center" placeholder="Modelo del Dispositivo">
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
