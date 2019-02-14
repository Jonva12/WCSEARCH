@extends('layout.login')

@section('content')
          <div class="masthead text-center d-flex">
            <div class="container my-auto">
                  <div class="img">
                    <img class="img-fluid" src="{{ asset('img/logo.ico')}}" alt="WCSearch">
                  </div>
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se te ha enviado un link de verificacion a tu correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor comprueba en tu email el link de verificacion.') }}
                    {{ __('Si no has recibido nada') }}, <a id="verify" href="{{ route('verification.resend') }}">{{ __('pulsa aqui para que se reenvie.') }}</a>.
                    <div style="margin-top: 10%;">
                      <a class="btn btn-link" style="color: white;"  href="{{ route('home') }}">
                        {{ __('Volver al mapa') }}
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
