@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Detalle de item {{$device->noSerie}}</h3>
      <a href="{{url('/device')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    <div class="card-body">
      <div class="form-group row col-md-12 mx-0">
        <label for="name" class="col-md-3 col-form-label">Número Serie</label>
        <input type="text" id="name" name="name" class="form-control col-md-9 text-center" value="{{$device->noSerie}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="extension" class="col-md-3 col-form-label">Número Inventario</label>
        <input type="text" id="extension" name="extension" class="form-control col-md-9 text-center" value="{{$device->noInventario}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Tipo</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->type->nombre}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Modelo</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->modelDevice->marca}} , {{$device->modelDevice->modelo}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="email" class="col-md-3 col-form-label">Dirección Ip</label>
        <input type="text" id="email" name="email" class="form-control col-md-9 text-center" value="{{$device->dirIp}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Dirección Mac</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->dirMac}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Sistema Operativo</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->os->nombre}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Antivirus</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->antivirus->nombre}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Encargado</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->householder->nombre}} {{$device->householder->paterno}} {{$device->householder->materno}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Ubicación</label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$device->location->clave}} -> {{$device->location->departamento}} [{{$device->location->areaTrabajo}}]" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="updated" class="col-md-3 col-form-label">Observaciones</label>
        <input type="text" id="updated" name="updated" class="form-control col-md-9 text-center" value="{{$device->observaciones}}" readonly>
      </div>
    </div>
    <div class="card-footer text-muted">
      INECOL - 2018
    </div>
  </div>
</div>
@endsection
