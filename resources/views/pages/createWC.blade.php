@extends('layout.app')

@section('title', 'WCSEARCH')


@section('content')
<style media="screen">
  p{
    display: flex;
    justify-content: space-between;
  }
  label{
    width: 120px;
    margin-left: 10px;
  }
  input{
    display: flex;
    justify-content: flex-start;
    margin-right: 10px;
  }
  #mapid{
    height: 400px;
    width: 100%;
    margin-bottom: 10px;
  }
  form{
    margin-bottom: 30px;
  }
</style>
<div id="formWC">
  <h1>Crear WC</h1>
  <form method="post" action="{{route('wc.create')}}" enctype="multipart/form-data">
    @csrf
      <p><label>Nombre:</label><input type="text"name="nombre" class="form-control" value=""></p>
      <p>Dirección: (Busca la dirección mediante el buscador)</p>
      <div id="mapid"></div>
      <p><label>Horario Apertura:</label> <input type="time" class="form-control" name="horarioApertura" value=""></p>
      <p><label>Horario Cierre: </label><input type="time" class="form-control" name="horarioCierre" value=""></p>
      <p><label>24Horas: </label><select name="horas24" class="form-control" >
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select></p>
      <p><label>Foto: </label><input type="file" name="foto" class="form-control-file" ></p>
      <p><label>Precio: </label><input type="number" min="0" step="0.05" class="form-control" name="precio" value=""></p>
      <p><label>Accesible: </label><select name="accesibilidad" class="form-control" >
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select></p>
    <input type="submit" name="submit" class="btn btn-success" value="Enviar">
  </form>
</div>
@include('includes.geoscripts')
<script src="/js/map.js"></script>

  @endsection
