
$( document ).ready(function() {
	$.get("/api/notificaciones/tiene", function( data ) {
	  if(data=="1"){
	  	$('#notificaciones_nav').html('<i class="fa fa-exclamation fa-inverse"></i>');
	  }else{
	  	$('#notificaciones_nav').html('<i class="fa fa-bell"></i>');
	  }
	});
	$('body').click(function(){
		$.get( "/api/notificaciones/tiene", function( data ) {
		  if(data=="1"){
		  	$('#notificaciones_nav').html('<img src="/img/bell-svg.ico"></img>');
		  }else{
		  	$('#notificaciones_nav').html('<i class="fa fa-bell"></i>');
		  }
		});
	});

});


function getNotificaciones(){
	$.get("/api/notificaciones/get", function( data ) {
		var texto="";
		if (data.length==0){
			texto+='<div class="dropdown-item">No tienes notificaciones</div>';
		}else{
			for (var i = 0; i < data.length; i++) {
			  	if(!data[i].leido){
			  		texto+='<div class="dropdown-item" onclick="leer('+data[i].id+')"><b>'+data[i].texto+'</b></div>';
			  	}else{
			  		texto+='<div class="dropdown-item">'+data[i].texto+'</div>';
			  	}
	  		}
	  	}

	  $('#notificaciones').html(texto);
	});
}

function leer(id){
	$.get( "/api/notificaciones/leer/"+id, function( data ) {
		getNotificaciones();
	});
}

function uploadImage(image64){
	var form = new FormData();
form.append("image", "imagen en base 64");

var settings = {
  "url": "https://api.imgur.com/3/image",
  "method": "POST",
  "timeout": 0,
  "headers": {
    "Authorization": "Client-ID {{clientId}}"
  },
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};
$.ajax(settings).done(function (response) {
  console.log(response);
});
}
