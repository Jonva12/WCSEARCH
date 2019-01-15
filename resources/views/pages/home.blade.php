@extends('layout.app')

@section('title', 'WCSearch')

@section('content')
  <style media="screen">
    #mapid{
      min-height: 800px;
      max-height: 100%;
      width: 100%;
      margin-top: -20px;
    }
  </style>
  <div id="mapid"></div>

  <!-- <button id="geolocate">Geo</button> -->
  @include('includes.geoscripts')
  <script src="js/map.js"></script>
@endsection
