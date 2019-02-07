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
  padding-left: 15px;
}
aside .info{
  padding-left: 15px;
}
#mapid{
  margin-top: 2px;
  height: 100vh;
  width: 98.4%;
  position: fixed;
}
.fa-arrow-left{
  color: white;
  padding: 10px;
}

.comentario{
  margin: 5px;
}
textarea{
  border-radius: 5px;
  width: 90%;
}
.fake-link{
    cursor: pointer;
}

@media(max-width: 700px){
  .float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#28A745;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
  }
  .my-float{
    margin-top: 15px;
    font-size: 24pt;
    color: white;
  }
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
        <p><b id="puntuacion"></b>
          <span id="puntuacionEstre"></span>
          </p>
        <a href="" class="btn btn-light" id="editarLink">Editar <i class="fas fa-edit"></i></a>
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
          <br>
          <a class="fake-link" onclick="reportBox()"><i>Reportar aseo</i></a>
          <div id="reportDiv" style="display: none;">
            <select id="tipoRep">
              <option value="Informacion incorrecta" selected>Informacion incorrecta</option>
              <option value="El baño no existe">El baño no existe</option>
            </select>
            <br>
            <textarea id="comentarioRep" placeholder="Comentario (opcional)"></textarea>
            <br>
            <button class="btn btn-danger" onclick="reportar()">Reportar</button>
          </div>
        </div>
        <hr>
        <div class="valorar">
          <h2>Valorar</h2>
          @auth
          <i onclick="enviarPuntos(1)" class="far fa-star" id="estrella1" value="1"></i>
          <i onclick="enviarPuntos(2)" class="far fa-star" id="estrella2" value="2"></i>
          <i onclick="enviarPuntos(3)" class="far fa-star" id="estrella3" value="3"></i>
          <i onclick="enviarPuntos(4)" class="far fa-star" id="estrella4" value="4"></i>
          <i onclick="enviarPuntos(5)" class="far fa-star" id="estrella5" value="5"></i>
          @endauth
          @guest
            <i>Inicia sesion para poder valorar</i>
          @endguest
        </div>
        <hr>
        <div>
          <h2>Comentarios</h2>
          @auth
            <form action="#" onsubmit="return enviarComentario(event)">
              @csrf
              <textarea id="textComentario" placeholder="Escribe tu comentario"></textarea>
              <input type="submit" value="Comentar">
            </form>
          @endauth
          <div id="comentarios">
            <i>Cargando comentarios...</i>
          </div>
        </div>
      </div>
    </aside>
    <section id="section" class="col-md-12">
      <style type="text/css">
        .my-custom-icon{
          width: 28px !important;
          height: 27px !important;
          margin-left: -12px;
          margin-top: -12px;
          border-radius: 18px;
          border: 2px solid rgb(255, 75, 75);
          text-align: center;
          color: white;
          background-color: rgba(255, 75, 75, 0.6);
          font-size: 14px;
          font-weight: bold;
        }
      </style>
      <div id="mapid">

      </div>
      <a class="float"><i class="fa fa-plus my-float"></i></a>

    </section>
  </div>
  </div>
  @include('includes.geoscripts')

@if(isset($latitud)&&isset($longitud))
  @if(Auth::user())
    <script src="/js/map.js" onload="setToken('{{Auth::user()->api_token}}'); getAseos2({{$latitud}}, {{$longitud}})"></script>
  @else
    <script src="/js/map.js" onload="getAseos2({{$latitud}}, {{$longitud}})"></script>
  @endif
@elseif(Auth::user())
  <script src="/js/map.js" onload="setToken('{{Auth::user()->api_token}}');getAseos()"></script>
@else
  <script src="/js/map.js" onload="getAseos()"></script>
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
            function esMio(idUsuario,id){
              @guest
                editarLink.href="";
                editarLink.hidden = true;
              @endguest
              @auth
                var editarLink=document.getElementById("editarLink");
                if ({{Auth::user()->id}}==idUsuario){
                  editarLink.href="/editWC/"+id;
                  editarLink.hidden = false;
                }else{
                  editarLink.href="";
                  editarLink.hidden = true;
                }
              @endauth

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
