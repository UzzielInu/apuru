@extends('layouts.app')
@section('content')
<script src="{{ asset('chart.js/Chart.min.js') }}"></script>
<div class="container-fluid">
  <!-- Icon Cards-->
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-ticket-alt"></i>
          </div>
          <div class="mr-5">{{$ticket}} Tickets  </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-desktop"></i>
          </div>
          <div class="mr-5">{{$device}} Dispositivos</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white o-hidden h-100" style="background:rgb(25, 37, 187)">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-user-tie"></i>
          </div>
          <div class="mr-5">{{$houseHolder}} Encargados</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-users"></i>
          </div>
          <div class="mr-5">{{$user}} Usuarios</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-shield-alt"></i>
          </div>
          <div class="mr-5">{{$antivirus}} Antivirus</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right fa-2x"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white o-hidden h-100" style="background:rgb(103, 3, 164)">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-building"></i>
          </div>
          <div class="mr-5">{{$location}} Ubicaciones</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-microchip"></i>
          </div>
          <div class="mr-5">{{$modelDevice}} Modelos</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-hdd"></i>
          </div>
          <div class="mr-5">{{$operativeSystem}} Sistemas Operativos</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white o-hidden h-100" style="background:rgb(25, 37, 187)">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-toolbox"></i>
          </div>
          <div class="mr-5">{{$service}} Servicios</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white o-hidden h-100 bg-dark">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-memory"></i>
          </div>
          <div class="mr-5">{{$type}} Hardware</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Area Chart Example-->
    <div class="card col-md-6 mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Usuarios que iniciaron sesión esta semana</div>
      <div class="card-body">
        <canvas id="myBarChart" width="100%" height="50"></canvas>
      </div>
      <div class="card-footer small text-muted">Ultima actualización hoy a las 7:00 am</div>
    </div>

    <!-- Area Chart Example-->
    <div class="card col-md-6 mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Servicios realizados esta semana</div>
      <div class="card-body">
        <canvas id="myPieChart" width="100%" height="50"></canvas>
      </div>
      <div class="card-footer small text-muted">Ultima actualización hoy a las 7:00 am</div>
    </div>
  </div>

</div>

<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"],
    datasets: [{
      label: "Usuarios",
      backgroundColor:  ['#007bff', '#dc3545', '#ffc107', '#28a745', 'rgb(175, 146, 103)', 'rgb(192, 12, 205)', 'rgb(6, 40, 162)'],
      borderColor: "rgba(2,117,216,1)",
      data: [{{$data}}],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'Days'
        },
        gridLines: {
          display: true
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>

<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Soporte", "Red", "Problemas", "Otros"],
    datasets: [{
      data: [12.21, 15.58, 11.25, 8.32],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});

</script>
@endsection
