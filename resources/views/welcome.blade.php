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
      * {
    box-sizing: border-box;
    }
    body {
    font-family: 'Open Sans';
    font-weight: 400;
    text-align: center;
    }
    .blocks {
    position: fixed;
    bottom: 0;
    z-index: 1;
    list-style-type: none;
    display: flex;
    width: 100%;
    margin: 0;
    padding: 0;
    }
    .blocks__block {
    will-change: transform;
    position: relative;
    height: 20vh;
    flex: 1;
    transition: all 0.7s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .blocks__block:nth-child(1) {
    background: rgba(103, 56, 138, 0.9);
    -webkit-transform-origin: 0% 100%;
            transform-origin: 0% 100%;
    }
    .blocks__block:nth-child(2) {
    background: rgba(37, 79, 142, 0.9);
    -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
    }
    .blocks__block:nth-child(3) {
    background: rgba(29, 150, 85, 0.9);
    -webkit-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
    }
    .blocks__block.active {
    z-index: 2;
    }
    .blocks-content {
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: absolute;
    bottom: 0;
    left: 0;
    height: 100vh;
    width: 100%;
    }
    .blocks-content__content {
    will-change: transform, opacity;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    position: fixed;
    width: 100%;
    z-index: 3;
    top: 0;
    left: 0;
    height: 100vh;
    padding: 10vw;
    font-size: 20px;
    opacity: 0;
    visibility: hidden;
    text-align: center;
    -webkit-transform: scale(0.9);
            transform: scale(0.9);
    transition: all 0.2s 0.2s ease-out;
    }
    .blocks-content__content.active {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1);
    visibility: visible;
    }
    .blocks-content .blocks__content-close {
    position: relative;
    right: 0;
    top: 30%;
    font-size: 30px;
    cursor: pointer;
    transition: all 0.2s ease-out;
    }
    .blocks-content .blocks__content-close:hover {
    -webkit-transform: scale(1.1);
            transform: scale(1.1);
    }
    .blocks-content p {
    font-size: 16px;
    line-height: 2;
    max-width: 800px;
    }
    .blocks-content h2 {
    padding: 15px 30px;
    font-weight: 300;
    letter-spacing: 6px;
    /* box-shadow: inset 0 0 0 3px #000; */
    }
    .blocks-names {
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 2;
    width: 100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    font-size: 18px;
    letter-spacing: 4px;
    cursor: pointer;
    transition: all 0.15s ease-out;
    }
    .blocks-names .blocks__name {
    flex: 1;
    height: 20vh;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .blocks__name:nth-child(1):hover {
      background-color: rgba(162, 76, 161, 1);
    }
    .blocks__name:nth-child(2):hover {
      background-color: rgba(60, 137, 180, 1);
    }
    .blocks__name:nth-child(3):hover {
      background-color: rgba(43, 191, 93, 1);
    }
    /* Demo */
    main {
    position: relative;
    z-index: 1;
    padding: 3vh 5vw;
    height: 80vh;
    display: flex;
    flex-flow: column wrap;
    justify-content: center;
    background-color: #174449;
    background-image: radial-gradient(circle,rgba(0, 150, 69, 1) , rgba(24, 72, 143, 1) , rgb(103, 35, 154)  );
    }
    main h1 {
    margin: 0;
    font-weight: 300;
    color: #38c5b9;
    }
    main h1 a {
    font-size: 48px;
    }
    main p {
    font-weight: 300;
    font-size: 16px;
    max-width: 340px;
    margin: 7px auto;
    }
    main a {
    text-decoration: none;
    color: #38c5b9;
    font-size: 30px;
    }
    main .plate {
    position: absolute;
    top: 50%;
    left: 50%;
    max-width: 300px;
    width: 100%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    z-index: -1;
    }
    .block_button {
    background-color: #525154; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    }
    .block_button1 {
      background-color: #72187d;
      color: white;
      border: 2px solid #8622c3;
    }
    .block_button1:hover {
      background-color: #8622c3;
      color: white;
    }
    .block_button2 {
      background-color: #183862;
      color: white;
      border: 2px solid #2e62a7;
    }
    .block_button2:hover {
      background-color: #2e62a7;
      color: white;
    }
    .block_button3 {
      background-color: #166122;
      color: white;
      border: 2px solid #0d7911;
    }
    .block_button3:hover {
      background-color: #099a0e;
      color: white;
    }
  </style>

  <html>
    <body>
      <!-- Demo stuff-->
      <main>
        <button type="button" name="button" class="btn btn-danger rounded-circle px-2 position-fixed" style="top:5%;right:5%;"><i class="fas fa-times-circle fa-lg"></i></i></button>
        <img class="plate img-fluid" src="{{asset('img/shiro.png')}}" alt="INECOL">
      </main>
      <!-- Component starts here-->
      <ul class="blocks-names">
        <li class="blocks__name text-white">Tickets</li>
        <li class="blocks__name text-white">Dispositivos</li>
        <li class="blocks__name text-white">Encargados</li>
      </ul>
      <ul class="blocks">
        <li class="blocks__block" id="1"></li>
        <li class="blocks__block" id="2"></li>
        <li class="blocks__block" id="3"></li>
      </ul>
      <ul class="blocks-content">
        <li class="blocks-content__content text-white">
          <h2>Tickets</h2>
          <div class="container">
            <a href="{{url('/ticket/create')}}" role="button" class="btn block_button1 mx-4"><i class="fas fa-plus-circle fa-5x"></i><br>Agregar</a>
            <a href="{{url('/ticket')}}" role="button" class="btn block_button1 mx-4"><i class="fas fa-eye fa-5x"></i><br>Ver</a>
          </div>
          <i class="blocks__content-close fas fa-times-circle"></i>
        </li>
        <li class="blocks-content__content text-white">
          <h2>Dispositivos</h2>
          <div class="container">
            <a href="{{url('/device/create')}}" role="button" class="btn block_button2 mx-4"><i class="fas fa-plus-circle fa-5x"></i><br>Agregar</a>
            <a href="{{url('/device')}}" role="button" class="btn block_button2 mx-4"><i class="fas fa-eye fa-5x"></i><br>Ver</a>
          </div>
          <i class="blocks__content-close fas fa-times-circle"></i>
        </li>
        <li class="blocks-content__content text-white">
          <h2>Encargados</h2>
          <div class="container">
            <a href="{{url('/householder/create')}}" role="button" class="btn block_button3 mx-4"><i class="fas fa-plus-circle fa-5x"></i><br>Agregar</a>
            <a href="{{url('/householder')}}" role="button" class="btn block_button3 mx-4"><i class="fas fa-eye fa-5x"></i><br>Ver</a>
          </div>
          <i class="blocks__content-close fas fa-times-circle"></i>
        </li>
      </ul>
    </body>
  </html>

<script type="text/javascript">
(function() {
var bHeight, bWidth, block, bname, closeBtn, closeContent, content, expand, openContent, updateValues, wHeight, wWidth, xVal, yVal;
block = $('.blocks__block');
bname = $('.blocks__name');
content = $('.blocks-content__content');
closeBtn = $('.blocks__content-close');
wHeight = $(window).outerHeight();
wWidth = $(window).outerWidth();
bHeight = block.outerHeight();
bWidth = block.outerWidth();
xVal = Math.round(wWidth / bWidth) + 0.03;
yVal = wHeight / bHeight + 0.03;
expand = function() {
  var aBlock, num;
  num = $(this).index();
  aBlock = block.eq(num);
  if (!aBlock.hasClass('active')) {
    bname.css('opacity', '0');
    aBlock.css({
      'transform': 'scale(' + xVal + ',' + yVal + ')',
      '-webkit-transform': 'scale(' + xVal + ',' + yVal + ')'
    });
    aBlock.addClass('active');
    openContent(num);
  }
};

openContent = function(num) {
  var aContent;
  content.css({
    'transition': 'all 0.1s 0.1s ease-out',
    '-webkit-transition': 'all 0.1s 0.1s ease-out'
  });
  aContent = content.eq(num);
  aContent.addClass('active');
};

closeContent = function() {
  bname.css('opacity', '1');
  content.css({
    'transition': 'all 0.1s 0.1s ease-out',
    '-webkit-transition': 'all 0.1s 0.1s ease-out'
  });
  block.css({
    'transform': 'scale(1)',
    '-webkit-transform': 'scale(1)'
  });
  block.removeClass('active');
  content.removeClass('active');
};

updateValues = function() {
  var yVal;
  var xVal;
  var bWidth;
  var bHeight;
  var wWidth;
  var wHeight;
  var aBlock;
  if (block.hasClass('active')) {
    aBlock = $('.blocks__block.active');
    wHeight = $(window).height();
    wWidth = $(window).width();
    bHeight = block.height();
    bWidth = block.width();
    xVal = Math.round(wWidth / bWidth) + 0.03;
    yVal = wHeight / bHeight + 0.03;
    aBlock.css({
      'transform': 'scale(' + xVal + ',' + yVal + ')',
      '-webkit-transform': 'scale(' + xVal + ',' + yVal + ')'
    });
  }
};

$(window).on('resize', updateValues);

bname.on('click', expand);

closeBtn.on('click', closeContent);

}).call(this);
</script>
