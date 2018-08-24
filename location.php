<?php include 'includes/header.php';
include 'includes/usernavigation.php';
?>
<html>
 <head>
    <title>Travel modes</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ&callback=hotel"></script>
    <script>

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var origjina;
var destinacion = new google.maps.LatLng( 41.3168, 19.8233);
 var marker;
function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
   var mapposition = {lat: 41.3275, lng: 19.8187};
    var markerposition = {lat: 41.3168, lng: 19.8233};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: mapposition
  });

  var permbajtja = '<h6>Hotel Deluxe</h6>' +'<hr>' + '<p>Hotel Deluxe është një standard i lartë i cilësisë.<br>'+
  ' Mikpritja dhe shërbimi, komoditeti dhe siguria bëjnë që hoteli të jetë <br> vend takimi për elitën ekonomike, diplomatike dhe kulturore të Shqipërisë.</p>';
	
	var photo ='<p><img src="images/1.jpg" width="150" height="100" alt="Hotel DELUXE Tirana" > <img src="images/3.jpg" width="150" height="100" alt="Hotel DELUXE Tirana" ></p>';
	var adresa='<p><b> Adresa </b><br> Sheshi Italia <br> Tiranë <br>Albania</p>';
  var infowindow = new google.maps.InfoWindow({
    content: permbajtja + photo + adresa
  });

  marker = new google.maps.Marker({
    position: markerposition,
    map: map,
    title: 'Hotel Deluxe'
  }); 

marker.setAnimation(google.maps.Animation.BOUNCE);

  google.maps.event.addListener(marker, 'click', function() {
    if(!marker.open){
        infowindow.open(map,marker);
        marker.open = true;
    }
    else{
        infowindow.close();
        marker.open = false;
    }
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        marker.open = false;
    });
});
 
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directionsPanel'));
var markeruser;
function shtoMarker(lat,lng,emri ){
   markeruser= new google.maps.Marker({
    position:  new google.maps.LatLng(lat , lng),
    title: ""+emri,
    map: map
  }); 
origjina=new google.maps.LatLng(lat , lng);

  }

<?php 
if (isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
$query="SELECT  *
	FROM perdorues where Username='".$username."'";
	$result=mysqli_query($con,$query);

	if(mysqli_num_rows($result)==1)
	{  $row= mysqli_fetch_array($result,MYSQLI_BOTH);
	
					$name=$row['Emer'];
					$lat=$row['lat'];
					$lng=$row['lng'];
					
					
					echo ("shtoMarker($lat , $lng ,'$name');\n");
					}
					
	}			
?>

}//mbyll funksionin

function calcRoute() {
  
  var selectedMode = document.getElementById('mode').value;
  var request = {
      origin: origjina,
      destination: destinacion,
      travelMode: google.maps.TravelMode[selectedMode]
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
else {
        window.alert('Directions request error për shkak të  ' + status);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);



    </script>
  </head>
<body>
 
<div id="panel" style="position:relative;left:15%;top:100px;">
    <b>Travel Mode: </b>
    <select id="mode" onchange="calcRoute();">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
	
    </div>

<div id="map" style="left:15%;width:55%;height:450px;position:relative;float:left;top:100px;"></div>
<div id="directionsPanel" style="right:2.5%;position:relative;float:right;top:100px;width:25%;height 100%"></div>

</body>
</html>
