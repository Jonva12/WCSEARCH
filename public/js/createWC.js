searchControl.on('results', function(e){
  var latitud = e.latlng.lat;
  document.getElementById('latitud').value = latitud;
});
searchControl.on('results', function(e){
  var longitud = e.latlng.lng;
  document.getElementById('longitud').value = longitud;
});
searchControl.on('results', function(e){
  var dir = e.text;
  document.getElementById('dir').value = dir;
});

$("input[name*=horarioApertura],input[name*=horarioCierre]").change(function(){
  var apertura=$("input[name*=horarioApertura]").val();
  var cierre=$("input[name*=horarioCierre]").val();
  if (apertura!=null && cierre!=null){
    $('#24h').val('0');
  }

});
function horario(){
  var apertura=$("input[name*=horarioApertura]");
  var cierre=$("input[name*=horarioCierre]");
  if($('#24h').is(':checked')){
    apertura.val(null);
    cierre.val(null);
    apertura.prop('disabled', true);
    cierre.prop('disabled', true); 
    $("#horarioDiv").hide( "slow" );
  }else{
    apertura.prop('disabled', false);
    cierre.prop('disabled', false); 
    $("#horarioDiv").show( "slow" );
  }
}

horario();

$('#24h').click(function(){
  horario();
});

function foto(){
  var foto=$("input[name*=foto]");
  if(!$('#camFoto').is(':checked')){
    foto.val(null);
    foto.prop('disabled', true);
    $("#fotoDiv").hide( "slow" );
  }else{
    foto.prop('disabled', false);
    $("#fotoDiv").show( "slow" );
  }
}

$('#camFoto').click(function(){
  foto();
});

var marker1 = null;
function onMapClick(e) {
  if (marker1 !== null) {
        mapa.removeLayer(marker1);
    }
    marker1 = L.marker(e.latlng,{icon:aseoIcon}).addTo(mapa);


    document.getElementById('latitud').value = e.latlng.lat;
    document.getElementById('longitud').value = e.latlng.lng;
    $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat='+e.latlng.lat+'&lon='+e.latlng.lng, function(data){
      var dir=data.display_name;
      
      document.getElementById('dir').value =dir.replace(/undefined, /g,'');
    });
    
}
mapa.on('click', onMapClick);

function getAseoEdit(x,y){
          limpiarMapaAseos();
          var loc={lat: x, lng: y};
          var e={latlng:loc};
          onMapClick(e);
          setVista(loc.lat,loc.lng);
}