
@extends('layout.login')

@section('title', 'Registro')

@section('content')


  <div class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <form id=register method="POST" action="{{ route('register') }}">
        @csrf
        <img class="img-fluid rounded float-center" src="img/logo.ico" alt="WCSearch">
          <div class="form-group">
              <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
          </div>
           <div class="form-group">
               <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
           </div>
           <div class="form-group">
               <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Contraseña" name="password" required>
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
           </div>
           <div class="form-group">
               <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Repite Contraseña">
           </div>
            <button type="submit" class="btn btn-primary">
              {{ __('Registrarse') }}
            </button>
       </form>
    </div>
  </div>




  @endsection
