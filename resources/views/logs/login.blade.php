
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
      <h3 class="float-left">Bitácora de Inicios de Sesión</h3>
    </div>
    <div class="card-body">
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead">
          <tr>
            <th scope="col" class="title">Usuario</th>
            <th scope="col" class="title">Tipo</th>
            <th scope="col" class="title">Fecha</th>
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
          text: '<i class="fas fa-file-excel fa-3x"  data-toggle="tooltip" data-placement="top" title="Excel"></i>',
          extend: 'excelHtml5',
          fieldSeparator: '\t',
          title : 'Bitácora Inicios Sesión.',
            exportOptions: {
              columns: [ 0, ':visible' ]
            }
        },
        {//csv
          text: '<i class="fas fa-file-csv fa-3x" data-toggle="tooltip" data-placement="top" title="CSV"></i>',
          extend: 'csvHtml5',
          fieldSeparator: '\t',
          title : 'Bitácora Inicios Sesión.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//pdfHtml5
          text: '<i class="fas fa-file-pdf fa-3x" data-toggle="tooltip" data-placement="top" title="PDF"></i>',
          extend: 'pdfHtml5',
          fieldSeparator: '\t',
          title : 'Bitácora Inicios Sesión.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//Print
          text: '<i class="fas fa-print fa-3x" data-toggle="tooltip" data-placement="top" title="Imprimir"></i>',
          extend: 'print',
          fieldSeparator: '\t',
          title : 'Bitácora Inicios Sesión.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
    ],
    ajax: '{{ url('/logs/getlogin') }}',
    columns: [
      { data: 'user.name', name: 'user.name' },
      { data: 'type', name: 'type' },
      { data: 'created_at', name: 'created_at' },
    ],
    "language": {
      "url": "{{asset('DataTables/spanish.json')}}"
    },
    "rowCallback": function(row, data, index){
        $(row).find('td:eq(2)').css('background-color', 'rgba(189, 189, 189, 0.75)');
    },
  });
});
 </script>
 {{-- DATATABLES --}}
@endsection
