
  	// var mymap = L.map('mapid').setView([51.505, -0.09], 13);

    var mymap = L.map('mapid').locate({ setView: true, maxZoom: 18 }); 

  	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  		maxZoom: 18,
  		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
  			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
  			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  		id: 'mapbox.streets'
  	}).addTo(mymap);

  	L.marker([51.5, -0.09]).addTo(mymap)
  		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

  	L.circle([51.508, -0.11], 500, {
  		color: 'red',
  		fillColor: '#f03',
  		fillOpacity: 0.5
  	}).addTo(mymap).bindPopup("I am a circle.");

  	L.polygon([
  		[51.509, -0.08],
  		[51.503, -0.06],
  		[51.51, -0.047]
  	]).addTo(mymap).bindPopup("I am a polygon.");


  	var popup = L.popup();





function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>SU navegador no soporta la geolocalización</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    output.innerHTML = '<p>La latitud es ' + latitude + '° <br>La longitud es ' + longitude + '°</p>';

    output.appendChild(img);
  }

  function error() {
    output.innerHTML = "Imposible conseguir la localización";
  }

  output.innerHTML = "<p>Consiguiendo lozalización…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}
