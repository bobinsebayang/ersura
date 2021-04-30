<script>
    // var mymap = L.map('mapid').setView([-1.378631, 103.478159], 13);

    // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    // maxZoom: 18,
    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    //     'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    // id: 'mapbox/streets-v11',
    // tileSize: 512,
    // zoomOffset: -1
    // }).addTo(mymap);

    // // L.marker([-2.225860, 120.614644]).addTo(mymap)
    // //   .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

    // // L.circle([-2.225860, 120.614644], 500, {
    // //   color: 'red',
    // //   fillColor: '#f03',
    // //   fillOpacity: 0.5
    // // }).addTo(mymap).bindPopup("I am a circle.");

    // L.polygon([
    // [-1.359840, 103.464477],
    // [-1.375002, 103.495591],
    // [-1.408811, 103.462861]
    // ]).addTo(mymap).bindPopup("I am a Polygon.");

    // var popup = L.popup();

    // function onMapClick(e) {
    //   popup
    //     .setLatLng(e.latlng)
    //     .setContent("You clicked the map at " + e.latlng.toString())
    //     .openOn(mymap);
    // }

    // mymap.on('click', onMapClick);

    // CHLOROPLETH

    // var map = L.map('map').setView([-2.40, 120.24], 4);

	var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});
    
    var map = L.map('map', {
		center: [-2.40, 120.24],
		zoom: 5,
		layers: [peta3]
	});

    var baseMaps = {
    "Standar": peta3,
    "Satelit": peta2,
    "Transportasi": peta1,
    "Mode Gelap": peta4
    };

    L.control.layers(baseMaps).addTo(map);
    
	// var geojson = L.geoJson(statesData).addTo(map);

    function getColor(d) {
    return d > 1000 ? '#800026' :
           d > 500  ? '#BD0026' :
           d > 200  ? '#E31A1C' :
           d > 100  ? '#FC4E2A' :
           d > 50   ? '#FD8D3C' :
           d > 20   ? '#FEB24C' :
           d > 10   ? '#FED976' :
                      '#FFEDA0';
    }

    // Fungsi untuk warna polygon berdasarkan warna "kode"
    
    function style(feature) {
    return {
        fillColor: getColor(feature.properties.kode),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7
    };
    }
    // Akhir Funct
    
    // Fungsi mouse-out
    function resetHighlight(e) {
        geojson.resetStyle(e.target);
    }

// Nambah geojson
    var geojson;

	function resetHighlight(e) {
		geojson.resetStyle(e.target);
		info.update();
	}

    // fitur untuk zoom ketika polygon dipilih
	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds());
	}

    // Now we’ll use the onEachFeature option to add the listeners on our state layers:
	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
	}

	geojson = L.geoJson(statesData, {
		style: style,
		onEachFeature: onEachFeature
	}).addTo(map);

	map.attributionControl.addAttribution('Map data &copy; <a href="http://ersura.gcom/">Bakosurtanal</a>');
// akhir Nambah Geojson

    // code for our control:
    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };

    // method that we will use to update the control based on feature properties passed
    info.update = function (props) {
        this._div.innerHTML = '<h4>Provinsi Indonesia</h4>' +  (props ?
            '<b>' + props.Propinsi + '</b><br />' + ' ID: ' + props.ID + '</b><br />' + ' Sumber Peta: ' + props.SUMBER
            : 'Arahkan kursor ke provinsi');
    };

    info.addTo(map);
    // end code for our control:

        //Fungsi highlight... We need to update the control when the user hovers over a state, so we’ll also modify our listeners as follows:
        function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',
			fillOpacity: 0
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

		info.update(layer.feature.properties);
	}
    // end update control


// L.geoJson(statesData, {style: style}).addTo(map);
</script>