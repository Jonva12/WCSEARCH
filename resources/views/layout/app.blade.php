<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('WCSEARCH') }}</title>
    <!-- Matomo -->
    <script type="text/javascript">
      var _paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//matomo.locksek.com/piwik/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
<!-- End Matomo Code -->

    <script src="{{ asset('js/app.js') }}"></script> <!-- quitar defer del link del script -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css')}}">
    <link rel="stylesheet" href="/css/alerts.css">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/leaflet/leaflet.css')}}">
    <script src="{{ asset('/assets/vendor/leaflet/leaflet.js')}}"></script>

    @yield('script')
</head>
<body>
    <div id="app">

      @include('includes.app.navbar')
        <div id="container">
            @yield('content')
        </div>
    </div>
    <script type="text/javascript">

    document.getElementById("x").addEventListener('click', cerrar);
      //para todas las alertas
      function cerrar(){
        document.getElementById("alert").remove();
      }
    </script>
    @if(Auth::user())
      <script src="/js/ajax.js" charset="UTF-8" onload="crearToken('{{Auth::user()->api_token}}')"></script>
    @else
      <script src="/js/ajax.js" charset="UTF-8"></script>
    @endif
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</body>
</html>
