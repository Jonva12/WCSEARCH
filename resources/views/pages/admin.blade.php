
  @extends('layout.layoutadmin')

  @section('title', 'WCSearch')

  @section('content')
  <style type="text/css">
  	.boton{
  		float: left;
  		width: 20%;
  		height: 100px;
  		border: 1px solid grey;
  		border-radius: 10px;
  		padding: 10px;
  		margin: 10px;
  	}
  	.boton:hover{
  		background-color: blue;
  	}
  	.boton i{
  		font-size: 50px;
  	}
  </style>
  <section>
  	<div class="container">
		<a href="">
			<div class="boton">
				<i class="fas fa-users"></i>
				<p>
					<b>1.023</b> Usuarios
				</p>
			</div>
		</a>
		<a href="">
			<div class="boton">
				<i class="fas fa-map-marker-alt"></i>
				<p>
					<b>2.303</b> Aseos
				</p>
			</div>
		</a>
		<a href="">
			<div class="boton">
				<i class="far fa-envelope"></i>
				<p>
					<b>510</b> Mensajes
				</p>
			</div>
		</a>
  	</div>
  </section>
  @endsection