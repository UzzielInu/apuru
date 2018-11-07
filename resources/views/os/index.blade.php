@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Sistemas Operativos</h3>

      <a href="{{url('os/create')}}" role="button" name="button" class="btn btn-success col-md-2 float-right">Registrar Sistema Operativo</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Versión</th>
            <th scope="col">Fecha creación</th>
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
    processing: true,
    serverSide: true,
    ajax: '{{ url('/getos') }}',
    columns: [
      { data: 'nombre', name: 'nombre' },
      { data: 'version', name: 'version' },
      { data: 'created_at', name: 'created_at' },
      { data: 'actions', name: 'actions' },
    ]
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
