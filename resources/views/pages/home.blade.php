@extends('layout.app')
@section('title','WCSEARCH')
@section('content')
<style type="text/css">
aside {
  box-shadow: 10px 8px 10px #aaaaaa;
  padding: 0px !important;
  overflow: auto;
}
aside img{
  width: 100%;
  height: 300px;
}
aside .general{
  color: white;
  background-color: #28a745;
  padding: 5px;
}
aside .info{
  padding-left: 15px;
}
#mapid{
  margin-top: 2px;
  height: 100%;
  width: 98.4%;

  position: fixed;
}
.fa-arrow-left{
  color: white;
  padding: 10px;
}
#error_zoom{
  color: white;
  width: 100%;
  height: 50px;
  text-align: center;
  background-color: #778899;
  margin-top: 0px;
  margin-left: auto;
  margin-right: auto;
  display: hidden;
}
.comentario{
  margin: 5px;
}
</style>


  @if(Session::has('status'))
  <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }}"><div>{{ Session::get('status') }}</div><i class="fas fa-times" onclick="cerrar()"></i></div>
  @endif
  <div class="container-fluid">
  <div class="row">
    <aside id="aside" class="col-md-3" hidden>
      <div class="atras" id="atrasServicio" onclick="volver()">
        <i class="fas fa-arrow-left fa-2x"></i>
      </div>
      <img alt="Imagen no disponible" id="imgWC">
      <div class="general">
        <h1 id="nombre"></h1>
        <p>Puntuacion: <b id="puntuacion"></b></p>
        <p id="dir"></p>
        <!-- <form method="post" action="ficha" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="file" class="form-control" name="foto">
          </div>
        </form> -->
      </div>
      <div class="info">
        <div class="detalles">
          <h2>Detalles</h2>
          <p>Horario: <span id="horario"></span></p>
          <p>Precio: <span id="precio"></span></p>
          <p><i class="fas fa-wheelchair"></i> <span id="accesible"></span></p>
        </div>
        <hr>
        <div class="valorar">
          <h2>Valoracion</h2>
          <div class="valoracion">
            <p>4,2 puntos</p>
            <p>(16 votos)</p>
          </div>
          <i onclick="valorar(1)" class="fas fa-star" id="estrella1"></i>
          <i onclick="valorar(2)" class="fas fa-star" id="estrella2"></i>
          <i onclick="valorar(3)" class="fas fa-star" id="estrella3"></i>
          <i onclick="valorar(4)" class="fas fa-star" id="estrella4"></i>
          <i onclick="valorar(5)" class="far fa-star" id="estrella5"></i>
        </div>
        <hr>
        <div>
          <h2>Comentarios</h2>
          <form action="#" onsubmit="return enviarComentario(event)">
            @csrf
            <input id="aseoComentario" type="text" hidden/>
            <input id="userComentario" type="text" value="{{Auth::user()->id}}" hidden/>
            <input id="textComentario" type="text" placeholder="Escribe tu comentario"/>
            <input type="submit" value="Comentar">
          </form>
          <div id="comentarios">
            <i>Cargando comentarios...</i>
            <div>
              <a href="#"><input type="button" name="editar" value="Editar"></a>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <section id="section" class="col-md-12">
      <div id="error_zoom">
        <p><h3>Haz zoom o realiza una busqueda para visualizar los aseos</h3></p>
      </div>
      <div id="mapid">

      </div>
    </section>
  </div>
  </div>
  @include('includes.geoscripts')

@if(isset($latitud)&&isset($longitud))
  <script src="/js/map.js" onload="getAseos2({{$latitud}}, {{$longitud}})"></script>
@else
  <script src="/js/map.js"></script>
@endif
  
  <script type="text/javascript">
            function valorar(n){
              for(var i=1; i<=5; i++){
                var estrella=document.getElementById('estrella'+i);
                if(i>n){
                  estrella.classList.add("far");
                  estrella.classList.remove("fas");
                }else{
                  estrella.classList.remove("far");
                  estrella.classList.add("fas");
                }
              }
            }

            function volver(){
                var mapaSection = document.getElementById('section');
                var aside = document.getElementById('aside');
                mapaSection.classList.remove('col-md-9');
                mapaSection.classList.add('col-md-12');
                aside.hidden = true;
            }
</script>
@endsection
