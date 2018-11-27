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
    background: rgba(63, 16, 88, 0.9);
    -webkit-transform-origin: 0% 100%;
            transform-origin: 0% 100%;
    }
    .blocks__block:nth-child(2) {
    background: rgba(14, 67, 98, 0.9);
    -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
    }
    .blocks__block:nth-child(3) {
    background: rgba(13, 92, 50, 0.9);
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
    transition: all 0.3s 0.2s ease-out;
    }
    .blocks-content__content.active {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1);
    visibility: visible;
    }
    .blocks-content .blocks__content-close {
    position: absolute;
    right: 2vw;
    top: 2vh;
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
    box-shadow: inset 0 0 0 3px #000;
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
    background-image: linear-gradient(to right, rgb(102, 26, 143) ,rgba(0, 100, 157, 1), rgba(0, 150, 69, 0.76));
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
  </style>

  <html>
    <body>
      <!-- Demo stuff-->
      <main>
        {{-- <h1><a href="http://ettrics.com/">Ettrics</a></h1>
        <p>A Material Design inspired expanding overlay for showcasing a variety of content.</p>
        <p><a href="https://twitter.com/ettrics/" target="_blank"><i class="fab fa-twitter"></i></a></p> --}}
        <img class="plate img-fluid" src="{{asset('img/inecol.png')}}" alt="INECOL">
      </main>
      <!-- Component starts here-->
      <ul class="blocks-names col-sm-12">
        <li class="blocks__name text-white col-sm-4">Tickets</li>
        <li class="blocks__name text-white col-sm-4">Dispositivos</li>
        <li class="blocks__name text-white col-sm-4">Encargados</li>
      </ul>
      <ul class="blocks">
        <li class="blocks__block" id="1"></li>
        <li class="blocks__block" id="2"></li>
        <li class="blocks__block" id="3"></li>
      </ul>
      <ul class="blocks-content">
        <li class="blocks-content__content text-white">
          <div class="content__close"></div>
          <h2 class="">Tickets</h2>
          <div class="row ">
            <button type="button" name="button" class="btn btn-lg btn-light rounded-circle"><i class="fas fa-plus fa-lg"></i></button>
            <button type="button" name="button" class="btn btn-lg btn-light rounded-circle"><i class="fas fa-list"></i></button>
          </div>
          <i class="blocks__content-close fas fa-times"></i>
        </li>
        <li class="blocks-content__content text-white">
          <h2>Dispositivos</h2>
          <p>BOTONES!</p><i class="blocks__content-close fas fa-times"></i>
        </li>
        <li class="blocks-content__content text-white">
          <h2>Encargados</h2>
          <p>BOTONES!</p><i class="blocks__content-close fas fa-times"></i>
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
    'transition': 'all 0.3s 0.4s ease-out',
    '-webkit-transition': 'all 0.3s 0.4s ease-out'
  });
  aContent = content.eq(num);
  aContent.addClass('active');
};

