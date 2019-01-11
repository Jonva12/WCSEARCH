$( document ).ready(function() {
	$.get( "http://localhost:8000/api/notificaciones/tiene", function( data ) {
	  if(data=="1"){
	  	$('#notificaciones_nav').html('<i class="fa fa-exclamation fa-inverse"></i>');
	  }else{
	  	$('#notificaciones_nav').html('<i class="fa fa-bell"></i>');
	  }
	});
	$('body').click(function(){
		$.get( "http://localhost:8000/api/notificaciones/tiene", function( data ) {
		  if(data=="1"){
		  	$('#notificaciones_nav').html('<i class="fa fa-exclamation fa-inverse"></i>');
		  }else{
		  	$('#notificaciones_nav').html('<i class="fa fa-bell"></i>');
		  }
		});
	});

});


function getNotificaciones(){
	$.get( "http://localhost:8000/api/notificaciones/get", function( data ) {
		var texto="";
	  for (var i = 0; i < data.length; i++) {
	  	if(!data[i].leido){
	  		texto+='<div class="dropdown-item" onclick="leer('+data[i].id+')"><b>'+data[i].texto+'</b></div>';
	  	}else{
	  		texto+='<div class="dropdown-item">'+data[i].texto+'</div>';
	  	}
	  }
	  $('#notificaciones').html(texto);
	});
}

function leer(id){
	$.get( "http://localhost:8000/api/notificaciones/leer/"+id, function( data ) {
		getNotificaciones();
	});
}

function buscarCiudad(i){
	alert('Holaa');
}
