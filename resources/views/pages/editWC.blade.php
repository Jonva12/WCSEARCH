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

      <p>
        @if($aseo->horas24)
          <label for="24h">24 horas</label><input type="checkbox" name="24h" id="24h" value="1" style="margin-right: auto;" checked>
        @else
          <label for="24h">24 horas</label><input type="checkbox" name="24h" id="24h" value="1" style="margin-right: auto;">
        @endif
        @if($aseo->accesibilidad)
          <label for="accesible">Accesible</label><input type="checkbox" name="accesible" id="accesible" value="1" style="margin-right: auto;"checked >
        @else
          <label for="accesible">Accesible</label><input type="checkbox" name="accesible" id="accesible" value="1" style="margin-right: auto;">
        @endif
      <div id="horarioDiv" class="padding">
        <p>
          <label id="apertura">Apertura: </label>
          <input type="time" id="apertura" class="form-control" class="horario" name="horarioApertura" value="{{$aseo->horarioApertura}}">
        </p>
        <p>
          <label for="cierre">Cierre: </label>
          <input type="time" id="cierre" class="form-control" class="horario" name="horarioCierre" value="{{$aseo->horarioCierre}}">
        </p>
      </div>
      <p><label>Precio: </label><input type="number" min="0" step="0.05" class="form-control" name="precio" value="{{$aseo->precio}}"></p>
      <hr>
      <p>
        <label for="camFoto">Cambiar foto:</label><input type="checkbox" name="camFoto" id="camFoto" value="1" style="margin-right: auto;">
      </p>
      <p id="fotoDiv">
        <label>Foto: </label><input type="file" name="foto" class="form-control-file" ></p>
      
    <input type="submit" name="submit" class="btn btn-success" value="Enviar">
  </form>
</div>
@include('includes.geoscripts')
<script src="/js/map.js" ></script>
<script >
        
      </script>
<script src="/js/createWC.js" onload="getAseoEdit({{$aseo->latitud}}, {{$aseo->longitud}});foto()"></script>

  @endsection