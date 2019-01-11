<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('WCSEARCH') }}</title>

    <script src="{{ asset('js/app.js') }}"></script> <!-- quitar defer del link del script -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/leaflet/leaflet.css')}}">
    <script src="{{ asset('/assets/vendor/leaflet/leaflet.js')}}"></script>

    @yield('script')
</head>
<body>
    <div id="app">

      @include('includes.app.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="/js/ajax.js"></script>
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

</body>
</html>
