<?php include 'includes/header.php' ?>

<!-- Registration Form -->
<html>

<head>
<script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ'></script>
  <link rel="stylesheet" type="text/css" href="css/lr.css" />
</head>

<body>
  
  <div class="bodyRes">
  <div class="modal-dialog">
    <form action="backend/backend.register.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="text-center">Regjistim</h1>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="cols-sm-2 control-label">Informacion Personal</label>
              <?php errorDisplay() ?>
            <!-- Username -->
            <input type="text" class="form-control input-lg" name="username" placeholder="Username" required/>
          </div>
          <!-- Emer -->
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="emri" placeholder="Emër" required/>
          </div>
          <!-- Mbiemer -->
          <div class="form-group">
            <input type="text" class="form-control input-lg" name="mbiemer" placeholder="Mbiemër" required/>
          </div>
          <!-- Mosha -->
          <div class="form-group">
            <input type="number" class="form-control input-lg" name="mosha" placeholder="Mosha" min="18" max="99" required/>
          </div>
          <!-- Gjinia 0 MASHKULL DHE 1 Femer-->
          <div class="form-group">
            <input type="radio" name="gender" value="0" checked> Mashkull
            <input type="radio" name="gender" value="1"> Femër<br></div>
          <!-- Telefon -->
          <div class="form-group">

            <input type="phone" class="form-control input-lg" name="telefon" placeholder="Telefon"  maxlength="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>
          </div>
          <!-- Email -->
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Vendos Emailin" required/>
          </div>
          <!-- Fjalëkalimi -->
          <div class="form-group">
            <input type="password" class="form-control input-lg" placeholder="Fjalëkalimi" name="fjalëkalim1" required/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control input-lg" placeholder="Konfirmo Fjalëkalimin" name="fjalëkalim2" required/>
          </div>
          
          <!--Shteti -->
          
          <div class="form-group">
            <label class="cols-sm-2 control-label">Vendodhje</label>
               <!-- Adresa -->
          <div class="form-group">
          <input type="text" placeholder="Adresa" class="form-control input-lg" name="adresa" onFocus="initializeAutocomplete()" id="locality" required/>
          </div>
          <!--Qyteti -->
          <div class="form-group">
            <input type="text" id="city" class="form-control input-lg" placeholder="Qyteti" name="qyteti" required/>
          </div>
            <input type="text" id="country" class="form-control input-lg" placeholder="Shteti" name="shteti" required/>
          </div>
          
          
       
          


<input type="text" name="latitude" id="latitude" placeholder="Latitude" value="" hidden><br>
<input type="text" name="longitude" id="longitude" placeholder="Longitude" value="" hidden><br>


          

          <!-- Butoni -->
          <div class="form-group">
            <input type="submit" class="btn btn-block btn-lg btn-primary" name="shto" value="Regjistohu" />
          </div>


        </div>
      </div>
  </div>
  </div>
  </form>
</div>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top smooth-scroll">
    <div class="container">
      <a class="navbar-brand" href="#home"><img src="images/logo.png" width="100" height="100" alt="Hotel DELUXE Tirana" >
        </a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php" id="navA">Kryefaqe</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
</body>
<script type="text/javascript">
  function initializeAutocomplete(){
    var input = document.getElementById('locality');
    
    var options = {}

    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
		
      };
	   var testim = {
       
		country: 'long_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
         // document.getElementById("country").value = val;
		  document.getElementById("city").value = val;
         
        }
      }
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (testim[addressType]) {
          var val = place.address_components[i][testim[addressType]];
          document.getElementById("country").value = val;
		  
         
        }
      }
      
      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;
     
    });
  }
</script>

</html>
  <?php include 'includes/footer.php' ?>
