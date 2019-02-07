@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
  <style media="screen">
    .editar, .cambiar, .eliminar{
      padding: 20px;
      border-bottom: 1px solid grey;
    }
    h1{
      text-align:center;
      padding-top: 20px;
      border-bottom: 1px solid grey;
    }

  </style>
  @if(Session::has('status'))
    <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }}"><div>{{ Session::get('status') }}</div><i id="x" class="fas fa-times" onclick="cerrar()"></i></div>
  @endif
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

    <div class="container">
      <div class="editar">
        <h2>Editar Perfil</h2>
    		<form action="{{route('usuario.cambiarDatos')}}" >
    			<p>Nombre:<input type="text" class="form-control" value="{{Auth::user()->name}}" name="nombre"></p>
    			<p>Email:<input type="text" class="form-control" value="{{Auth::user()->email}}" name="email"></p>
    			<input type="submit" value="Editar" class="btn btn-success">
    		</form>
      </div>
      <div class="cambiar">
        <h2>Cambiar contraseña</h2>
    		<form action="{{route('usuario.cambiarPassword')}}" >
    			<p>Contraseña actual: <input type="password" class="form-control" name="passwordActual"></p>
    			<p>Nueva contraseña:<input type="password" class="form-control" name="passwordNueva" id="passwordNueva"></p>
    			<p>Repite la nueva contraseña:<input type="password" class="form-control" name="passwordNueva2" id="passwordNueva2" oninput="comporbarPassword()"></p>
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
    			<input type="submit" value="Cambiar" id="passwordSubmit" class="btn btn-success">
    		</form>
      </div>
      <div class="eliminar">
        <h2>Eliminar Cuenta</h2>
    		<form action="{{route('usuario.borrarCuenta')}}" >
    			<p>Contraseña actual: <input type="password" class="form-control" name="password"></p>
          <input type="submit" value="Borrar cuenta" class="btn btn-danger">
    		</form>
      </div>
	</div>
	@endsection
