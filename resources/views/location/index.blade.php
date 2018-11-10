@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Ubicaciones</h3>

      <a href="{{url('location/create')}}" role="button" name="button" class="btn btn-success col-md-2 float-right">Registrar Ubicacion</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Campus</th>
            <th scope="col">Edificio</th>
            <th scope="col">Departamento</th>
            <th scope="col">Nivel</th>
            <th scope="col">Área de trabajo</th>
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
    processing: true,
    serverSide: true,
    ajax: '{{ url('/getlocation') }}',
    columns: [
      { data: 'campus',       name: 'campus'       },
      { data: 'edificio',     name: 'edificio'     },
      { data: 'departamento', name: 'departamento' },
      { data: 'nivel',        name: 'nivel'        },
      { data: 'areaTrabajo',  name: 'areaTrabajo'  },
      { data: 'created_at',   name: 'created_at'   },
      { data: 'updated_at',   name: 'updated_at'   },
      { data: 'actions',      name: 'actions'      },
    ]
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
