@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
  @if(Session::has('status'))
    <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }}"><div>{{ Session::get('status') }}</div><i id="x" class="fas fa-times" onclick="cerrar()"></i></div>
  @endif
	<div class="container">
		<h1>Ajustes de usuario</h1>
		@if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
		<h2>Cambiar Perfil</h2>
		<form action="{{route('usuario.cambiarDatos')}}" >
			<p><strong>Nombre:</strong> <input type="text" value="{{Auth::user()->name}}" name="nombre"></p>
			<p><strong>Email:</strong> <input type="text" value="{{Auth::user()->email}}" name="email"></p>
			<input type="submit" value="Cambiar">
		</form>
		<h2>Cambiar contraseña</h2>
		<form action="{{route('usuario.cambiarPassword')}}" >
			<p><strong>Contraseña actual:</strong> <input type="password" name="passwordActual"></p>
			<p><strong>Nueva contraseña:</strong> <input type="password" name="passwordNueva" id="passwordNueva"></p>
			<p><strong>Repite la nueva contraseña:</strong> <input type="password" name="passwordNueva2" id="passwordNueva2" oninput="comporbarPassword()"></p>
			<script type="text/javascript">
			function comporbarPassword(){
                  var pass= document.getElementById('passwordNueva').value;
                  var pass2= document.getElementById('passwordNueva2');
                  var submit= document.getElementById('passwordSubmit');
                  if (pass==pass2.value){
                    pass2.classList.remove("is-invalid");
                    submit.disabled = false;
                  }else{
                    pass2.classList.add("is-invalid");
                    submit.disabled = true;
                  }
                }
                </script>
			<input type="submit" value="Cambiar" id="passwordSubmit">
		</form>
		<h1>Borrar Cuenta</h1>
		<form action="{{route('usuario.borrarCuenta')}}" >
			<p><strong>Contraseña actual:</strong> <input type="password" name="password"><input type="submit" value="Borrar cuenta" class="btn btn-danger"></p>
		</form>


	</div>
	@endsection
