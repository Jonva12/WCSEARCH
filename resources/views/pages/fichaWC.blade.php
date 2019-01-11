	@extends('layout.app')
	@section('title','WCSEARCH')
	@section('content')
	<style type="text/css">
		aside {
			box-shadow: 10px 0px 10px 1px #aaaaaa;
			padding: 0px !important;
		}
		aside img{
			width: 100%;
		}
		aside .general{
			color: white;
			background-color: #28a745;
			padding: 5px;
		}
		aside .info{
			padding-left: 15px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
	<div class="row">
		<aside class="col-md-3">
			<img src="{{url('storage/fotos/'.$aseo->foto)}}" alt="{{$aseo->foto}}">
			<div class="general">
				<h1>{{$aseo->nombre}}</h1>
				<p>Puntuacion: <b>4,2</b></p>
				<p>{{$aseo->dir}}</p>
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
					<p>Horario: {{$aseo->horarioApertura}}-{{$aseo->horarioCierre}}</p>
					<p>24horas: {{$aseo->horas24 == 1 ? ' Si' : ' No'}}</p>
					<p>Precio: {{$aseo->precio}} €</p>
					<p><i class="fas fa-wheelchair"></i>{{ $aseo->accesibilidad == 1 ? ' Accesible' : ' No Accesible' }}</p>
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
					<form>
						<input type="text" placeholder="Escribe tu comentario"><input type="submit" value="Comentar">
					</form>
					<div class="comentarios">
						<div class="comentario">
							<p class="usuario">Juan</p>
							<p class="fecha">2018-12-10</p>
							<p>El mejor baño que he probado en mi vida. Mis dieces :) </p>
							<div class="botones-like">
								<i class="fas fa-thumbs-up"></i>
								<i class="far fa-thumbs-down"></i>
							</div>

						</div>
						<div class="comentario">
							<p class="usuario">Tomas</p>
							<p class="fecha">2018-12-10</p>
							<p>Vendo opel corsa</p>
						</div>
					</div>
				</div>
			</div>
		</aside>
		<section class="col-md-9">
			<div id="mapid">

			</div>
		</section>
	</div>
	</div>
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
	</script>
	@include('includes.geoscripts')
	<script src="js/map.js"></script>
	@endsection
