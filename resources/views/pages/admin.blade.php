
  @extends('layout.layoutadmin')

  @section('title', 'WCSearch')

  @section('content')
  <style type="text/css">
  	.boton{
  		float:left;
  		width: 300px;
  		height: 100px;
  		border: 1px solid grey;
  		border-radius: 5px;
  		
  	}
  	.boton i{
  		font-size: 50px;
  	}
  </style>
  <section>
  	<div class="container">
  			<div class="boton" id="usuarios">
  				<i class="fas fa-users"></i>
  				<p>
	  				<b>1.023</b> Usuarios
  				</p>
  			</div>
  			<div class="boton" id="aseos">
  				<i class="fas fa-toilet"></i>
  				<p>
	  				<b>2.303</b> Aseos
  				</p>
  			</div>
  			<div class="boton" id="mensajes">
  				<i class="far fa-envelope"></i>
  				<p>
	  				<b>510</b> Mensajes
  				</p>
  			</div>
  	</div>
  </section>
  @endsection