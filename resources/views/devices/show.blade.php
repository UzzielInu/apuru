@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Detalle de {{$householder->nombre.' '.$householder->paterno.' '.$householder->materno}}</h3>
      <a href="{{url('/device')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    <div class="card-body">
      <div class="form-group row col-md-12 mx-0">
        <label for="name" class="col-md-3 col-form-label">Nombre </label>
        <input type="text" id="name" name="name" class="form-control col-md-9 text-center" value="{{$householder->nombre.' '.$householder->paterno.' '.$householder->materno}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="extension" class="col-md-3 col-form-label">Extensión </label>
        <input type="text" id="extension" name="extension" class="form-control col-md-9 text-center" value="{{$householder->extension}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="email" class="col-md-3 col-form-label">Correo </label>
        <input type="text" id="email" name="email" class="form-control col-md-9 text-center" value="{{$householder->correo}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <input type="text" id="location1" name="location" class="form-control col-md-9 offset-3 text-center" value="Campus : {{$householder->location->campus}}" readonly>
        <input type="text" id="location2" name="location" class="form-control col-md-9 offset-3 text-center" value="Edificio : {{$householder->location->edificio}}" readonly>
        <label for="location" class="col-md-3 col-form-label">Ubicación </label><input type="text" id="location" name="location" class="form-control col-md-9 text-center" value="Departamento : {{$householder->location->departamento}}" readonly>
        <input type="text" id="location" name="location" class="form-control col-md-9 offset-3 text-center" value="Nivel : {{$householder->location->nivel}}" readonly>
        <input type="text" id="location3" name="location" class="form-control col-md-9 offset-3 text-center" value="Área : {{$householder->location->areaTrabajo}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="created" class="col-md-3 col-form-label">Fecha registro </label>
        <input type="text" id="created" name="created" class="form-control col-md-9 text-center" value="{{$householder->created_at}}" readonly>
      </div>
      <div class="form-group row col-md-12 mx-0">
        <label for="updated" class="col-md-3 col-form-label">Última actualización</label>
        <input type="text" id="updated" name="updated" class="form-control col-md-9 text-center" value="{{$householder->updated_at}}" readonly>
      </div>
    </div>
    <div class="card-footer text-muted">
      INECOL - 2018
    </div>
  </div>
</div>
@endsection
