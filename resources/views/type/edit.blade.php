@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Editar Sistema Operativo</h3>
      <a href="{{url('type')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($type, ['action' => ['TypeController@update', $type->id], 'method' => 'PUT']) !!}
    <div class="card-body">
      <div class="row justify-content-center my-2">
        <label for="nombre">Tipo de hardware</label>
        <input type="text" id="nombre" name="nombre" value="{{$type->nombre}}" class="form-control text-center" placeholder="Tipo de hardware">
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
