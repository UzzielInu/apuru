@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Dispositivo</h3>

      <a href="{{url('')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Dispositivo </a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No.Inventario</th>
            <th scope="col">Dir. IP</th>
            <th scope="col">Dir. Mac</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Sistema operativo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Antivirus</th>
            <th scope="col">Modelo</th>
            <th scope="col">Encargado</th>
            <th scope="col">Ubicación</th>
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
    ajax: '{{ url('/getdevice') }}',
    columns: [
      { data: 'noSerie',                 name: 'noSerie'              },
      { data: 'dirIp',                   name: 'dirIp'                },
      { data: 'dirMAc',                  name: 'dirMAc'               },
      { data: 'observaciones',           name: 'observaciones'        },
      { data: 'operative_system_id',     name: 'operative_system_id'  },
      { data: 'type_id',                 name: 'type_id'              },
      { data: 'antivirus_id',            name: 'antivirus_id'         },
      { data: 'model_device_id',         name: 'model_device_id'      },
      { data: 'house_holder_id',         name: 'house_holder_id'      },
      { data: 'location_id',             name: 'location_id'          },
      { data: 'created_at',              name: 'created_at'           },
      { data: 'updated_at',              name: 'updated_at'           },
      { data: 'actions',                 name: 'actions'              },
    ]
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
