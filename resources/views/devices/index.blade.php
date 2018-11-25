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
      background : rgba(56, 20, 103, 0.81);
   }
 </style>

{{-- _Style DT --}}
<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Dispositivo</h3>

      <a href="{{url('device/create')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Dispositivo </a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead">
          <tr>
            <th scope="col" class="title">No.Inventario</th>
            <th scope="col" class="title">Dir. IP</th>
            <th scope="col" class="title">Dir. Mac</th>
            <th scope="col" class="title">Observaciones</th>
            <th scope="col" class="title">Sistema operativo</th>
            <th scope="col" class="title">Tipo</th>
            <th scope="col" class="title">Antivirus</th>
            <th scope="col" class="title">Modelo</th>
            <th scope="col" class="title">Encargado</th>
            <th scope="col" class="title">Ubicación</th>
            <th scope="col" class="title">Fecha creación</th>
            <th scope="col" class="title">Fecha actualización</th>
            <th scope="col" data-priority="1" class="title">Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
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
          text: '<i class="fas fa-file-excel fa-3x" data-toggle="tooltip" data-placement="top" title="Excel"></i>',
          extend: 'excelHtml5',
          fieldSeparator: '\t',
          title : 'Dispostivos.',
            exportOptions: {
              columns: [ 0, ':visible' ]
            }
        },
        {//csv
          text: '<i class="fas fa-file-csv fa-3x" data-toggle="tooltip" data-placement="top" title="CSV"></i>',
          extend: 'csvHtml5',
          fieldSeparator: '\t',
          title : 'Dispostivos.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//pdfHtml5
          text: '<i class="fas fa-file-pdf fa-3x" data-toggle="tooltip" data-placement="top" title="PDF"></i>',
          extend: 'pdfHtml5',
          fieldSeparator: '\t',
          title : 'Dispostivos.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//Print
          text: '<i class="fas fa-print fa-3x" data-toggle="tooltip" data-placement="top" title="Imprimir"></i>',
          extend: 'print',
          fieldSeparator: '\t',
          title : 'Dispostivos.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//ColumnVisual
          text: '<i class="fas fa-columns fa-3x" data-toggle="tooltip" data-placement="top" title="Mostrar/Ocultar columnas"></i>',
          extend: 'colvis',
          fieldSeparator: '\t',
          title : 'Columnas',
        },
    ],
    ajax: '{{ url('/getdevice') }}',
    columns: [
      { data: 'noSerie',                 name: 'noSerie'              },
      { data: 'dirIp',                   name: 'dirIp'                },
      { data: 'dirMAc',                  name: 'dirMAc'               },
      { data: 'observaciones',           name: 'observaciones'        },
      { data: 'os.nombre',               name: 'operative_system_id'  },
      { data: 'type.nombre',                 name: 'type_id'              },
      { data: 'antivirus.nombre',        name: 'antivirus_id'         },
      { data: 'model_device.marca',     name: 'model_device_id'      },
      { data: 'householder.nombre',         name: 'house_holder_id'      },
      { data: 'location.clave',             name: 'location_id'          },
      { data: 'created_at',              name: 'created_at'           },
      { data: 'updated_at',              name: 'updated_at'           },
      { data: 'actions',                 name: 'actions'              },
    ],
    "language": {
      "url": "{{asset('DataTables/spanish.json')}}"
    },
    "rowCallback": function(row, data, index){
        $(row).find('td:eq(10)').css('background-color', 'rgba(189, 189, 189, 0.75)');
        $(row).find('td:eq(11)').css('background-color', 'rgba(189, 189, 189, 0.75)');
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
    }
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
