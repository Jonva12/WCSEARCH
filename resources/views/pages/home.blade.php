@extends('layout.app')

@section('title', 'WCSearch')

@section('content')
  <div id="mapid"></div>
			
  <!-- <button id="geolocate">Geo</button> -->
  @include('includes.geoscripts')
  <script src="js/map.js"></script>
@endsection
