
@extends('layouts.app')
@section('content')
{{-- DATATABLES --}}
<link  href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
{{-- DATATABLES --}}

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      <h3 class="float-left">Antivirus</h3>

      <a href="{{url('antivirus/create')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar antivirus</a>

    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Versión</th>
            <th scope="col" class="">Fecha creación</th>
            <th scope="col" class="">Fecha actualización</th>
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
  var table = $('#table').DataTable({
    responsive: true,
    fixedHeader: true,
    processing: true,
    serverSide: true,
    dom: "<'row mx-auto'<'col-md-12 mx-auto'B>>"+"<'row text-center'<'col-md-6 text-left'l><'col-md-6'f>>" + 'rt'+"<'row text-center'<'col-md-6 text-left'i><'col-md-6'p>>",
      buttons: [
        {//excel
          text: 'EXCEL',
          extend: 'excelHtml5',
          fieldSeparator: '\t',
          title : 'Antivurus.',
            exportOptions: {
              columns: [ 0, ':visible' ]
            }
        },
        {//csv
          text: 'CSV',
          extend: 'csvHtml5',
          fieldSeparator: '\t',
          title : 'Antivurus.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//pdfHtml5
          text: 'PDF',
          extend: 'pdfHtml5',
          fieldSeparator: '\t',
          title : 'Antivurus.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//Print
          text: 'Imprimir',
          extend: 'print',
          fieldSeparator: '\t',
          title : 'Antivurus.',
          exportOptions: {
            columns: [ 0, ':visible' ]
          }
        },
        {//ColumnVisual
          text: 'Columnas',
          extend: 'colvis',
          fieldSeparator: '\t',
          title : 'Columnas',
        },
    ],
    ajax: '{{ url('/getantivirus') }}',
    columns: [
      { data: 'nombre', name: 'nombre' },
      { data: 'version', name: 'version' },
      { data: 'created_at', name: 'created_at' },
      { data: 'updated_at', name: 'updated_at' },
      { data: 'actions', name: 'actions' },
    ]
  });
  table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
       var cell = table.cell({ row: rowIdx, column: 2 }).node();
       $(cell).addClass('bg-warning');
   });
});
 </script>
 {{-- DATATABLES --}}

@endsection
