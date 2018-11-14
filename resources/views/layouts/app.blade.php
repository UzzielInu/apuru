<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'INECOL-SYSTEM') }}</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>
  <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('icons/js/all.js') }}" defer></script>
  <script src="{{ asset('swal/dist/sweetalert2.all.min.js') }}"></script>
  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('icons/css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
  <link href="{{ asset('swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark navbar-laravel static-top" style="background-image: linear-gradient(to right,rgba(12, 139, 13, 1) ,rgba(0, 100, 157, 1),rgba(0, 100, 157, 1),rgba(0, 100, 157, 1), rgba(102, 26, 143, 1));">
      <!-- <div class="container"> -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <strong>{{ config('app.name', 'INECOL') }}</strong>
        </a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-arrows-alt-h"></i>
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  @if (Route::has('register'))
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
              </li>
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fas fa-user-circle fa-fw"></i>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-exchange-alt fa-fw fa-lg text-dark"></i> Cambiar sesión</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-power-off fa-fw fa-lg text-danger"></i> Cerrar Sesión</a>
                </div>
              </li>
              <!-- <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <span class="badge badge-danger">9+</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> -->
            @endguest
          </ul>
        </div>
      <!-- </div> -->
    </nav>
    <div id="wrapper">
      <!-- Star SIDEBAR -->
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled" style="background-image: linear-gradient(to bottom,rgba(12, 139, 13, 1) ,rgba(0, 100, 157, 1),rgba(0, 100, 157, 1),rgba(0, 100, 157, 1), rgb(102, 26, 143));">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('home')}}">
            <i class="fas fa-chalkboard-teacher fa-lg"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('devices')}}">
            <i class="fas fas fa-desktop fa-lg"></i>
            <span>Dispositivos</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('householder')}}">
            <i class="fas fa-user-tie fa-lg"></i>
            <span>Encargados</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('tickets')}}">
            <i class="fas fa-clipboard-list fa-lg"></i>
            <span>Tickets</span></a>
        </li>
        <li class="nav-item dropdown">
          <a href="#pageSubmenu" data-toggle="collapse" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="fas fa-fw fa-folder fa-lg"></i>
            <span>Catálogos</span>
          </a>
          <ul class="collapse navbar-nav mr-auto" style="background-color: rgba(96, 30, 190, 0.3)" id="pageSubmenu">
              <li class="text-center">
                  <a class="nav-link px-3" href="{{url('antivirus')}}"><i class="fas fa-shield-alt fa-lg"></i> Antivirus</a>
              </li>
              <li class="text-center">
                  <a class="nav-link px-3" href="{{url('location')}}"><i class="fas fa-building fa-lg"></i> Ubicacion</a>
              </li>
              <li class="text-center">
                  <a class="nav-link px-3" href="{{url('modeldevice')}}"><i class="fas fa-microchip fa-lg"></i> Modelo</a>
              </li>
              <li class="text-center">
                  <a class="nav-link px-3" href="{{url('os')}}"><i class="fab fa-steam fa-lg"></i> S.O.</a>
              </li>
              <li class="text-center">
                  <a class="nav-link px-3" href="{{url('service')}}"><i class="fas fa-toolbox fa-lg"></i> Servicio</a>
              </li>
              <li class="text-center">
                  <a class="nav-link px-3" href="{{url('type')}}"><i class="fas fa-memory fa-lg"></i>Hardware</a>
              </li>
          </ul>
        </li>
      </ul>
      <div id="content-wrapper">
<!-- Start the main page -->
    <div class="container-fluid p-0">
      @if(Session::has('message'))
        <script type="text/javascript">
        swal({
          position: 'center',
          type: 'success',
          title: '{{ Session::get('message') }}',
          showConfirmButton: false,
          timer: 1500
          })
        </script>
      @elseif(Session::has('errors'))
        <script type="text/javascript">
        swal({
          position: 'center',
          type: 'error',
          title: '{{ Session::get('errors') }}',
          showConfirmButton: false,
          timer: 1500
          })
        </script>
      @endif
      @yield('content')
      <!-- Finish the main page -->
    </div>
    <!-- Sticky Footer -->
    {{-- <footer class="sticky-footer">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright © INECOL 2018</span>
        </div>
      </div>
    </footer> --}}
    <!-- Sticky Footer -->
  </div>
    <!-- Div-App -->
    <!-- Finish SIDEBAR -->
  </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">?Seguro que desea cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona aceptar para proceder.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Aceptar
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- /Logout Modal-->
<script type="text/javascript">
(function($) {
  // Toggle the side navigation
  $("#sidebarToggle").on('click',function(e) {
    e.preventDefault();
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
  });
})(jQuery); // End of use strict
</script>
</body>
</html>
