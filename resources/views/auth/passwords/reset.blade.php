@extends('layout.login')

@section('content')
<div class="masthead text-center text-white d-flex">
  <div class="container my-auto">
        <div class="img">
          <img class="img-fluid" src="{{ asset('img/logo.ico')}}" alt="WCSearch">
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
            @csrf

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="form-group">
                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                        @endif
                  </div>
              </div>

              <div class="form-group">

                  <div class="col-md-12">
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Nueva Contraseña" name="password" required>

                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-12">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma Contraseña"required>
                  </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('RESETEAR CONTRASEÑA') }}
                  </button>
                </div>
            </div>
        </form>
      </div>
   </div>
</div>

@endsection
