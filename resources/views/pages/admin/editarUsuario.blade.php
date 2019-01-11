@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
	<div class="container">
		<form action="/perfilCambiar" method="get">
            <input type="hidden" name="id" value="$usuarios->id}}">
            <div>
                Nombre: <input type="text" name="name" value="{{usuarios->name}}">
            </div>
            <div>
                Email: <input type="Email" name="email" value="{{usuarios->email}}">
            </div>
            <div>
               Contraseña: <input type="password" name="pass" value="{{usuarios->password}}">
            </div> 
            <div>
                <input type="submit" value="Cambiar">
            </div>  
        </form>	
	</div>
@endsection