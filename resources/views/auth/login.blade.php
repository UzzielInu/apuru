<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'INECOL-SYSTEM') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <link href="{{ asset('icons/css/all.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}
  <!-- Styles -->
  <style>
    html, body {
        background-color: #174449;
        background-image: linear-gradient(to bottom right, rgb(102, 26, 143) ,rgba(0, 100, 157, 1), rgba(0, 150, 69, 0.76));
        color: #ffffff;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: rgb(219, 219, 219);
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
  </style>
</head>
  <body>
      <div class="flex-center position-ref full-height">
        <div class="content col-lg-4 mx-auto">
            <img src="{{asset('img/inecol.png')}}" class="img-fluid mb-3" alt="inecol_logo">
          {{-- <div class="title m-b-md">
              INECOL-SYSTEM
          </div> --}}
          <div class="card border-0">
            <div class="card-header text-white" style="background-color: rgba(0, 122, 56, 0.77)">Iniciar sesión</div>
              <div class="card-body px-3 pb-0" style="background-color: rgba(3, 71, 203, 0.77)">

                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-center text-white px-0">{{ __('Correo') }}</label>

                      <div class="col-md-8 text-white pl-0">
                        <input id="email" type="email" class="text-center form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-center text-white px-0">{{ __('Contraseña') }}</label>
                    <div class="col-md-8  pl-0">
                        <input id="password" type="password" class="text-center form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  {{-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="remember">
                          {{ __('Recordar Usuario') }}
                        </label>
                      </div>
                    </div>
                  </div> --}}
                  <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-8">
                      <button type="submit" class="btn btn-outline-light">
                          {{ __('Login') }}
                      </button>
                    </div>
                    <div class="col-md-8">
                      <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                          {{ __('Olvidé mi contraseña') }}
                      </a>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="links mt-3 col-md-12">
            <a href="https://www.inecol.mx/inecol/index.php/es/" target="_blank" class="btn" data-toggle="tooltip" data-placement="top" title="Inecol.mx"><i class="fas fa-globe fa-2x"></i></a>
            <a href="https://www.facebook.com/inecolxalapa/" target="_blank" class="btn" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook-square fa-2x"></i></a>
            <a href="https://www.instagram.com/explore/locations/200925733273046/inecol-instituto-de-ecologia-ac/" target="_blank" class="btn" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="https://twitter.com/Inecol_mx" target="_blank" class="btn" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter-square fa-2x"></i></a>
          </div>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip({
      trigger : 'hover'
    });
  });
</script>
