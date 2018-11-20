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
      <div class="form-group row justify-content-center my-4">
        <label for="campus" class="col-sm-2 col-form-label">Campus</label>
        <div class="col-sm-10">
        <input type="text" id="campus" name="campus" value="" class="form-control text-center" placeholder="Ejemplo: I">
        </div>
      </div>
      <div class="form-group row justify-content-center my-4">
        <label for="edificio" class="col-sm-2 col-form-label">Edificio</label>
        <div class="col-sm-10">
        <input type="text" id="edificio" name="edificio" value="" class="form-control text-center" placeholder="Ejemplo: A">
        </div>
      </div>
      <div class="form-group row justify-content-center my-4">
        <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
        <div class="col-sm-10">
        <input type="text" id="departamento" name="departamento" value="" class="form-control text-center" placeholder="Ejemplo: Coordinación de TIC">
        </div>
      </div>
      <div class="form-group row justify-content-center my-4">
        <label for="nivel" class="col-sm-2 col-form-label">Nivel</label>
        <div class="col-sm-10">
        <input type="text" id="nivel" name="nivel" value="" class="form-control text-center" placeholder="Ejemplo: Planta baja">
        </div>
      </div>
      <div class="form-group row justify-content-center my-4">
        <label for="areaTrabajo" class="col-sm-2 col-form-label">Área de trabajo</label>
        <div class="col-sm-10">
        <input type="text" id="areaTrabajo" name="areaTrabajo" value="" class="form-control text-center" placeholder="Ejemplo: Cubículo">
        </div>
      </div>
      <div class="form-group row justify-content-center my-4">
        <label for="clave" class="col-sm-2 col-form-label">Clave</label>
        <div class="col-sm-10">
        <input type="text" id="clave" name="clave" value="" class="form-control text-center" placeholder="Ejemplo: I-A-PB">
        </div>
      </div>
      <div class="form-group row justify-content-center mt-5">
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
