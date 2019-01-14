@extends('layout.app')

@section('title', 'WCSearch')

@section('content')
  <div id="mapid"></div>
  <div class="navbar column">
			<a class="nav-link" class="link" href="/createWC">Create WC</a>
	</div>
  <!-- <button id="geolocate">Geo</button> -->
  @include('includes.geoscripts')
  <script src="js/map.js"></script>
@endsection
