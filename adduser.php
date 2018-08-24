<?php
include 'includes/header.php' ;
include 'includes/adminnav.php'; ?>
  <!-- Registration Form -->
  <html>

  <head>
  <script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ'></script>
    <link rel="stylesheet" type="text/css" href="css/lr.css" />
  </head>

  <body>
    <div class="modal-dialog">
      <form action="backend/backend.adduser.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="text-center">Shtim Perdoruesi</h1>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="cols-sm-2 control-label">Informacion Personal</label>
              <!-- Username -->
              <?php errorDisplay() ?>
              <input type="text" class="form-control input-lg" name="username" placeholder="Username" required/>
            </div>
            <!-- Emer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="emri" placeholder="Emer" required/>
            </div>
            <!-- Mbiemer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="mbiemer" placeholder="Mbiemer" required/>
            </div>
            <!-- Mosha -->
            <div class="form-group">
              <input type="number" class="form-control input-lg" name="mosha" placeholder="Mosha" required/>
            </div>
            <!-- Gjinia 0 MASHKULL DHE 1 Femer-->
            <div class="form-group">
              <input type="radio" name="gender" value="0" checked> Mashkull
              <input type="radio" name="gender" value="1"> Femër<br></div>
            <!-- Telefon -->
            <div class="form-group">
              <input type="phone" class="form-control input-lg" name="telefon" placeholder="Telefon" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="13" required/>
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
			<!-- Adresa -->
            <div class="form-group">
			<label class="cols-sm-2 control-label">Vendodhje</label>
              <input type="text" class="form-control input-lg" placeholder="Adresa" name="adresa" onFocus="initializeAutocomplete()" id="adresa"required/>
            </div>
			 <!--Qyteti -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Qyteti" name="qyteti" id="qyteti"required/>
            </div>
            <!--Shteti -->
            <div class="form-group">
              
              <input type="text" class="form-control input-lg" placeholder="Shteti" name="shteti"  id="shteti" required/>
            </div>
           <input type="text" name="latitude" id="latitude" placeholder="Latitude" value="" hidden><br>
			<input type="text" name="longitude" id="longitude" placeholder="Longitude" value="" hidden><br>
            
            <!-- Butoni -->
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-lg btn-primary" name="shto" value="Shto Përdores" />
            </div>


          </div>
        </div>
    </div>
    </div>
    </form>
  

  </body>
<!-- shtova ketu -->
<script type="text/javascript">
  function initializeAutocomplete(){
    var input = document.getElementById('adresa');

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

		  document.getElementById("qyteti").value = val;

        }
      }
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (testim[addressType]) {
          var val = place.address_components[i][testim[addressType]];
          document.getElementById("shteti").value = val;


        }
      }

      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;

    });
  }
</script>
  </html>
