@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Edita Ubicación</h3>
      <a href="{{url('location')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($location, ['action' => ['LocationController@update', $location->id], 'method' => 'PUT']) !!}
    <div class="card-body">
      <div class="form-group row justify-content-center my-2">
        <label for="campus" class="col-sm-2 col-form-label">Campus</label>
        <div class="col-sm-10">
        <input type="text" id="campus" name="campus" value="{{$location->campus}}" class="form-control text-center" placeholder="Campus">
        </div>
      </div>
      <div class="form-group row justify-content-center my-2">
        <label for="edificio" class="col-sm-2 col-form-label">Edificio</label>
        <div class="col-sm-10">
        <input type="text" id="edificio" name="edificio" value="{{$location->edificio}}" class="form-control text-center" placeholder="Edificio">
        </div>
      </div>
      <div class="form-group row justify-content-center my-2">
        <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
        <div class="col-sm-10">
        <input type="text" id="departamento" name="departamento" value="{{$location->departamento}}" class="form-control text-center" placeholder="Departamento">
        </div>
      </div>
      <div class="form-group row justify-content-center my-2">
        <label for="nivel" class="col-sm-2 col-form-label">Nivel</label>
        <div class="col-sm-10">
        <input type="text" id="nivel" name="nivel" value="{{$location->nivel}}" class="form-control text-center" placeholder="Nivel">
        </div>
      </div>
      <div class="form-group row justify-content-center my-2">
        <label for="areaTrabajo" class="col-sm-2 col-form-label">Área de trabajo</label>
        <div class="col-sm-10">
        <input type="text" id="areaTrabajo" name="areaTrabajo" value="{{$location->areaTrabajo}}" class="form-control text-center" placeholder="área de trabajo">
        </div>
      </div>
      <div class="form-group row justify-content-center my-4">
        <label for="clave" class="col-sm-2 col-form-label">Clave</label>
        <div class="col-sm-10">
        <input type="text" id="clave" name="clave" value="{{$location->clave}}" class="form-control text-center">
        </div>
      </div>
      <div class="form-group row justify-content-center mt-4">
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
