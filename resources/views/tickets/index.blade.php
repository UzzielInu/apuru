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
            <th scope="col"  class="title">Observaciones</th>
            <th scope="col"  class="title">Prioridad</th>
            <th scope="col"  class="title">Cliente</th>
            <th scope="col"  class="title">No.Inventario</th>
            <th scope="col"  class="title">Dir. IP</th>
            <th scope="col"  class="title">Dir. Mac</th>
            <th scope="col"  class="title">Observaciones</th>
            <th scope="col"  class="title">Sistema operativo</th>
            <th scope="col"  class="title">Tipo</th>
            <th scope="col"  class="title">Antivirus</th>
            <th scope="col"  class="title">Modelo</th>
            <th scope="col"  class="title">Encargado</th>
            <th scope="col"  class="title">Ubicación</th>
            <th scope="col"  class="title">Nombre</th>
            <th scope="col"  class="title">descripcion</th>
            <th scope="col"  class="title">Tipo</th>

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
      { data: 'observaciones',                  name: 'observaciones'  },
      { data: 'prioridad',                      name: 'prioridad'      },
      { data: 'cliente',                        name: 'cliente'        },
      { data: 'device.noSerie',                 name: 'device.noSerie'              },
      { data: 'device.dirIp',                   name: 'device.dirIp'                },
      { data: 'device.dirMac',                  name: 'device.dirMac'               },
      { data: 'device.observaciones',           name: 'device.observaciones'        },
      { data: 'device.os.nombre',               name: 'device.os.nombre'  },
      { data: 'device.type.nombre',             name: 'device.type.nombre'              },
      { data: 'device.antivirus.nombre',            name: 'device.antivirus.nombre'         },
      { data: 'device.modeldevice.marca',       name: 'device.modeldevice.marca'      },
      { data: 'device.householder.nombre',      name: 'device.householder.nombre'      },
      { data: 'device.location.clave',          name: 'device.location.clave'          },
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
