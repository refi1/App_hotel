<?php include 'includes/header.php';
include 'includes/adminnav.php';
     // lidhja me db
  include 'db/dbconnect.php';
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query="SELECT  PerdoruesId,Username,Emer, Mbiemer,Mosha,NrTel,Email,Shteti,Qyteti,Adresa
	FROM perdorues where PerdoruesId=".$id;
    $result=mysqli_query($con, $query);
    if (mysqli_num_rows($result)==1) {
        $row= mysqli_fetch_array($result, MYSQLI_NUM); ?>
  <!-- Registration Form -->
  <html>

  <head>
<script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ'></script>
    <link rel="stylesheet" type="text/css" href="css/lr.css" />
  </head>

  <body>
    <div class="modal-dialog">
      <form action="backend/backend.edit.php " method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="text-center">Modifikim Perdoruesi</h1>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="cols-sm-2 control-label">Informacion Personal</label>
              <!-- ID UNIKE -->
              <input type="hidden" name="id" value="<?php echo $id; ?>" />
              <!-- Username -->
              <?php errorDisplay() ?>
              <input type="text" class="form-control input-lg" name="username" value="<?php echo $row[1]; ?>" placeholder="Username" required disabled/>

            </div>
            <!-- Emer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="emri" value="<?php echo $row[2]; ?>" placeholder="Emer" required/>
            </div>
            <!-- Mbiemer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="mbiemer" value="<?php echo $row[3]; ?>" placeholder="Mbiemer" required/>
            </div>
            <!-- Mosha -->
            <div class="form-group">
              <input type="number" class="form-control input-lg" name="mosha" value="<?php echo $row[4]; ?>" placeholder="Mosha" required/>
            </div>


            <!-- Telefon -->
            <div class="form-group">
              <input type="phone" class="form-control input-lg" name="telefon" value="<?php echo $row[5]; ?>" placeholder="Telefon"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>
            </div>
            <!-- Email -->
            <div class="form-group">
              <input type="text" class="form-control" name="email" value="<?php echo $row[6]; ?>" placeholder="Vendos Emailin" required/>
            </div>
            <!-- Fjalëkalimi -->

            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Fjalëkalimi" name="fjalëkalim1" required/>
            </div>

            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Konfirmo Fjalëkalimin " name="fjalëkalim2" required/>
            </div>
            <!--Shteti -->
            <div class="form-group">
              <label class="cols-sm-2 control-label">Vendodhje</label>

                <input type="text" class="form-control input-lg" placeholder="Adresa" value="<?php echo $row[9]; ?>" name="adresa" onFocus="initializeAutocomplete()" id="adresa" required/>
              </div>
            <!--Qyteti -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Qyteti" value="<?php echo $row[8]; ?>" name="qyteti" id="qyteti" required/>
            </div>
            <div class="form-group">
            <input type="text" class="form-control input-lg" placeholder="Shteti" value="<?php echo $row[7]; ?>" name="shteti" id="shteti"required/>
          </div>
            <!-- Adresa -->

			<input type="text" name="latitude" id="latitude" placeholder="Latitude" value="" hidden><br>
			<input type="text" name="longitude" id="longitude" placeholder="Longitude" value="" hidden><br>
            <!-- Butoni -->
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-lg btn-primary" name="modifiko" value="Ruaj të dhënat" />
            </div>


          </div>
        </div>
    </div>
    </div>

    </form>
    <?php
    }
    //else
    //	header('location:listuser.php');
}
//else
    //header('location:listuser.php');
mysqli_close($con);
?>

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
