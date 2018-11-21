@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}
{{-- Style DT --}}
<style>
   a.navtor:hover {
     background-color: #8d8d8d;
   }
   table.dataTable tbody td {
     vertical-align: middle;
   }
   .dataTables_processing{
     background : rgba(56, 20, 103, 0.81) !important;
     color : #FFFFFF !important;
     z-index: 2;
   }
   .title{
     color: white;
   }
   .thead{
      background : rgba(56, 20, 103, 0.81)
   }
 </style>

{{-- _Style DT --}}
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Tickets</h3>

      <a href="{{url('')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Ticket</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead">
          <tr>
            <th scope="col"  class="title">Observaciones</th>
            <th scope="col"  class="title">Prioridad</th>
            <th scope="col"  class="title">Cliente</th>
            <th scope="col"  class="title">No.Inventario</th>
            <th scope="col"  class="title">Dir. IP</th>
            <th scope="col"  class="title">Dir. Mac</th>
            <th scope="col"  class="title">Observaciones</th>
            <th scope="col"  class="title">Sistema operativo</th>
            <th scope="col"  class="title">Versión</th>
            <th scope="col"  class="title">Tipo</th>
            <th scope="col"  class="title">Antivirus</th>
            <th scope="col"  class="title">Versión</th>
            <th scope="col"  class="title">Modelo</th>
            <th scope="col"  class="title">Extensión</th>
            <th scope="col"  class="title">Correo</th>
            <th scope="col"  class="title">Ubicación</th>
            <th scope="col"  class="title">Categoría</th>
            <th scope="col"  class="title">descripcion</th>
            <th scope="col"  class="title">Tipo</th>
            <th scope="col">Fecha creación</th>
            <th scope="col">Fecha actualización</th>
            <th scope="col" data-priority="1" class="text-white">Acciones</th>
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
  var table = $('#table').DataTable({
    responsive: true,
    fixedHeader: true,
    processing: true,
    serverSide: true,
    dom: "<'row mx-auto'<'col-md-12 mx-auto'B>>"+"<'row text-center'<'col-md-6 text-left'l><'col-md-6'f>>" + 'rt'+"<'row text-center'<'col-md-6 text-left'i><'col-md-6'p>>",
      buttons: [
        {//excel
          text: '<i class="fas fa-file-excel fa-3x"></i>',
          extend: 'excelHtml5',
          fieldSeparator: '\t',
          title : 'Tickets.',
            exportOptions: {
              columns: [ 0, ':visible' ]
            }
        },
        {//csv
          text: '<i class="fas fa-file-csv fa-3x"></i>',
          extend: 'csvHtml5',
          fieldSeparator: '\t',
          title : 'Tickets.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//pdfHtml5
          text: '<i class="fas fa-file-pdf fa-3x"></i>',
          extend: 'pdfHtml5',
          fieldSeparator: '\t',
          title : 'Tickets.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//Print
          text: '<i class="fas fa-print fa-3x"></i>',
          extend: 'print',
          fieldSeparator: '\t',
          title : 'Tickets.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//ColumnVisual
          text: '<i class="fas fa-columns fa-3x"></i>',
          extend: 'colvis',
          fieldSeparator: '\t',
          title : 'Columnas',
        },
    ],
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
      { data: 'device.os.version',              name: 'device.os.version'  },
      { data: 'device.type.nombre',             name: 'device.type.nombre'              },
      { data: 'device.antivirus.nombre',        name: 'device.antivirus.nombre'         },
      { data: 'device.antivirus.version',       name: 'device.antivirus.version'         },
      { data: 'device.modeldevice.marca',       name: 'device.modeldevice.marca'      },
      { data: 'device.householder.correo',      name: 'device.householder.correo'      },
      { data: 'device.householder.extension',   name: 'device.householder.extension'      },
      { data: 'device.location.clave',          name: 'device.location.clave'          },
      { data: 'service.nombre',                 name: 'service.nombre' },
      { data: 'service.descripcion',            name: 'service.descripcion' },
      { data: 'service.tipo'       ,            name: 'service.tipo'        },
      { data: 'created_at',     name: 'created_at'     },
      { data: 'updated_at',     name: 'updated_at'     },
      { data: 'actions',        name: 'actions'        },

    ],
    "language": {
      "url": "{{asset('DataTables/spanish.json')}}"
    },
    "rowCallback": function(row, data, index){
        $(row).find('td:eq(2)').css('background-color', 'rgba(189, 189, 189, 0.75)');
        $(row).find('td:eq(3)').css('background-color', 'rgba(189, 189, 189, 0.75)');
    },
    "fnDrawCallback": function( oSettings ) {
      $('[data-toggle="tooltip"]').tooltip({
        trigger : 'hover',
      });
      $(".dtbutton").click(function() {
        swal({
          title: '¿Está Seguro?',
          text: "El registro de borrará",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#810000',
          cancelButtonColor: '#363636',
          confirmButtonText: 'Borrar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.value) {//after confirn, do the submit
            var sw = $(this).parent().attr('id');
            $('#'+sw).submit();
          }
        })
      });
      $('.dtbutton').on('click', function(){
        console.log('clickeado');
      });
    }
  });

});
 </script>
 {{-- DATATABLES --}}
@endsection