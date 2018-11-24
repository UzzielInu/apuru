@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Editar Modelo del Dispositivo Nuevo</h3>
      <a href="{{url('modeldevice')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
      {!! Form::model($modeldevice, ['action' => ['ModelDeviceController@update', $modeldevice->id], 'method' => 'PUT']) !!}
    <div class="card-body">
      <div class="form-group row justify-content-center my-5">
        <label for="marca" class="col-sm-2 col-form-label">Marca</label>
        <div class="col-sm-10">
          <input type="text" id="marca" name="marca" value="{{$modeldevice->marca}}" class="form-control text-center" placeholder="Ejemplo: Dell">
        </div>
      </div>
      <div class="form-group row justify-content-center my-5">
        <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
        <div class="col-sm-10">
          <input type="text" id="modelo" name="modelo" value="{{$modeldevice->modelo}}" class="form-control text-center">
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
