@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Tickets</h3>

      <a href="{{url('')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Ticket</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Observaciones</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Cliente</th>
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
            <th scope="col" class="title">Nombre</th>
            <th scope="col" class="title">descripcion</th>
            <th scope="col" class="title">Tipo</th>

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
    ajax: '{{ url('/getticket') }}',
    columns: [
      { data: 'observaciones',  name: 'observaciones'  },
      { data: 'prioridad',      name: 'prioridad'      },
      { data: 'cliente',        name: 'cliente'        },
      { data: 'device.noSerie',                 name: 'device.noSerie'              },
      { data: 'device.dirIp',                   name: 'device.dirIp'                },
      { data: 'device.dirMac',                  name: 'device.dirMac'               },
      { data: 'device.observaciones',           name: 'device.observaciones'        },
      { data: 'device.operative_system_id',     name: 'device.operative_system_id'  },
      { data: 'device.type_id',                 name: 'device.type_id'              },
      { data: 'device.antivirus_id',            name: 'device.antivirus_id'         },
      { data: 'device.model_device_id',         name: 'device.model_device_id'      },
      { data: 'device.house_holder_id',         name: 'device.house_holder_id'      },
      { data: 'device.location_id',             name: 'device.location_id'          },
      { data: 'service.nombre',                 name: 'service.nombre' },
      { data: 'service.descripcion',            name: 'service.descripcion' },
      { data: 'service.tipo'       ,            name: 'service.tipo'        },


      { data: 'created_at',     name: 'created_at'     },
      { data: 'updated_at',     name: 'updated_at'     },
      { data: 'actions',        name: 'actions'        },

    ]
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
