@extends('layout.app')

@section('title', 'WCSEARCH')


@section('content')
<link rel="stylesheet" href="/css/createWC.css">
<div id="formWC">
  <h1>@lang('createWC.createWC')</h1>
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
  <form method="post" action="{{route('wc.create')}}" enctype="multipart/form-data">
    @csrf
      <p><label>@lang('createWC.Name'):</label><input type="text"name="nombre" class="form-control" value=""></p>
      <p>@lang('createWC.Direction')</p>
      <div id="mapid"></div>
      <input type="text" id="latitud" name="latitud" value="" hidden>
      <input type="text" id="longitud" name="longitud" value="" hidden>
      <input type="text" id="dir" name="dir" value="" hidden>
      <p>
        <label for="24h">@lang('createWC.24Hours')</label><input type="checkbox" name="24h" id="24h" value="1" style="margin-right: auto;">
        <label for="accesible">@lang('createWC.Accessible')</label><input type="checkbox" name="accesible" id="accesible" value="1" style="margin-right: auto;">
      <div id="horarioDiv" class="padding">
        <p>
          <label id="apertura">@lang('createWC.OpenTime'): </label>
          <input type="time" id="apertura" class="form-control" class="horario" name="horarioApertura" value="">
        </p>
        <p>
          <label for="cierre">@lang('createWC.CloseTime'): </label>
          <input type="time" id="cierre" class="form-control" class="horario" name="horarioCierre" value="">
        </p>
      </div>
      <p><label>@lang('createWC.Photo'): </label><input type="file" name="foto" class="form-control-file" ></p>
      <p><label>@lang('createWC.Price'): </label><input type="number" min="0" step="0.05" class="form-control" name="precio" value=""></p>
    <input type="submit" name="submit" class="btn btn-success" value="@lang('createWC.Submit')">
  </form>
</div>
@include('includes.geoscripts')
<script charset="UTF-8" src="/js/map.js"></script>
<script charset="UTF-8" src="/js/createWC.js"></script>

  @endsection
