$(document).ready(function(){    
    center_lat = -5.7999146;
    center_lng = -35.2922847;
    initMap('map_routes', center_lat, center_lng);
});
function initMap(element_id, center_lat, center_lng) {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById(element_id), {
    zoom: 7,
    center: {lat: center_lat, lng: center_lng}
  });
  directionsDisplay.setMap(map);

  if($("#input-masterpoint_origin_id").find(':selected').attr('address') && $("#input-masterpoint_destination_id").find(':selected').attr('address')){
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  }

  var onChangeHandler = function() {
    if($("#input-masterpoint_origin_id").find(':selected').attr('address') && $("#input-masterpoint_destination_id").find(':selected').attr('address')){
      calculateAndDisplayRoute(directionsService, directionsDisplay);
    }
  };
  document.getElementById('input-masterpoint_origin_id').addEventListener('change', onChangeHandler);
  document.getElementById('input-masterpoint_destination_id').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  directionsService.route({
    origin: $("#input-masterpoint_origin_id").find(':selected').attr('address'),
    destination: $("#input-masterpoint_destination_id").find(':selected').attr('address'),
    travelMode: 'DRIVING'
  }, function(response, status) {
    if (status === 'OK') {
      directionsDisplay.setDirections(response);
      split = response.routes[0].legs[0].distance.text.split(' ');        
      $('#input-distance').val(split[0]);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}