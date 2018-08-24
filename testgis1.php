<?php include 'includes/header.php';
include 'includes/usernavigation.php';
include 'db/dbconnect.php';
?>
<html>
  <head>
    <title>Waypoints ne directions</title>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ&callback=hotel"></script> 
    <script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var qender = new google.maps.LatLng(41.331650 , 19.8318);
  var mapOptions = {
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: qender
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
}

function calcRoute() {
  var start = document.getElementById('start').value;
  var end = document.getElementById('end').value;
  var waypts = [];
  var checkboxArray = document.getElementById('waypoints');
  for (var i = 0; i < checkboxArray.length; i++) {
    if (checkboxArray.options[i].selected == true) {
      waypts.push({
          location:checkboxArray[i].value,
          stopover:true});
    }
  }

  var request = {
      origin: start,
      destination: end,
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
      var summaryPanel = document.getElementById('directions_panel');
      summaryPanel.innerHTML = '';
      // Per cdo route, shfaq informacion permbledhes.
      for (var i = 0; i < route.legs.length; i++) {
        var routeSegment = i + 1;
        summaryPanel.innerHTML += '<b>Route(Segment): ' + routeSegment + '</b><br>';
        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
      }
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas" style="float:left;width:700px;height:500px;"></div>
    <div id="control_panel" style="float:right;width:30%;text-align:left;padding-top:20px">
    <div style="margin:20px;border-width:2px;">
    <b>Start:</b>
    <select id="start">
      <option>Lezhe</option>
      <option>Tirane</option>
      <option>Kruje</option>
      <option>Shkoder</option>
    </select>
    <br>
    <b>Waypoints:</b> <br>
    <i>(Ctrl-Click)</i> <br>
    <select multiple id="waypoints">
      <option>Durres</option>
      <option>Berat</option>
      <option>Tepelene</option>
      <option>Memaliaj</option>
      <option>Elbasan</option>
      <option>Korce</option>
      <option>Lushnje</option>
    </select>
    <br>
    <b>End:</b>
    <select id="end">
      <option>Sarande</option>
      <option>Gjirokaster</option>
      <option>Vlore</option>
      <option>Permet</option>
    </select>
    <br>
      <input type="submit" onclick="calcRoute();">
    </div>
    <div id="directions_panel" style="margin:20px;background-color:#FFEE77;"></div>
    </div>
  </body>
</html>

 <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ&callback=hotel"></script> -->