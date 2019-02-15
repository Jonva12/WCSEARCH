@extends('layout.app')

@section('title', 'WCSEARCH')


@section('content')
<link rel="stylesheet" href="/css/createWC.css">
<div id="formWC">
  <h1>@lang('editWC.editWC')</h1>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                @if(!strpos($error,'latitud') && !strpos($error,'longitud'))
                  <li>{{ $error }}</li>
                @endif
              @endforeach

              @if($errors->has('latitud') || $errors->has('longitud'))
                <li>Introduce una direccion</li>
              @endif
          </ul>
      </div>
    @endif
  <form method="post" action="{{route('wc.update')}}" enctype="multipart/form-data" >
    @csrf
      <input type="hidden" name="id" value="{{$aseo->id}}">
      <p><label>@lang('editWC.Name'):</label><input type="text"name="nombre" class="form-control" value="{!!$aseo->nombre!!}"></p>
      <p>@lang('editWC.Direction')</p>
      <input type="text" id="latitud" name="latitud" value="{{$aseo->latitud}}" hidden>
      <input type="text" id="longitud" name="longitud" value="{{$aseo->longitud}}" hidden>
      <div id="mapid" ></div>

      <input type="text" id="dir" name="dir" value="{!!$aseo->dir!!}" hidden>
      <p>
        @if($aseo->horas24)
          <label for="24h">@lang('editWC.24Hours')</label><input type="checkbox" name="24h" id="24h" value="1" style="margin-right: auto;" checked>
        @else
          <label for="24h">@lang('editWC.24Hours')</label><input type="checkbox" name="24h" id="24h" value="1" style="margin-right: auto;">
        @endif
        @if($aseo->accesibilidad)
          <label for="accesible">@lang('editWC.Accessible')</label><input type="checkbox" name="accesible" id="accesible" value="1" style="margin-right: auto;"checked >
        @else
          <label for="accesible">@lang('editWC.Accessible')</label><input type="checkbox" name="accesible" id="accesible" value="1" style="margin-right: auto;">
        @endif
      <div id="horarioDiv" class="padding">
        <p>
          <label id="apertura">@lang('editWC.OpenTime'): </label>
          <input type="time" id="apertura" class="form-control" class="horario" name="horarioApertura" value="{{$aseo->horarioApertura}}">
        </p>
        <p>
          <label for="cierre">@lang('editWC.CloseTime'): </label>
          <input type="time" id="cierre" class="form-control" class="horario" name="horarioCierre" value="{{$aseo->horarioCierre}}">
        </p>
      </div>
      <p><label>@lang('editWC.Price'): </label><input type="number" min="0" step="0.05" class="form-control" name="precio" value="{{$aseo->precio}}"></p>
      <hr>
      <p>
        <label for="camFoto">@lang('editWC.Photo'):</label><input type="checkbox" name="camFoto" id="camFoto" value="1" style="margin-right: auto;">
      </p>
      <p id="fotoDiv">
        <label>@lang('editWC.Photo2'): </label><input type="file" name="foto" class="form-control-file" ></p>

    <input type="submit" name="submit" class="btn btn-success" value="Enviar">
  </form>
</div>
@include('includes.geoscripts')
<script charset="UTF-8" src="/js/map.js" ></script>
<script charset="UTF-8" src="/js/createWC.js" onload="getAseoEdit({{$aseo->latitud}}, {{$aseo->longitud}})"></script>

  @endsection
