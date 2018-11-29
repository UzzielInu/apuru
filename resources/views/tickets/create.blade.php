@extends('layouts.app')
@section('content')
{{-- Select2 --}}
<link  href="{{asset('Select2/css/select2.min.css')}}" rel="stylesheet">
<script src="{{asset('Select2/js/select2.min.js')}}"></script>
{{-- ._Select2 --}}
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Registrar Ticket Nuevo</h3>
      <a href="{{ url('ticket')}}" role="button" name="button" class="btn btn-success col-md-2 float-right"><i class="fas fa-chevron-left fa-fw fa-lg"></i> Regresar</a>
    </div>
    {!! Form::model($ticket, ['action' => 'TicketController@store']) !!}
    <div class="card-body">
      <div class="form-group row justify-content-center my-3">
        <label for="cliente" class="col-sm-2 col-form-label">Cliente</label>
        <div class="col-sm-10">
          <input type="text" id="cliente" name="cliente" value="{{$ticket->cliente}}" class="form-control text-center">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="prioridad" class="col-sm-2 col-form-label">Prioridad</label>
        <div class="col-sm-10">
          <input type="text" id="prioridad" name="prioridad" value="{{$ticket->prioridad}}" class="form-control text-center">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="estado" class="col-sm-2 col-form-label"> Estado</label>
        <div class="col-sm-10">
          <input type="text" id="estado" name="estado" value="{{$ticket->estado}}" class="form-control text-center">
        </div>
      </div>
      <div class="form-group row justify-content-center my-3">
        <label for="device_id" class="col-sm-2 col-form-label">Dispositivo</label>
        <div class="col-sm-10  text-center">
          <select id="device_id" class="form-control col-sm-12" name="device_id" style="width: 100%">
            <option value="">Dispositivo</option>
            @foreach ($devices as $item)
              <option value="{{$item->id}}"> {{$item->noSerie}} -> {{$item->type->nombre}} </option>
            @endforeach
          </select>
         </div>
        </div>
        <div class="form-group row justify-content-center my-3">
          <label for="service_id" class="col-sm-2 col-form-label">Servicio</label>
          <div class="col-sm-10  text-center">
            <select id="service_id" class="form-control col-sm-12" name="service_id" style="width: 100%">
              <option value="">Servicio</option>
              @foreach ($services as $item)
                <option value="{{$item->id}}"> {{$item->nombre}} -> {{$item->tipo}}</option>
              @endforeach
            </select>
           </div>
        </div>
        <div class="form-group row justify-content-center my-3">
          <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
          <div class="col-sm-10  text-center">
            <textarea name="observaciones" rows="5" cols="80" class="form-control">{{$ticket->observaciones}}</textarea>
          </div>
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
  $('#device_id').select2({
    placeholder: "Dispositivo",
  });
  $('#service_id').select2({
    placeholder: "Servicio",
  });
});
</script>
@endsection
