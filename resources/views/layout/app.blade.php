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

</body>
</html>
