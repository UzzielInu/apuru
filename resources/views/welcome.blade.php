<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'INECOL-SYSTEM') }}</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}
  <!-- Styles -->
  <style>
    html, body {
        background-color: #174449;
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
        color: #dbdbdb;
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
        <div class="content">
          <img src="{{asset('img/inecol.png')}}" alt="inecol_logo">
          <div class="title m-b-md">
              INECOL-SYSTEM
          </div>
          <div class="card">
            <div class="card-header text-dark">Iniciar sesión</div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right text-dark">{{ __('E-Mail Address') }}</label>

                      <div class="col-md-6 text-dark">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('Login') }}
                      </button>

                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <div class="links">
            <a href="https://www.inecol.mx/inecol/index.php/es/">INECOL.GOB.MX</a>
            <a href="https://www.facebook.com/inecolxalapa/">FACEBOOK</a>
            <a href="https://www.instagram.com/explore/locations/200925733273046/inecol-instituto-de-ecologia-ac/">INSTAGRAM</a>
            <a href="https://twitter.com/Inecol_mx">TWITTER</a>
          </div>
      </div>
    </div>
  </body>
</html>
