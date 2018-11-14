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
      <h3 class="float-left">Ubicaciones</h3>

      <a href="{{url('location/create')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Ubicacion</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead">
          <tr>
            <th scope="col" class="title">Campus</th>
            <th scope="col" class="title">Edificio</th>
            <th scope="col" class="title">Departamento</th>
            <th scope="col" class="title">Nivel</th>
            <th scope="col" class="title">Área de trabajo</th>
            <th scope="col" class="title">clave</th>
            <th scope="col" class="title">Fecha creación</th>
            <th scope="col" class="title">Fecha actualización</th>
            <th scope="col" class="title">Acciones</th>
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
    dom: "<'row mx-auto'<'col-md-12 mx-auto'B>>"+"<'row text-center'<'col-md-6 text-left'l><'col-md-6'f>>" + 'rt'+"<'row text-center'<'col-md-6 text-left'i><'col-md-6'p>>",
      buttons: [
        {//excel
          text: '<i class="fas fa-file-excel fa-3x"></i>',
          extend: 'excelHtml5',
          fieldSeparator: '\t',
          title : 'Ubicacion',
            exportOptions: {
              columns: [ 0, ':visible' ]
            }
        },
        {//csv
          text: '<i class="fas fa-file-csv fa-3x"></i>',
          extend: 'csvHtml5',
          fieldSeparator: '\t',
          title : 'Ubicacion',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//pdfHtml5
          text: '<i class="fas fa-file-pdf fa-3x"></i>',
          extend: 'pdfHtml5',
          fieldSeparator: '\t',
          title : 'Ubicacion',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//Print
          text: '<i class="fas fa-print fa-3x"></i>',
          extend: 'print',
          fieldSeparator: '\t',
          title : 'Ubicacion',
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
    ajax: '{{ url('/getlocation') }}',
    columns: [
      { data: 'campus',       name: 'campus'       },
      { data: 'edificio',     name: 'edificio'     },
      { data: 'departamento', name: 'departamento' },
      { data: 'nivel',        name: 'nivel'        },
      { data: 'areaTrabajo',  name: 'areaTrabajo'  },
      { data: 'clave',  name: 'clave'  },
      { data: 'created_at',   name: 'created_at'   },
      { data: 'updated_at',   name: 'updated_at'   },
      { data: 'actions',      name: 'actions'      },
    ],
    "language": {
      "url": "{{asset('DataTables/spanish.json')}}"
    },
    "rowCallback": function(row, data, index){
        $(row).find('td:eq(6)').css('background-color', 'rgba(189, 189, 189, 0.75)');
        $(row).find('td:eq(7)').css('background-color', 'rgba(189, 189, 189, 0.75)');
    }
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
