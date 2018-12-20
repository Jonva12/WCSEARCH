@extends('layout.app')

@section('title', 'WCSearch')

@section('content')

  <div id="mapid" onload="geoFindMe()"></div>
  <p><button>Show my location</button></p>
  <div id="out"></div>
  <script src="js/map.js"></script>
@endsection
