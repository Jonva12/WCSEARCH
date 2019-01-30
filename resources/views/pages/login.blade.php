@extends('layout.login')

@section('title', 'Login')

@section('content')


  <div class="masthead text-center text-white d-flex">
    <div class="container my-auto">
          <div class="img">
            <img class="img-fluid" src="img/logo.ico" alt="WCSearch">
          </div>
          <form method="post" action="{{ route('login') }}">
            @csrf

           <div class="form-group">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert" id="alert">
                  <div><strong>El correo electrónico y la contraseña que ingresaste no coinciden con nuestros registros.</strong> Por favor, revisa e inténtalo de nuevo.</div>
                  <i id="x" class="fas fa-times"></i>
                </div>
              @endif
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

           </div>

           <div class="form-group">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="contraseña" required>
           </div>
           <div class="forgot">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  {{ __('Recordar Usuario') }}
                </label>
            </div>
            <div>
            @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('¿Has olvidado la contraseña?') }}
              </a>
            @endif
            </div>
            <div>
              <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
              </button>
            </div>
       </form>
      </div>
    </div>

  @endsection
