@extends('layout.login')

@section('content')
          <div class="masthead text-center d-flex">
            <div class="container my-auto">
                  <div class="img">
                    <img class="img-fluid" src="{{ asset('img/logo.ico')}}" alt="WCSearch">
                  </div>
            <div class="card">
                <div class="card-header">{{ __('Cuenta baneada') }}</div>

                <div class="card-body">
                    {{ __('Esta cuenta esta baneada desde '.Auth::user()->fecha_de_baneo) }}
                    <a style="color:blue;" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
