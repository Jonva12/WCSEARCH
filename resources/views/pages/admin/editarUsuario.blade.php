@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
	<div class="container">
		<h1>Editar Usuario</h1>
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form action="{{route('admin.guardarUsuario')}}" method="get">
            <input type="hidden" name="id" value="{{$usuario->id}}">
            <div>
                Nombre: <input type="text" name="name" value="{{$usuario->name}}">
            </div>
            <div>
                Email: <input type="Email" name="email" value="{{$usuario->email}}">
            </div>
            <div>
            	Rol:<select name="rol">
            		@switch($usuario->role_id)
    					@case(1)
        					<option selected value="1">Normal</option>
        					<option value="2">Premium</option>
        					<option value="3">Admin</option>
        				@break
						@case(2)
							<option value="1">Normal</option>
        					<option selected value="2">Premium</option>
        					<option value="3">Admin</option>
        				@break
        				@case(3)
        					<option value="1">Normal</option>
							<option value="2">Premium</option>
        					<option selected value="3">Admin</option>
        				@break
						@default
							<option value="1">Normal</option>
							<option value="2">Premium</option>
        					<option value="3">Admin</option>
						@endswitch
            		</select>
            </div>
            <div>
            	Puntuacion: <input type="number" name="puntuacion" value="{{$usuario->puntuacion}}">
            </div>
            <div>
                <input type="submit" value="Cambiar">
            </div>  
        </form>
	</div>
@endsection