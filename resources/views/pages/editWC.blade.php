@extends('layout.app')

@section('title', 'WCSEARCH')


@section('content')
<link rel="stylesheet" href="/css/createWC.css">
<div id="formWC">
  <h1>Editar WC</h1>
  <form method="post" action="{{route('wc.update')}}" enctype="multipart/form-data" >
    @csrf
      <input type="hidden" name="id" value="{{$aseo->id}}">
      <p><label>Nombre:</label><input type="text"name="nombre" class="form-control" value="{{$aseo->nombre}}"></p>
      <p>Dirección: (Haz click para colocar el marcador)</p>
      <input type="text" id="latitud" name="latitud" value="{{$aseo->latitud}}" hidden>
      <input type="text" id="longitud" name="longitud" value="{{$aseo->longitud}}" hidden>
      <div id="mapid" ></div>

      <input type="text" id="dir" name="dir" value="{{$aseo->dir}}" hidden>
      <p><label>Horario Apertura:</label> <input type="time" class="form-control" class="horario" name="horarioApertura" value="{{$aseo->horarioApertura}}"></p>
      <p><label>Horario Cierre: </label><input type="time" class="form-control" class="horario" name="horarioCierre" value="{{$aseo->horarioCierre}}"></p>
      <p><label>24Horas: </label><select name="horas24" id="horas24" class="form-control" >
          @switch($aseo->horas24)
            @case(0)
              <option value="1">Si</option>
              <option selected value="0">No</option>
            @break
            @case(1)
              <option selected value="1">Si</option>
              <option value="0">No</option>
            @break
            @default
              <option value="1">Si</option>
              <option value="0">No</option>
            @endswitch
      </select></p>
      <p><label>Foto: </label><input type="file" name="foto" class="form-control-file" ></p>
      <p><label>Precio: </label><input type="number" min="0" step="0.05" class="form-control" name="precio" value="{{$aseo->precio}}"></p>
      <p><label>Accesible: </label><select name="accesibilidad" class="form-control" >
          @switch($aseo->accesibilidad)
            @case(0)
              <option value="1">Si</option>
              <option selected value="0">No</option>
            @break
            @case(1)
              <option selected value="1">Si</option>
              <option value="0">No</option>
            @break
            @default
              <option value="1">Si</option>
              <option value="0">No</option>
            @endswitch
      </select></p>
    <input type="submit" name="submit" class="btn btn-success" value="Enviar">
  </form>
</div>
@include('includes.geoscripts')
<script charset="UTF-8" src="/js/map.js" ></script>
<script charset="UTF-8" src="/js/createWC.js" onload="getAseoEdit({{$aseo->latitud}}, {{$aseo->longitud}})"></script>

  @endsection
