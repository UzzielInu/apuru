@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Ubicación Nueva</h3>
      <a href="{{ URL::previous() }}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($location, ['action' => 'LocationController@store']) !!}
    <div class="card-body">
      <div class="row justify-content-center my-2">
        <label for="campus">Campus</label>
        <input type="text" id="campus" name="campus" value="" class="form-control text-center" placeholder="Campus">
      </div>
      <div class="row justify-content-center my-2">
        <label for="edificio">Edificio</label>
        <input type="text" id="edificio" name="edificio" value="" class="form-control text-center" placeholder="Edificio">
      </div>
      <div class="row justify-content-center my-2">
        <label for="departamento">Departamento</label>
        <input type="text" id="departamento" name="departamento" value="" class="form-control text-center" placeholder="Departamento">
      </div>
      <div class="row justify-content-center my-2">
        <label for="nivel">Nivel</label>
        <input type="text" id="nivel" name="nivel" value="" class="form-control text-center" placeholder="Nivel">
      </div>
      <div class="row justify-content-center my-2">
        <label for="areaTrabajo">Área de trabajo</label>
        <input type="text" id="areaTrabajo" name="areaTrabajo" value="" class="form-control text-center" placeholder="área de trabajo">
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
