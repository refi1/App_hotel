<?php include 'includes/header.php';
include 'includes/usernavigation.php';
include 'db/dbconnect.php';
?>

<html>
  <head>
    <title>Draggable direction</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ&callback=hotel"></script> 
    <script>

var rendererOptions = {
  draggable: true
};
var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
var directionsService = new google.maps.DirectionsService();
var map;

var albania = new google.maps.LatLng(41.331650 , 19.8318);

function initialize() {

  var mapOptions = {
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: albania
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directionsPanel'));

  google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
    computeTotalDistance(directionsDisplay.directions);
  });

  calcRoute();
}

function calcRoute() {

  var request = {
    origin: 'Tirane',
    destination: 'Sarande',
    waypoints:[{location: 'Vlore'}, {location: 'Gjirokaster'}],
    travelMode: google.maps.DirectionsTravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

function computeTotalDistance(result) {
  var total = 0;
  var myroute = result.routes[0];
  for (var i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }
  total = total / 1000.
  document.getElementById('total').innerHTML = total + ' km';
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas" style="float:left;width:700px;height:500px;"></div>
    <div id="directionsPanel" style="float:right;width:30%;height 100%">
    <p>Distanca Totale: <span id="total"></span></p>
    </div>
  </body>
</html>
