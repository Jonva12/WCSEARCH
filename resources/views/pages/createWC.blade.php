@extends('layout.app')

@section('title', 'WCSEARCH')

@section('content')
  <form method="post" action="{{route('wc.create')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      Nombre: <input type="text"name="nombre" value="">
      <input type="text"  name="localizacion" hidden value="43.12345, -1.92345756">
      Dirección: <input type="text" name="dir" value="">
      Horario Apertura: <input type="time" name="horarioApertura" value="">
      Horario Cierre: <input type="time" name="horarioCierre" value="">
      24Horas: <select name="horas24">
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>
      Foto: <input type="file" name="foto">
      Precio: <input type="number" name="precio" value="">
      Accesible: <select name="accesibilidad">
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>
    <input type="submit" name="submit" value="Enviar">
    </div>
  </form>

  @endsection
