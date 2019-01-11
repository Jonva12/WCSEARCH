
@extends('layout.login')

@section('title', 'Registro')

@section('content')


  <div class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <form id="register" method="POST" action="{{ route('register') }}">
        @csrf
        <img class="img-fluid rounded float-center" src="img/logo.ico" alt="WCSearch">
          <div class="form-group">
              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus min="2" max="255">
              @if ($errors->has('name'))
              <br>
              <br>
                <span class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
          </div>
           <div class="form-group">
               <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required min="6" max="255">
                @if ($errors->has('email'))
                <br>
                <br>
                  <span class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
           </div>
           <div class="form-group">
               <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Contraseña" name="password" required min="6" max="255">
                @if ($errors->has('password'))
                <br>
                <br>
                  <span class="alert alert-danger" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
           </div>
           <div class="form-group">
               <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Repite Contraseña" required oninput="comporbarPassword()">
               <script>
                function comporbarPassword(){
                  var pass= document.getElementById('password').value;
                  var pass2= document.getElementById('password-confirm');
                  var submit= document.getElementById('submit');
                  if (pass==pass2.value){
                    pass2.classList.remove("is-invalid");
                    submit.disabled = false;
                  }else{
                    pass2.classList.add("is-invalid");
                    submit.disabled = true;
                  }
                }
               </script>
           </div>
            <button type="submit" id="submit" class="btn btn-primary">
              {{ __('Registrarse') }}
            </button>
       </form>
    </div>
  </div>




  @endsection
