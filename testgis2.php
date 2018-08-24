<?php include 'includes/header.php';
include 'includes/usernavigation.php';
include 'db/dbconnect.php';
?>

<html>
  <head>
    <title>Directions service (complex)</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ&callback=hotel"></script> 
    <script>
var map;
var directionsDisplay;
var directionsService;
var stepDisplay;
var markerArray = [];

function initialize() {
  // Inicializojme nje directions service.
  directionsService = new google.maps.DirectionsService();

  // Krijojme nje harte me qender ne Manhattan.
  var manhattan = new google.maps.LatLng(40.7711329, -73.9741874);
  var mapOptions = {
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: manhattan
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  // krijojme nje render per kete map.
  
  
  directionsDisplay = new google.maps.DirectionsRenderer();
  
directionsDisplay.setMap(map);
  // Inicializojme nje info window per textin e hapit.
  stepDisplay = new google.maps.InfoWindow();
}

function calcRoute() {

  // Fillimisht heqim cdo marker nga harta.
  for (var i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(null);
  }

  // fshijme array-in.
  markerArray = [];

  // Marrim start dhe end
  // inicializojme DirectionsRequest me WALKING TravelMode.
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var request = {
      origin: start,
      destination: end,
      travelMode: google.maps.TravelMode.WALKING
  };

  // bejme routimin e directions dhe ia kalojme pergjigjen nje
  // funksioni per te krijuar markera ne cdo hap.
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      var warnings = document.getElementById('warnings_panel');
      warnings.innerHTML = '<b>' + response.routes[0].warnings + '</b>';
      directionsDisplay.setDirections(response);
      showSteps(response);
    }
  });
}

function showSteps(directionResult) {
  // Per cdo hap, vendos nje marker, dhe shtojme tekstin ne
  // info window te markerit. Shtojme kete marker ne nje array qe te
  // kemi gjatesine e tij dhe ta heqim kur te kalkulojme
  // routes.
  var myRoute = directionResult.routes[0].legs[0];

  for (var i = 0; i < myRoute.steps.length; i++) {
    var marker = new google.maps.Marker({
      position: myRoute.steps[i].start_point,
      map: map
    });
    attachInstructionText(marker, myRoute.steps[i].instructions);
    markerArray[i] = marker;
  }
}

function attachInstructionText(marker, text) {
  google.maps.event.addListener(marker, 'click', function() {
    // Hap info window kur klikohet markeri me tekst hapin
    stepDisplay.setContent(text);
    stepDisplay.open(map, marker);
  });
}
google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="panel">
    <b>Start: </b>
    <select id="start">
      <option value="penn station, new york, ny">Penn Station</option>
      <option value="grand central station, new york, ny">Grand Central Station</option>
      <option value="625 8th Avenue, New York, NY, 10018">Port Authority Bus Terminal</option>
      <option value="staten island ferry terminal, new york, ny">Staten Island Ferry Terminal</option>
      <option value="101 E 125th Street, New York, NY">Harlem - 125th St Station</option>
    </select>
    <b>End: </b>
    <select id="end" onchange="calcRoute();">
      <option value="260 Broadway New York NY 10007">City Hall</option>
      <option value="W 49th St & 5th Ave, New York, NY 10020">Rockefeller Center</option>
      <option value="moma, New York, NY">MOMA</option>
      <option value="350 5th Ave, New York, NY, 10118">Empire State Building</option>
      <option value="253 West 125th Street, New York, NY">Apollo Theater</option>
      <option value="1 Wall St, New York, NY">Wall St</option>
    </select>
    </div>
    <div id="map-canvas" style="width:500px;height:400px;"></div>
    &nbsp;
    <div id="warnings_panel" style="width:100%;height:10%;text-align:center"></div>
  </body>
</html>