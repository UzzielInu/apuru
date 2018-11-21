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
      <h3 class="float-left">Encargado ?</h3>

      <a href="{{url('')}}" role="button" name="button" class="btn btn-success col-md-3 float-right">Registrar Encargado ?</a>
    </div>
    <div class="card-body">
      {{-- <h5 class="card-title">Tabla con datatables</h5> --}}
      <table id="table" name="table" class="table table-hover display responsive no-wrap " width="100%">
        <thead class="thead">
          <tr>
            <th scope="col" class="title">Nombre</th>
            <th scope="col" class="title">Paterno</th>
            <th scope="col" class="title">Materno</th>
            <th scope="col" class="title">Extension</th>
            <th scope="col" class="title">Correo</th>
            <th scope="col" class="title">Ubicación</th>
            <th scope="col" class="title">Fecha creación</th>
            <th scope="col" class="title">Fecha actualización</th>
            <th scope="col" data-priority="1" class="title text-white">Acciones</th>
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
    ajax: '{{ url('/gethouseholder') }}',
    columns: [
      { data: 'nombre',       name: 'nombre'       },
      { data: 'paterno',      name: 'paterno'      },
      { data: 'materno',      name: 'materno'      },
      { data: 'extension',    name: 'extension'    },
      { data: 'correo',       name: 'correo'    },
      { data: 'location.clave',  name: 'location.clave'  },
      { data: 'created_at',   name: 'created_at'   },
      { data: 'updated_at',   name: 'updated_at' },
      { data: 'actions',      name: 'actions'      },
    ],
    "language": {
      "url": "{{asset('DataTables/spanish.json')}}"
    },
    "rowCallback": function(row, data, index){
        $(row).find('td:eq(6)').css('background-color', 'rgba(189, 189, 189, 0.75)');
        $(row).find('td:eq(7)').css('background-color', 'rgba(189, 189, 189, 0.75)');
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
