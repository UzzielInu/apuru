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
        <label for="o" class="col-md-3 col-form-label">Dispositivo </label>
        <input type="text" id="noserie" name="noserie" class="form-control col-md-9 offset-3 text-center" value="No. Serie: {{$ticket->device->noSerie}}" readonly>
        <input type="text" id="noinventario" name="noinventario" class="form-control col-md-9 offset-3 text-center" value="No. Inventario: {{$ticket->device->noInventario}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Direccion IP: {{$ticket->device->dirIp}}" readonly>
        <input type="text" id="device1" name="device" class="form-control col-md-9 offset-3 text-center" value="Direccion MAC: {{$ticket->device->dirMac}}" readonly>
        {{-- <input type="text" id="location2" name="location" class="form-control col-md-9 offset-3 text-center" value="Edificio : {{$ticket->location->edificio}}" readonly>
        <label for="location" class="col-md-3 col-form-label">Ubicación </label><input type="text" id="location" name="location" class="form-control col-md-9 text-center" value="Departamento : {{$ticket->location->departamento}}" readonly>
        <input type="text" id="location" name="location" class="form-control col-md-9 offset-3 text-center" value="Nivel : {{$ticket->location->nivel}}" readonly>
        <input type="text" id="location3" name="location" class="form-control col-md-9 offset-3 text-center" value="Área : {{$ticket->location->areaTrabajo}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Fecha registro </label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$ticket->created_at}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="updated" class="col-md-3 col-form-label">Última actualización</label>
        <input type="text" id="updated" name="updated" class="form-control col-md-9 text-center" value="{{$ticket->updated_at}}" readonly> --}}
      </div>
  </div>
    <div class="card-footer text-muted">
      INECOL - 2018
    </div>
  </div>
</div>
@endsection
