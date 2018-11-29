@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Detalle de {{$ticket->observaciones}}</h3>
      <a href="{{url('/ticket')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    <div class="card-body">
      <div class="form-group row col-md-12 mx-0">
        <label for="observaciones" class="col-md-3 col-form-label">Observaciones </label>
        <input type="text" id="observaciones" name="observaciones" class="form-control col-md-9 text-center" value="{{$ticket->observaciones}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="prioridad" class="col-md-3 col-form-label">Prioridad </label>
        <input type="text" id="prioridad" name="prioridad" class="form-control col-md-9 text-center" value="{{$ticket->prioridad}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="cliente" class="col-md-3 col-form-label">Cliente </label>
        <input type="text" id="cliente" name="cliente" class="form-control col-md-9 text-center" value="{{$ticket->cliente}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0 md-0">
        <input type="text" id="noserie" name="noserie" class="form-control col-md-9 offset-3 text-center" value="No. Serie: {{$ticket->device->noSerie}}" readonly>
        <input type="text" id="noinventario" name="noinventario" class="form-control col-md-9 offset-3 text-center" value="No. Inventario: {{$ticket->device->noInventario}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Direccion IP: {{$ticket->device->dirIp}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Direccion MAC: {{$ticket->device->dirMac}}" readonly>
        <label for="device" class="col-md-3 col-form-label">Dispositivo </label>
        <input type="text" id="device1" name="device" class="form-control col-md-9  text-center" value="Observaciones: {{$ticket->device->observaciones}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Sistema operativo: {{$ticket->device->os->nombre}} {{$ticket->device->os->version}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value=" Tipo: {{$ticket->device->type->nombre}} " readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Antivirus : {{$ticket->device->antivirus->nombre}} {{$ticket->device->antivirus->version}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Modelo : {{$ticket->device->modeldevice->marca}} {{$ticket->device->modeldevice->modelo}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value=" Ubicación: {{$ticket->device->location->clave.' -> '.$ticket->device->location->departamento.' ['.$ticket->device->location->areaTrabajo.']'}} " readonly>
        </div>
        <div class="form-group row col-md-12 mx-0 md-0">
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Encargado : {{$ticket->device->householder->nombre.' '.$ticket->device->householder->paterno.' '.$ticket->device->householder->materno}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Correo : {{$ticket->device->householder->correo}}" readonly>  <label for="o" class="col-md-3 col-form-label col-mb-0">Encargado</label>
        <input type="text" id="device1" name="device" class="form-control col-md-9  text-center" value="Extension : {{$ticket->device->householder->extension}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Ubicación : {{$ticket->device->householder->location->clave.' -> '.$ticket->device->householder->location->departamento.' ['.$ticket->device->householder->location->areaTrabajo.']' }}" readonly>
        </div>
  </div>
    <div class="card-footer text-muted">
      INECOL - 2018
    </div>
  </div>
</div>
@endsection
