@extends('layouts.app')
@section('content')

<div class="container-fluid">
  <div class="card text-center">
    <div class="card-header">
      Index OS
    </div>
    <div class="card-body">
      <h5 class="card-title">Tabla con datatables</h5>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted">
      Puto el que lo lea
    </div>
  </div>
</div>

@endsection
