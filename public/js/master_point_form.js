$(document).ready(function(){
	initMap('master_point_map');
});

function initMap(element_id) {
	center_lat = -5.7999146;
	center_lng = -35.2922847;

	//verifica os valores nos campos de coordenadas, se não tiver, carrega defaults.
	if( $("#latitude").val() != '' ){
		center_lat = parseFloat($("#latitude").val());
		center_lng = parseFloat($("#longitude").val());
	}
	var center_coords = {lat: center_lat, lng: center_lng};

	var map = new google.maps.Map(document.getElementById(element_id), {
	  zoom: 9,
	  center: center_coords
	});

    var markers = [];
	var marker = new google.maps.Marker({
		position: center_coords,
		map: map
	});
	         
	var geocoder = new google.maps.Geocoder;

	map.addListener('click', function(e) {
		//Clear markers
		markers.forEach(function(marker) {
			marker.setMap(null);
		});
		//Set Marker
		marker.setPosition(e.latLng);
		var latitude = e.latLng.lat();
		var longitude = e.latLng.lng();

		//Fill textarea
		geocoder.geocode({
		  'latLng': e.latLng
		}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
		    if (results[0]) {
		        $('#input-address').val(results[0].formatted_address);
		        $('#latitude').val(latitude);
		        $('#longitude').val(longitude);
		        $('#'+element_id).click();
		    }
		  }
		});

	});

	// Create the search box and link it to the UI element.
    var input = document.getElementById('master_point_search');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
    	searchBox.setBounds(map.getBounds());
	});
    searchBox.addListener('places_changed', function() {

		var places = searchBox.getPlaces();

		if (places.length == 0) {
			return;
		}

		// For each place, get name and location.
		var bounds = new google.maps.LatLngBounds();
		places.forEach(function(place) {

			if (!place.geometry) {			  
			  return;
			}
			if (place.geometry.viewport) {
			  // Only geocodes have viewport.
			  bounds.union(place.geometry.viewport);
			} else {
			  bounds.extend(place.geometry.location);
			}

		});

		map.fitBounds(bounds);

    });
}

$('#transit_search').on('keydown', function(event){
	if(event.keyCode == 13) {
		event.preventDefault();
		return false;
	}	
});
