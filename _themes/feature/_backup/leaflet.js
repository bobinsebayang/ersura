var mymap = L.map('mapid').setView([-1.378631, 103.478159], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1
}).addTo(mymap);

// L.marker([-2.225860, 120.614644]).addTo(mymap)
//   .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

// L.circle([-2.225860, 120.614644], 500, {
//   color: 'red',
//   fillColor: '#f03',
//   fillOpacity: 0.5
// }).addTo(mymap).bindPopup("I am a circle.");

L.polygon([
  [-1.359840, 103.464477],
  [-1.375002, 103.495591],
  [-1.408811, 103.462861]
]).addTo(mymap).bindPopup("I am a polygon.");


// var popup = L.popup();

// function onMapClick(e) {
//   popup
//     .setLatLng(e.latlng)
//     .setContent("You clicked the map at " + e.latlng.toString())
//     .openOn(mymap);
// }

// mymap.on('click', onMapClick);