@extends('layouts.app')
@section('content')
{{-- Select2 --}}
<link  href="{{asset('Select2/css/select2.min.css')}}" rel="stylesheet">
<script src="{{asset('Select2/js/select2.min.js')}}"></script>
{{-- ._Select2 --}}
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Dispositivo Nuevo</h3>
      <a href="{{ url('device')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($device, ['action' => 'DevicesController@store']) !!}
    <div class="card-body">
      <div class="form-group row justify-content-center my-3">
        <label for="noSerie" class="col-sm-2 col-form-label">Número de serie</label>
        <div class="col-sm-10">
          <input type="text" id="noSerie" name="noSerie" value="" class="form-control text-center" placeholder="Ejemplo: FE6S34 " required pattern="[a-zA-Z0-9]{3,50}" maxlength="25" autofocus autocomplete="off">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="noInventario" class="col-sm-2 col-form-label">Número de inventario</label>
        <div class="col-sm-10">
          <input type="text" id="noInventario" name="noInventario" value="" class="form-control text-center" placeholder="Ejemplo:25633 " required pattern="[0-9]{5,10}" maxlength="10" autofocus autocomplete="off">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="dirIp" class="col-sm-2 col-form-label">Dirección IP</label>
        <div class="col-sm-10">
          <input type="text" id="dirIp" name="dirIp" value="" class="form-control text-center" placeholder="Ejemplo: 192.168.1.100" required pattern="^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$" maxlength="15"  autofocus autocomplete="off">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="dirMac" class="col-sm-2 col-form-label">Dirección MAC</label>
        <div class="col-sm-10">
          <input type="text" id="dirMac" name="dirMac" value="" class="form-control text-center" placeholder="Ejemplo: 00:17:4F:08:5F:69" required pattern="^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$" maxlength="18" autofocus autocomplete="off">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="operative_system_id" class="col-sm-2 col-form-label">Sistema Operativo</label>
        <div class="col-sm-10  text-center">
          <select id="operative_system_id" class="form-control col-sm-12" name="operative_system_id" style="width: 100%">
            <option value="" >Sistema Operativo</option>
            @foreach ($oss as $item)
              <option value="{{$item->id}}">{{$item->nombre}} - {{$item->version}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="type_id" class="col-sm-2 col-form-label">Dispositivo</label>
        <div class="col-sm-10  text-center">
          <select id="type_id" class="form-control col-sm-12" name="type_id" style="width: 100%">
            <option value="">Tipo de Dispositivo</option>
            @foreach ($types as $item)
              <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="antivirus_id" class="col-sm-2 col-form-label">Antivirus</label>
        <div class="col-sm-10  text-center">
          <select id="antivirus_id" class="form-control col-sm-12" name="antivirus_id" style="width: 100%">
            <option value="">Antivirus</option>
            @foreach ($antivirus as $item)
              <option value="{{$item->id}}">{{$item->nombre}} - {{$item->version}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="model_device_id" class="col-sm-2 col-form-label">Modelo</label>
        <div class="col-sm-10  text-center">
          <select id="model_device_id" class="form-control col-sm-12" name="model_device_id" style="width: 100%">
            <option value="">Modelo de Dispositivo</option>
            @foreach ($models as $item)
              <option value="{{$item->id}}">{{$item->marca}} - {{$item->modelo}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="house_holder_id" class="col-sm-2 col-form-label">Encargado</label>
        <div class="col-sm-10  text-center">
          <select id="house_holder_id" class="form-control col-sm-12" name="house_holder_id" style="width: 100%">
            <option value="">Encargado de Dispositivo</option>
            @foreach ($householders as $item)
              <option value="{{$item->id}}">{{$item->nombre}} {{$item->paterno}} {{$item->materno}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="location_id" class="col-sm-2 col-form-label">Ubicación</label>
        <div class="col-sm-10  text-center">
          <select id="location_id" class="form-control col-sm-12" name="location_id" style="width: 100%">
            <option value="">Ubicación de Dispositivo</option>
            @foreach ($locations as $item)
              <option value="{{$item->id}}">{{$item->clave}} -> {{$item->departamento}} [{{$item->areaTrabajo}}]</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
        <div class="col-sm-10  text-center">
          <textarea name="observaciones" rows="5" cols="80" class="form-control" required>Sin observaciones</textarea>
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
