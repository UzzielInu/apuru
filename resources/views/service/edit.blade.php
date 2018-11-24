@extends('layouts.app')
@section('content')
{{-- Select2 --}}
<link  href="{{asset('Select2/css/select2.min.css')}}" rel="stylesheet">
<script src="{{asset('Select2/js/select2.min.js')}}"></script>
{{-- ._Select2 --}}
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Editar Servicio o Soporte Nuevo</h3>
      <a href="{{ url('service') }}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($service, ['action' => ['ServiceController@update', $service->id], 'method' => 'PUT']) !!}
    <div class="card-body">
      <div class="form-group row justify-content-center my-5">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" id="nombre" name="nombre" value="{{$service->nombre}}" class="form-control text-center">
        </div>
      </div>
      <div class="form-group row justify-content-center my-5">
        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-10">
          <input type="text" id="descripcion" name="descripcion" value="{{$service->descripcion}}" class="form-control text-center">
        </div>
      </div>
      <div class="form-group row justify-content-center my-5">
        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
        <div class="col-sm-10">
          <select  id="tipo" name="tipo" class="form-control text-center">
            <option value="" hidden>Selecciona Tipo</option>
            <option value="SOPORTE" @if($service->tipo == 'SOPORTE') selected @endif>Soporte</option>
            <option value="SERVICIO" @if($service->tipo == 'SERVICIO') selected @endif>Servicio</option>
          </select>
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

<script type="text/javascript">
$(document).ready(function() {
  $('#tipo').select2({
    placeholder: "Selecciona Tipo",
  });
});
</script>
@endsection
