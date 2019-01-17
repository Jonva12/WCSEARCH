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

$("input[name*=horarioApertura]").on('keydown', function(){
  $('#horas24').val('0');
  $('#horas24').prop('disabled', true);
});
$("input[name*=horarioCierre]").on('keydown', function(){
  $('#horas24').val('0');
  $('#horas24').prop('disabled', true);
});

$('#horas24').on('click', function(){
  $("input[name*=horarioApertura]").prop('disabled', true);
  $("input[name*=horarioCierre]").prop('disabled', true);
});
