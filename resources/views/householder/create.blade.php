@extends('layouts.app')
@section('content')
{{-- Select2 --}}
<link  href="{{asset('Select2/css/select2.min.css')}}" rel="stylesheet">
<script src="{{asset('Select2/js/select2.min.js')}}"></script>
{{-- ._Select2 --}}
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Encargado Nuevo</h3>
      <a href="{{ url('householder')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($householder, ['action' => 'HouseHolderController@store']) !!}
    <div class="card-body">
      <div class="form-group row justify-content-center my-3">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre(s)</label>
        <div class="col-sm-10">
          <input type="text" id="nombre" name="nombre" value="" class="form-control text-center" placeholder="Ejemplo: Juan Carlos">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="paterno" class="col-sm-2 col-form-label">Apellido Paterno</label>
        <div class="col-sm-10">
          <input type="text" id="paterno" name="paterno" value="" class="form-control text-center" placeholder="Ejemplo: Hernández">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="materno" class="col-sm-2 col-form-label">Apellido Materno</label>
        <div class="col-sm-10">
          <input type="text" id="materno" name="materno" value="" class="form-control text-center" placeholder="Ejemplo: Pérez">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="extension" class="col-sm-2 col-form-label">Extensión</label>
        <div class="col-sm-10">
          <input type="text" id="extension" name="extension" value="" class="form-control text-center" placeholder="Ejemplo: 3101">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
          <input type="email" id="correo" name="correo" value="" class="form-control text-center" placeholder="Ejemplo: juanito@hotmail.com">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="location_id" class="col-sm-2 col-form-label">Ubicación</label>
        <div class="col-sm-10  text-center">
          <select id="location_id" class="form-control col-sm-12" name="location_id" style="width: 100%">
            <option value="">Ubicación</option>
            @foreach ($locations as $item)
              <option value="{{$item->id}}">{{$item->clave}} -> {{$item->departamento}} [{{$item->areaTrabajo}}]</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row justify-content-center my-4">
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
  $('#operative_system_id').select2({
    placeholder: "Sistema Operativo",
  });
  $('#type_id').select2({
    placeholder: "Tipo de Dispositivo",
  });
  $('#antivirus_id').select2({
    placeholder: "Antivirus",
  });
  $('#model_device_id').select2({
    placeholder: "Modelo de Dispositivo",
  });
  $('#house_holder_id').select2({
    placeholder: "Encargado de Dispositivo",
  });
  $('#location_id').select2({
    placeholder: "Ubicación de Dispositivo",
  });
});
</script>
@endsection
