<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('icons/js/all.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/css/all.css') }}" rel="stylesheet">
    <title>Inecol</title>
  </head>
  <style media="screen">
  html, body {
    height: 100%;
  }
  .main {
    height: 100%;
    width: 100%;
    display: table;
  }
  .wrapper {
    display: table-cell;
    height: 100%;
    vertical-align: middle;
  }
  </style>
  <body class="bg-dark">
      <div class = "container text-center main">
        <div class = "wrapper">
          {!! Form::open(['action' => ['UserController@validateRol', 'admin']]) !!}
          <button type="submit" class="btn btn-secondary col-md-4"><i class="fas fa-users-cog fa-10x text-white"></i> admin</button>
          {!! Form::close() !!}

          {!! Form::open(['action' => ['UserController@validateRol', 'user']]) !!}
          <button type="submit" class="btn btn-secondary col-md-4"><i class="fas fa-users-cog fa-10x text-white"></i> user</button>
          {!! Form::close() !!}
        </div>
      </div>
  </body>
</html>
