<?php 
include 'includes/header.php' ;
include('includes/adminnav.php');
 include('db/dbconnect.php');
 if ($_SESSION['RoletId'] != 2 ) {
   header('Location: index.php');
   exit;
 }
?>
<html>
 <head>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ&callback=hotel"></script>
    <script>


function initialize() {
 
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

  var marker = new google.maps.Marker({
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
 


function shtoMarker(lat,lng,emri,mbiemer ){
  var markeruser= new google.maps.Marker({
    position:  new google.maps.LatLng(lat , lng),
    title: ""+emri+ " "+mbiemer ,
    map: map
  }); 
    var permbajtja= "Vendodhja e klientit : " +emri +" "+ mbiemer ;
  
  	var infowindow= new google.maps.InfoWindow({
   
    content:permbajtja
    
  });
  google.maps.event.addListener(markeruser, 'click', function() {
    if(!markeruser.open){
        infowindow.open(map,markeruser);
        markeruser.open = true;
    }
    else{
        infowindow.close();
        markeruser.open = false;
    }
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        markeruser.open = false;
    });
});
  
}

<?php 

   $sql=mysqli_query($con, "SELECT  DISTINCT
PerdoruesId,Username,Emer, Mbiemer,lat,lng
   From perdorues where RoletId=1
   AND Inaktiv=1");
	while($row=mysqli_fetch_array($sql,MYSQLI_BOTH)){

	
	
					$name=$row['Emer'];
					$lat=$row['lat'];
					$lng=$row['lng'];
					$lastname=$row['Mbiemer'];
					
					echo ("shtoMarker($lat , $lng ,'$name','$lastname');\n");
					}
					
				
?>



}
google.maps.event.addDomListener(window, 'load', initialize);


    </script>
  </head>
<body>
 

<div id="map" style="left:15%;width:55%;height:450px;position:relative;float:left;top:100px;"></div>


</body>
</html>
