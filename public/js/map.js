var aseo={};
var mapa = L.map('mapid').setView([43.385537, -1.949364], 3);
mapa.addEventListener('moveend', function(ev) {
	if (document.getElementById("error_zoom")) {
	   var centro=mapa.getCenter();
	   var zoom=mapa.getZoom();
	   if(false){
	   		limpiarMapaAseos();
	   		document.getElementById('error_zoom').style.display='block';
	   }else{
	   		getAseos(centro.lat,centro.lng);
	   		document.getElementById('error_zoom').style.display='none';
	   }
	   //lat = ev.latlng.lat;
	   //lng = ev.latlng.lng;
	   console.log(centro, zoom);
	}
});

var baselayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets',
	}).addTo(mapa);

var toplayer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets-satellite',
	});

	var layers = {
		'Basico': baselayer,
		'Satelite': toplayer
	};

	L.control.layers(layers).addTo(mapa);


// 	$('#geolocate').on('click', function(){
//   mapa.locate({setView: true, maxZoom: 15});
// });

	// create the geocoding control and add it to the map
	 var searchControl = L.esri.Geocoding.geosearch({
  	useMapBounds:false,																			//quitar filtración de mapa
  	providers: [ L.esri.Geocoding.arcgisOnlineProvider() ] //de donde pilla la data
	}).addTo(mapa);

	 // create an empty layer group to store the results and add it to the map
	 var results = L.layerGroup().addTo(mapa);

	 // listen for the results event and add every result to the map
	 searchControl.on("results", function(data) {
			 results.clearLayers();
			 for (var i = data.results.length - 1; i >= 0; i--) {
					 results.addLayer(L.marker(data.results[i].latlng));
					 getAseos(data.results[i].latlng.lat,data.results[i].latlng.lng);
			 }
	 });



// function onLocationFound(e) {
//     var radius = e.accuracy / 5;
//     L.marker(e.latlng).addTo(mapa)
//         .on('click', function(){
//           confirm("are you sure?");
//         });
//     L.circle(e.latlng, radius).addTo(mapa);
// }
//
// mapa.on('locationfound', onLocationFound);
//
// function onLocationError(e) {
//     alert(e.message);
// }
// mapa.on('locationerror', onLocationError);
var aseos=[];

