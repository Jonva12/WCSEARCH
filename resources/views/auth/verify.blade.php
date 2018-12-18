@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se te ha enviado un link de verificacion a tu correo.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor comprueba en tu email el link de verificacion.') }}
                    {{ __('Si no has recibido nada') }}, <a href="{{ route('verification.resend') }}">{{ __('pulsa aqui para que se reenvie.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
