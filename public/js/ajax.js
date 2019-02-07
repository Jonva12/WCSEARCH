var api_token="";
function crearToken(code){
	api_token=code;
}
$( document ).ready(function() {
	var info={api_token:api_token};
	$.get("/api/notificaciones/tiene",info, function( data ) {
	  if(data=="1"){
	  	$('#notificaciones_nav').html('<i class="fa fa-exclamation fa-inverse"></i>');
	  }else{
	  	$('#notificaciones_nav').html('<i class="fa fa-bell"></i>');
	  }
	});
	$('body').click(function(){
		$.get( "/api/notificaciones/tiene",info, function( data ) {
		  if(data=="1"){
		  	$('#notificaciones_nav').html('<i class="fa fa-exclamation fa-inverse"></i>');
		  }else{
		  	$('#notificaciones_nav').html('<i class="fa fa-bell"></i>');
		  }
		});
	});

});


function getNotificaciones(){
	var info={api_token:api_token};
	$.get("/api/notificaciones/get",info, function( data ) {
		var texto="";
		if (data.length==0){
			texto+='<div class="dropdown-item">No tienes notificaciones</div>';
		}else{
			for (var i = 0; i < data.length; i++) {
			  	if(!data[i].leido){
			  		texto+='<div class="dropdown-item" onclick="leer('+data[i].id+', \''+data[i].link+'\')"><b>'+data[i].texto+'</b></div>';
			  	}else{
			  		texto+='<div class="dropdown-item" onclick="notificacionClick(\''+data[i].link+'\')" >'+data[i].texto+'</div>';
			  	}
			  	
	  		}
	  		texto+='<div class="dropdown-item" onclick="leerTodas()"><i>Marcar todas como leidas</i></div>';
	  	}

	  $('#notificaciones').html(texto);
	});
}

function leer(id, link){
	var info={api_token:api_token};
	$.get( "/api/notificaciones/leer/"+id,info, function( data ) {
		getNotificaciones();
		notificacionClick(link);
	});
}

function leerTodas(){
	var info={api_token:api_token};
	$.get( "/api/notificaciones/leerTodas",info, function( data ) {
		getNotificaciones();
	});
}
function notificacionClick(link){
	if(link!=null)
		window.location.href=link;
}

