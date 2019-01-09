$( document ).ready(function() {
	$.get( "/api/notificaciones/tiene", function( data ) {
	  if(data==1){
	  	document.getElementByID('notificaciones_nav').innerHTML='<a class="nav-link" href="#"><i class="fa fa-exclamation"></i></a>';
	  }else{
	  	document.getElementByID('notificaciones_nav').innerHTML='<a class="nav-link" href="#"><i class="fa fa-bell"></i></a>';
	  }
	});
});