@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
	<div class="container">
		<h1>{{$usuario->name}}</h1>
		<p><strong>Email:</strong> {{$usuario->email}}</p>
		<p><strong>Nivel:</strong> {{$usuario->role->nombre}}</p>
		<p><strong>Puntuacion:</strong> {{$usuario->puntuacion}}</p>
		@if($usuario->id==Auth::user()->id)
			<a href="{{route('usuario.ajustes')}}"><button >Ajustes</button></a>
		@endif

	</div>
	@endsection