var aseoIcon = L.icon({
    iconUrl: '/img/marker.png',

    iconSize:     [25, 35], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

function getAseos(x,y){
	if (aseos!== 'undefined'){
		for(var i=0;i<aseos.length;i++){
			aseos[i].nuevo=false;
		}
	}
	var loc={latitud: x, longitud: y}
	$.get( "/api/aseo", loc, function( data ) {
		if (mapa.getZoom()<12){
			var margena=0.3*(12-mapa.getZoom());
			var grupuk=[];
			for (var i=0;i< data.length;i++){
				var nuevo=true;
				for(var j=0;j< grupuk.length;j++){//grupoko batek gertuko coordenadak bazauzkeik aldau kopuru numerue ta ez gorde berrixe bezela
					if ((Number(grupuk[j].latitud) > Number(data[i].latitud)-margena && Number(grupuk[j].latitud) < Number(data[i].latitud)+margena) 
						&& (Number(grupuk[j].longitud) > Number(data[i].longitud)-margena && Number(grupuk[j].longitud) < Number(data[i].longitud)+margena)){
						grupuk[j].latitud= (Number(grupuk[j].latitud)+Number(data[i].latitud))/2;
						grupuk[j].longitud= (Number(grupuk[j].longitud)+Number(data[i].longitud))/2;
						grupuk[j].kop+=1;
						nuevo=false;
					}
				}

				if(nuevo){//forra pasau tagero berrixe ba ein grupo berri bat bakarrakin
					data[i].kop=1;
					grupuk.push(data[i]);
				}
			}
			//jarri grupun markadorik
			for (var i=0;i<grupuk.length;i++){
				if (grupuk[i].kop!=1){
					var marker=L.marker([grupuk[i].latitud, grupuk[i].longitud],{title: 'Aqui hay '+grupuk[i].kop+' aseos'}).on('click',zoom).addTo(mapa);
				}else{
					var marker=L.marker([grupuk[i].latitud, grupuk[i].longitud],{icon:aseoIcon}).on('click',markerOnClick).addTo(mapa);
				}
				marker.aseo=data[i].id;
				marker.nuevo=true;
				aseos.push(marker);
			}

		}else{
			for (var i=0;i<data.length;i++){
				var marker=L.marker([data[i].latitud, data[i].longitud],{icon:aseoIcon}).on('click',markerOnClick).addTo(mapa);
				marker.aseo=data[i].id;
				marker.nuevo=true;
				aseos.push(marker);
			}
		}
		limpiarMapaAseosViejos();
	});



}

function zoom(e){
	mapa.setView([e.latlng.lat,e.latlng.lng],mapa.getZoom()+2);
}

function getAseos2(x,y){
	limpiarMapaAseos();
	setVista(x,y);
	var loc={latitud: x, longitud: y}
	$.get( "/api/aseo", loc, function( data ) {
		for (var i=0;i<data.length;i++){
			var marker=L.marker([data[i].latitud, data[i].longitud],{icon:aseoIcon}).on('click',markerOnClick).addTo(mapa);
			marker.aseo=data[i].id;
			aseos.push(marker);
		}
	});
}

/*function getAseoEdit(x,y){
	console.log('entra');
	limpiarMapaAseos();
	var latitud=x;
	var longitud=y;
	alert(latitud);
	//var loc={latitud: x, longitud: y}
	setVista(latitud.lat,longitud.lng);
}*/
function limpiarMapaAseosViejos(){
	for (var i=0;i<aseos.length;i++){
		if (!aseos[i].nuevo){
			mapa.removeLayer(aseos[i]);
		}
	}
}
function limpiarMapaAseos(){
	for (var i=0;i<aseos.length;i++){
		mapa.removeLayer(aseos[i]);
	}
}

function limpiarMapa(){
	for (var i=0;i<aseos.length;i++){
		mapa.removeLayer(aseos[i]);
	}
	results.clearLayers();
}

function markerOnClick(e){
		var mapaSection = document.getElementById('section');
    var aside = document.getElementById('aside');
    mapaSection.classList.remove('col-md-12');
    mapaSection.classList.add('col-md-9');
    aside.hidden = false;
	setVista(e.latlng.lat,e.latlng.lng);
	aseo={id: e.target.aseo};
 	$.get( "/api/aseo/"+ aseo.id, function( data ) {
		cambiarInfoFicha(data);
	});
	getComentarios();
}
function setVista(x,y){
	mapa.setView([x, y],16);
}
function enviarPuntos(n){
	var data = {
		voto: n
	}
	$.get("/api/aseo/"+aseo.id+"/valorar",data, function(result){
		document.getElementById("puntuacion").innerHTML=result.numPuntuacion/result.countPuntuacion;
		var text="";
		for (var i=0; i<5;i++){
			if (i<result.numPuntuacion/result.countPuntuacion){
				text+='  <i class="fas fa-star" ></i>';
			}else{
				text+='  <i class="far fa-star" ></i>';
			}
		}
		document.getElementById("puntuacionEstre").innerHTML=text;
		valorar(n);
	});
}

function cambiarInfoFicha(data){
	console.log(data.foto);
	if(data.foto == 'wc.jpg'){
		document.getElementById("imgWC").src = "/img/"+data.foto;
	}else{
		document.getElementById("imgWC").src=data.foto; //link de la foto
	};
	document.getElementById("nombre").innerHTML=data.nombre;

	esMio(data.user_id, data.id);

	document.getElementById("puntuacion").innerHTML=isNaN(data.numPuntuacion/data.countPuntuacion) ? 0 : data.numPuntuacion/data.countPuntuacion;
	var text="";
	for (var i=0; i<5;i++){
		if (i<data.numPuntuacion/data.countPuntuacion){
			text+='  <i class="fas fa-star" ></i>';
		}else{
			text+='  <i class="far fa-star" ></i>';
		}
	}
	document.getElementById("puntuacionEstre").innerHTML=text;
	document.getElementById("dir").innerHTML=data.dir;
	document.getElementById("horario").innerHTML=data.horas24 == 1
		? "24 horas"
		: data.horarioApertura.substring(0, 5)+" - "+data.horarioCierre.substring(0,5);
	document.getElementById("precio").innerHTML=data.precio==null?"GRATIS": data.precio+" €";
	document.getElementById("accesible").innerHTML=data.accesibilidad==1?"Accesible":"No accesible";
	valorar(0);
}
function newComentario(c,mio){
	return '<div class="card comentario">'+
      				'<div class="card-body">'+
				          '<div class="row">'+
				              '<div class="col-md-12">'+
				                  '<p>'+
				                      '<a class="float-left" href="/usuario/p/'+c.user_id+'"><strong>'+c.usuario.name+'</strong> '+(mio?'<i class="fas fa-pen" ></i>':'')+
															'</a><span class="float-right">'+c.time+'</span>'+
				                 '</p>'+
				                 '<div class="clearfix"></div>'+
				                  '<p>'+c.text+'</p>'+
				                  '<p>'+
				                      '<a onclick="votar('+c.id+',false)" class="float-right btn btn-outline-danger ml-2">'+c.dislike+' <i class="fa fa-thumbs-down"></i></a>'+
				                      '<a onclick="votar('+c.id+',true)" class="float-right btn btn-outline-primary ml-2">'+c.like+' <i class="fa fa-thumbs-up"></i></a>'+
				                      (mio?'<a onclick="deleteComentario('+c.id+')" class="float-right btn btn-outline-secondary"> <i class="fa fa-trash-alt"></i></a>':'')+
				                 '</p>'+
				              '</div>'+
				          '</div>'+
				      '</div>'+
				  '</div>';
}
function getComentarios(){

	$.get( "/api/comentarios/"+aseo.id+"/mios" , function( data ) {
 		var comentarios="";
		for(var i=0;i<data.length;i++){
			comentarios+=newComentario(data[i], true);
		}
		$.get( "/api/comentarios/"+aseo.id , function( data ) {
			for(var i=0;i<data.length;i++){
				comentarios+=newComentario(data[i], false);
			}
			if(comentarios==""){
				comentarios="<i>No hay comentarios</i>";
			}
			document.getElementById("comentarios").innerHTML=comentarios;
		});
	});
}

function enviarComentario(e){
	e.preventDefault();
	var text=document.getElementById("textComentario").value;
	var data={text:text};
	$.get( "/api/comentarios/"+aseo.id+"/comentar", data, function( data ) {
		getComentarios();
		document.getElementById("textComentario").value="";
	});
	return false;
}

function deleteComentario(id){
	$.get( "/api/comentarios/"+id+"/eliminar", function( data ) {
		getComentarios();
	});

}

function votar(coment,bool){
	var data={voto:bool};
	$.get( "/api/comentarios/"+coment+"/valorar", data, function( data ) {
	    getComentarios();
	});
}
