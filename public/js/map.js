var mapa = L.map('mapid').setView([43.3073225, -1.9914354], 13);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mapa);

	$('#geolocate').on('click', function(){
  mapa.locate({setView: true, maxZoom: 15});
});

function onLocationFound(e) {
    var radius = e.accuracy / 3;
    L.marker(e.latlng).addTo(mapa)
        .on('click', function(){
          confirm("are you sure?");
        });
    L.circle(e.latlng, radius).addTo(mapa);
}

mapa.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}
mapa.on('locationerror', onLocationError);
