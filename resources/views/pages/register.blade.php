
@extends('layout.login')

@section('title', 'Registro')

@section('content')


  <div class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="column">
        <form id="login">
          <img class="img-fluid rounded float-center" src="img/logo.ico" alt="WCSearch">
          <div class="form-group">
              <input type="text" class="form-control" id="inputUsuario" placeholder="Nombre de Usuario">
          </div>
           <div class="form-group">
               <input type="email" class="form-control" id="inputEmail" placeholder="Email">
           </div>
           <div class="form-group">
               <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
           </div>
           <div class="form-group">
               <input type="password" class="form-control" id="inputPassword" placeholder="Repite Contraseña">
           </div>
           <input type="submit" class="btn btn-primary" value="Registrarse">
       </form>
      </div>
    </div>
  </div>



  @endsection
