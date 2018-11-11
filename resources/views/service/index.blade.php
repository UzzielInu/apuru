@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Servicios y Soportes</h3>

      <a href="{{url('service/create')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Servicio/Soporte</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">descripcion</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fecha creación</th>
            <th scope="col">Fecha actualización</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        {{-- <tbody>
        </tbody> --}}
      </table>
    </div>
    <div class="card-footer text-muted">
      INECOL - 2018
    </div>
  </div>
</div>

{{-- DATATABLES --}}
<script>
$(function() {
  $('#table').DataTable({
    responsive: true,
    fixedHeader: true,
    processing: true,
    serverSide: true,
    ajax: '{{ url('/getservice') }}',
    columns: [
      { data: 'nombre', name: 'nombre' },
      { data: 'descripcion', name: 'descripcion' },
      { data: 'tipo'       , name: 'tipo'        },
      { data: 'created_at', name: 'created_at' },
      { data: 'updated_at', name: 'updated_at' },
      { data: 'actions', name: 'actions' },
    ]
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