closeContent = function() {
  bname.css('opacity', '1');
  content.css({
    'transition': 'all 0.1s 0 ease-out',
    '-webkit-transition': 'all 0.1s 0 ease-out'
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

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBLE9BQUEsRUFBQSxNQUFBLEVBQUEsS0FBQSxFQUFBLEtBQUEsRUFBQSxRQUFBLEVBQUEsWUFBQSxFQUFBLE9BQUEsRUFBQSxNQUFBLEVBQUEsV0FBQSxFQUFBLFlBQUEsRUFBQSxPQUFBLEVBQUEsTUFBQSxFQUFBLElBQUEsRUFBQTs7RUFBQSxLQUFBLEdBQVEsQ0FBQSxDQUFFLGdCQUFGOztFQUNSLEtBQUEsR0FBUSxDQUFBLENBQUUsZUFBRjs7RUFDUixPQUFBLEdBQVUsQ0FBQSxDQUFFLDBCQUFGOztFQUNWLFFBQUEsR0FBVyxDQUFBLENBQUUsd0JBQUY7O0VBQ1gsT0FBQSxHQUFVLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxXQUFWLENBQUE7O0VBQ1YsTUFBQSxHQUFTLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxVQUFWLENBQUE7O0VBQ1QsT0FBQSxHQUFVLEtBQUssQ0FBQyxXQUFOLENBQUE7O0VBQ1YsTUFBQSxHQUFTLEtBQUssQ0FBQyxVQUFOLENBQUE7O0VBQ1QsSUFBQSxHQUFPLElBQUksQ0FBQyxLQUFMLENBQVcsTUFBQSxHQUFTLE1BQXBCLENBQUEsR0FBOEI7O0VBQ3JDLElBQUEsR0FBTyxPQUFBLEdBQVUsT0FBVixHQUFvQjs7RUFFM0IsTUFBQSxHQUFTLFFBQUEsQ0FBQSxDQUFBO0FBQ1AsUUFBQSxNQUFBLEVBQUE7SUFBQSxHQUFBLEdBQU0sQ0FBQSxDQUFFLElBQUYsQ0FBTyxDQUFDLEtBQVIsQ0FBQTtJQUNOLE1BQUEsR0FBUyxLQUFLLENBQUMsRUFBTixDQUFTLEdBQVQ7SUFDVCxJQUFHLENBQUMsTUFBTSxDQUFDLFFBQVAsQ0FBZ0IsUUFBaEIsQ0FBSjtNQUNFLEtBQUssQ0FBQyxHQUFOLENBQVUsU0FBVixFQUFxQixHQUFyQjtNQUNBLE1BQU0sQ0FBQyxHQUFQLENBQ0U7UUFBQSxXQUFBLEVBQWEsUUFBQSxHQUFXLElBQVgsR0FBa0IsR0FBbEIsR0FBd0IsSUFBeEIsR0FBK0IsR0FBNUM7UUFDQSxtQkFBQSxFQUFxQixRQUFBLEdBQVcsSUFBWCxHQUFrQixHQUFsQixHQUF3QixJQUF4QixHQUErQjtNQURwRCxDQURGO01BR0EsTUFBTSxDQUFDLFFBQVAsQ0FBZ0IsUUFBaEI7TUFDQSxXQUFBLENBQVksR0FBWixFQU5GOztFQUhPOztFQVlULFdBQUEsR0FBYyxRQUFBLENBQUMsR0FBRCxDQUFBO0FBQ1osUUFBQTtJQUFBLE9BQU8sQ0FBQyxHQUFSLENBQ0U7TUFBQSxZQUFBLEVBQWMsd0JBQWQ7TUFDQSxvQkFBQSxFQUFzQjtJQUR0QixDQURGO0lBR0EsUUFBQSxHQUFXLE9BQU8sQ0FBQyxFQUFSLENBQVcsR0FBWDtJQUNYLFFBQVEsQ0FBQyxRQUFULENBQWtCLFFBQWxCO0VBTFk7O0VBUWQsWUFBQSxHQUFlLFFBQUEsQ0FBQSxDQUFBO0lBQ2IsS0FBSyxDQUFDLEdBQU4sQ0FBVSxTQUFWLEVBQXFCLEdBQXJCO0lBQ0EsT0FBTyxDQUFDLEdBQVIsQ0FDRTtNQUFBLFlBQUEsRUFBYyxxQkFBZDtNQUNBLG9CQUFBLEVBQXNCO0lBRHRCLENBREY7SUFHQSxLQUFLLENBQUMsR0FBTixDQUNFO01BQUEsV0FBQSxFQUFhLFVBQWI7TUFDQSxtQkFBQSxFQUFxQjtJQURyQixDQURGO0lBR0EsS0FBSyxDQUFDLFdBQU4sQ0FBa0IsUUFBbEI7SUFDQSxPQUFPLENBQUMsV0FBUixDQUFvQixRQUFwQjtFQVRhOztFQVlmLFlBQUEsR0FBZSxRQUFBLENBQUEsQ0FBQTtJQUNiO0lBQ0E7SUFDQTtJQUNBO0lBQ0E7SUFDQTtBQUxBLFFBQUE7SUFNQSxJQUFHLEtBQUssQ0FBQyxRQUFOLENBQWUsUUFBZixDQUFIO01BQ0UsTUFBQSxHQUFTLENBQUEsQ0FBRSx1QkFBRjtNQUNULE9BQUEsR0FBVSxDQUFBLENBQUUsTUFBRixDQUFTLENBQUMsTUFBVixDQUFBO01BQ1YsTUFBQSxHQUFTLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxLQUFWLENBQUE7TUFDVCxPQUFBLEdBQVUsS0FBSyxDQUFDLE1BQU4sQ0FBQTtNQUNWLE1BQUEsR0FBUyxLQUFLLENBQUMsS0FBTixDQUFBO01BQ1QsSUFBQSxHQUFPLElBQUksQ0FBQyxLQUFMLENBQVcsTUFBQSxHQUFTLE1BQXBCLENBQUEsR0FBOEI7TUFDckMsSUFBQSxHQUFPLE9BQUEsR0FBVSxPQUFWLEdBQW9CO01BQzNCLE1BQU0sQ0FBQyxHQUFQLENBQ0U7UUFBQSxXQUFBLEVBQWEsUUFBQSxHQUFXLElBQVgsR0FBa0IsR0FBbEIsR0FBd0IsSUFBeEIsR0FBK0IsR0FBNUM7UUFDQSxtQkFBQSxFQUFxQixRQUFBLEdBQVcsSUFBWCxHQUFrQixHQUFsQixHQUF3QixJQUF4QixHQUErQjtNQURwRCxDQURGLEVBUkY7O0VBUGE7O0VBb0JmLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxFQUFWLENBQWEsUUFBYixFQUF1QixZQUF2Qjs7RUFDQSxLQUFLLENBQUMsRUFBTixDQUFTLE9BQVQsRUFBa0IsTUFBbEI7O0VBQ0EsUUFBUSxDQUFDLEVBQVQsQ0FBWSxPQUFaLEVBQXFCLFlBQXJCO0FBakVBIiwic291cmNlc0NvbnRlbnQiOlsiYmxvY2sgPSAkKCcuYmxvY2tzX19ibG9jaycpXG5ibmFtZSA9ICQoJy5ibG9ja3NfX25hbWUnKVxuY29udGVudCA9ICQoJy5ibG9ja3MtY29udGVudF9fY29udGVudCcpXG5jbG9zZUJ0biA9ICQoJy5ibG9ja3NfX2NvbnRlbnQtY2xvc2UnKVxud0hlaWdodCA9ICQod2luZG93KS5vdXRlckhlaWdodCgpXG53V2lkdGggPSAkKHdpbmRvdykub3V0ZXJXaWR0aCgpXG5iSGVpZ2h0ID0gYmxvY2sub3V0ZXJIZWlnaHQoKVxuYldpZHRoID0gYmxvY2sub3V0ZXJXaWR0aCgpXG54VmFsID0gTWF0aC5yb3VuZCh3V2lkdGggLyBiV2lkdGgpICsgMC4wM1xueVZhbCA9IHdIZWlnaHQgLyBiSGVpZ2h0ICsgMC4wM1xuXG5leHBhbmQgPSAtPlxuICBudW0gPSAkKHRoaXMpLmluZGV4KClcbiAgYUJsb2NrID0gYmxvY2suZXEobnVtKVxuICBpZiAhYUJsb2NrLmhhc0NsYXNzKCdhY3RpdmUnKVxuICAgIGJuYW1lLmNzcyAnb3BhY2l0eScsICcwJ1xuICAgIGFCbG9jay5jc3NcbiAgICAgICd0cmFuc2Zvcm0nOiAnc2NhbGUoJyArIHhWYWwgKyAnLCcgKyB5VmFsICsgJyknXG4gICAgICAnLXdlYmtpdC10cmFuc2Zvcm0nOiAnc2NhbGUoJyArIHhWYWwgKyAnLCcgKyB5VmFsICsgJyknXG4gICAgYUJsb2NrLmFkZENsYXNzICdhY3RpdmUnXG4gICAgb3BlbkNvbnRlbnQgbnVtXG4gIHJldHVyblxuXG5vcGVuQ29udGVudCA9IChudW0pIC0+XG4gIGNvbnRlbnQuY3NzXG4gICAgJ3RyYW5zaXRpb24nOiAnYWxsIDAuM3MgMC40cyBlYXNlLW91dCdcbiAgICAnLXdlYmtpdC10cmFuc2l0aW9uJzogJ2FsbCAwLjNzIDAuNHMgZWFzZS1vdXQnXG4gIGFDb250ZW50ID0gY29udGVudC5lcShudW0pXG4gIGFDb250ZW50LmFkZENsYXNzICdhY3RpdmUnXG4gIHJldHVyblxuXG5jbG9zZUNvbnRlbnQgPSAtPlxuICBibmFtZS5jc3MgJ29wYWNpdHknLCAnMSdcbiAgY29udGVudC5jc3NcbiAgICAndHJhbnNpdGlvbic6ICdhbGwgMC4xcyAwIGVhc2Utb3V0J1xuICAgICctd2Via2l0LXRyYW5zaXRpb24nOiAnYWxsIDAuMXMgMCBlYXNlLW91dCdcbiAgYmxvY2suY3NzXG4gICAgJ3RyYW5zZm9ybSc6ICdzY2FsZSgxKSdcbiAgICAnLXdlYmtpdC10cmFuc2Zvcm0nOiAnc2NhbGUoMSknXG4gIGJsb2NrLnJlbW92ZUNsYXNzICdhY3RpdmUnXG4gIGNvbnRlbnQucmVtb3ZlQ2xhc3MgJ2FjdGl2ZSdcbiAgcmV0dXJuXG5cbnVwZGF0ZVZhbHVlcyA9IC0+XG4gIGB2YXIgeVZhbGBcbiAgYHZhciB4VmFsYFxuICBgdmFyIGJXaWR0aGBcbiAgYHZhciBiSGVpZ2h0YFxuICBgdmFyIHdXaWR0aGBcbiAgYHZhciB3SGVpZ2h0YFxuICBpZiBibG9jay5oYXNDbGFzcygnYWN0aXZlJylcbiAgICBhQmxvY2sgPSAkKCcuYmxvY2tzX19ibG9jay5hY3RpdmUnKVxuICAgIHdIZWlnaHQgPSAkKHdpbmRvdykuaGVpZ2h0KClcbiAgICB3V2lkdGggPSAkKHdpbmRvdykud2lkdGgoKVxuICAgIGJIZWlnaHQgPSBibG9jay5oZWlnaHQoKVxuICAgIGJXaWR0aCA9IGJsb2NrLndpZHRoKClcbiAgICB4VmFsID0gTWF0aC5yb3VuZCh3V2lkdGggLyBiV2lkdGgpICsgMC4wM1xuICAgIHlWYWwgPSB3SGVpZ2h0IC8gYkhlaWdodCArIDAuMDNcbiAgICBhQmxvY2suY3NzXG4gICAgICAndHJhbnNmb3JtJzogJ3NjYWxlKCcgKyB4VmFsICsgJywnICsgeVZhbCArICcpJ1xuICAgICAgJy13ZWJraXQtdHJhbnNmb3JtJzogJ3NjYWxlKCcgKyB4VmFsICsgJywnICsgeVZhbCArICcpJ1xuICByZXR1cm5cblxuJCh3aW5kb3cpLm9uICdyZXNpemUnLCB1cGRhdGVWYWx1ZXNcbmJuYW1lLm9uICdjbGljaycsIGV4cGFuZFxuY2xvc2VCdG4ub24gJ2NsaWNrJywgY2xvc2VDb250ZW50Il19
//# sourceURL=coffeescript
</script>
