@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Antivirus Nuevo</h3>
      <a href="{{ url('antivirus')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($antivirus, ['action' => 'AntivirusController@store']) !!}
    <div class="card-body">
      <div class="row justify-content-center my-2">
        <label for="nombre">Nombre Antivirus</label>
        <input type="text" id="nombre" name="nombre" value="" class="form-control text-center" placeholder="Antivirus">
      </div>
      <div class="row justify-content-center my-2">
        <label for="version">Versión Antivirus</label>
        <input type="text" id="version" name="version" value="" class="form-control text-center" placeholder="Versión de Antivirus">
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
