@extends('layout.app')

@section('title', 'WCSEARCH')


@section('content')
<link rel="stylesheet" href="/css/createWC.css">
<div id="formWC">
  <h1>@lang('editWC.editWC')</h1>
  <form method="post" action="{{route('wc.update')}}" enctype="multipart/form-data" >
    @csrf
      <input type="hidden" name="id" value="{{$aseo->id}}">
      <p><label>@lang('editWC.Name'):</label><input type="text"name="nombre" class="form-control" value="{{$aseo->nombre}}"></p>
      <p>@lang('editWC.Direction')</p>
      <input type="text" id="latitud" name="latitud" value="{{$aseo->latitud}}" hidden>
      <input type="text" id="longitud" name="longitud" value="{{$aseo->longitud}}" hidden>
      <div id="mapid" ></div>
       
      <input type="text" id="dir" name="dir" value="{{$aseo->dir}}" hidden>
      <p><label>@lang('editWC.OpenTime'):</label> <input type="time" class="form-control" class="horario" name="horarioApertura" value="{{$aseo->horarioApertura}}"></p>
      <p><label>@lang('editWC.CloseTime'): </label><input type="time" class="form-control" class="horario" name="horarioCierre" value="{{$aseo->horarioCierre}}"></p>
      <p><label>@lang('editWC.24Hours'): </label><select name="horas24" id="horas24" class="form-control" >
          @switch($aseo->horas24)
            @case(0)
              <option value="1">@lang('editWC.Yes')</option>
              <option selected value="0">@lang('editWC.No')</option>
            @break
            @case(1)
              <option selected value="1">@lang('editWC.Yes')</option>
              <option value="0">@lang('editWC.No')</option>
            @break
            @default
              <option value="1">@lang('editWC.Yes')</option>
              <option value="0">@lang('editWC.No')</option>
            @endswitch
      </select></p>
      <p><label>@lang('editWC.Photo'): </label><input type="file" name="foto" class="form-control-file" ></p>
      <p><label>@lang('editWC.Price'): </label><input type="number" min="0" step="0.05" class="form-control" name="precio" value="{{$aseo->precio}}"></p>
      <p><label>@lang('editWC.Accessible'): </label><select name="accesibilidad" class="form-control" >
          @switch($aseo->accesibilidad)
            @case(0)
              <option value="1">@lang('editWC.Yes')</option>
              <option selected value="0">@lang('editWC.No')</option>
            @break
            @case(1)
              <option selected value="1">@lang('editWC.Yes')</option>
              <option value="0">@lang('editWC.No')</option>
            @break
            @default
              <option value="1">@lang('editWC.Yes')</option>
              <option value="0">@lang('editWC.No')</option>
            @endswitch
      </select></p>
    <input type="submit" name="submit" class="btn btn-success" value="@lang('editWC.Submit')">
  </form>
</div>
@include('includes.geoscripts')
<script src="/js/map.js" ></script>
<script >
        
      </script>
<script src="/js/createWC.js" onload="getAseoEdit({{$aseo->latitud}}, {{$aseo->longitud}})"></script>

  @endsection