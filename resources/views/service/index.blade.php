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
 </style>

{{-- _Style DT --}}

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
    dom: "<'row mx-auto'<'col-md-12 mx-auto'B>>"+"<'row text-center'<'col-md-6 text-left'l><'col-md-6'f>>" + 'rt'+"<'row text-center'<'col-md-6 text-left'i><'col-md-6'p>>",
      buttons: [
        {//excel
          text: '<i class="fas fa-file-excel fa-3x"></i>',
          extend: 'excelHtml5',
          fieldSeparator: '\t',
          title : 'Servicios',
            exportOptions: {
              columns: [ 0, ':visible' ]
            }
        },
        {//csv
          text: '<i class="fas fa-file-csv fa-3x"></i>',
          extend: 'csvHtml5',
          fieldSeparator: '\t',
          title : 'Servicios',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//pdfHtml5
            text: '<i class="fas fa-file-pdf fa-3x"></i>',
          extend: 'pdfHtml5',
          fieldSeparator: '\t',
          title : 'Servicios',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//Print
          text: '<i class="fas fa-print fa-3x"></i>',
          extend: 'print',
          fieldSeparator: '\t',
          title : 'Servicios',
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
    ajax: '{{ url('/getservice') }}',
    columns: [
      { data: 'nombre', name: 'nombre' },
      { data: 'descripcion', name: 'descripcion' },
      { data: 'tipo'       , name: 'tipo'        },
      { data: 'created_at', name: 'created_at' },
      { data: 'updated_at', name: 'updated_at' },
      { data: 'actions', name: 'actions' },
    ],
    "language": {
      "url": "{{asset('DataTables/spanish.json')}}"
    },
    "rowCallback": function(row, data, index){
        $(row).find('td:eq(3)').addClass('bg-secondary');
        $(row).find('td:eq(4)').addClass('bg-secondary');
    }
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
