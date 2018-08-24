<?php include 'includes/header.php' ?>
<?php

if ($_SESSION['RoletId'] != 2) {
    include 'includes/usernavigation.php';
} elseif ($_SESSION['RoletId'] == 2) {
    include 'includes/adminnav.php';
}
if (!isset($_SESSION['RoletId'])) {
    header("Location:index.php");
    exit();
}
// lidhja me db
    include 'db/dbconnect.php';
if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $query="SELECT  PerdoruesId,Username,Emer, Mbiemer,Mosha,NrTel,Email,Shteti,Qyteti,Adresa
	FROM perdorues where Username='".$username."'";
    $result=mysqli_query($con, $query);

    if (mysqli_num_rows($result)==1) {
        $row= mysqli_fetch_array($result, MYSQLI_NUM); ?>
  <html>

  <head>

<script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBF9hbrblCD4EM0Yfkc57RAmu6AAvPSBSQ'></script>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>

  <body>

    <!-- shtova kodin deri ne fund te body -->
    <form action="backend/backend.editprofile.php" method="POST">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="text-center">Profili i Përdoruesit</h1>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label class="cols-sm-2 control-label">Informacion Personal</label>
              <!-- ID UNIKE -->
              <div style="color:red;text-align:center;font-weight: bold;">
                <?php    if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } ?>
              </div>
              <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
              <!-- Username -->
              <input type="text" class="form-control input-lg" name="username" value="<?php echo $username; ?>" placeholder="Username" disabled />

            </div>
            <!-- Emer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="emri" value="<?php echo $row[2]; ?>" placeholder="Emër" required/>
            </div>
            <!-- Mbiemer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="mbiemer" value="<?php echo $row[3]; ?>" placeholder="Mbiemër" required />
            </div>
            <!-- Mosha -->
            <div class="form-group">
              <input type="number" class="form-control input-lg" name="mosha" min="18" max="99" maxlength="2" value="<?php echo $row[4]; ?>" placeholder="Mosha" required />
            </div>
            <!-- Telefon -->
            <div class="form-group">
              <input type="phone" class="form-control input-lg" name="telefon" value="<?php echo $row[5]; ?>" placeholder="Telefon" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="13" required />
            </div>
            <!-- Email -->
            <div class="form-group">
              <input type="text" class="form-control" name="email" value="<?php echo $row[6]; ?>" placeholder="Vendos Emailin" required />
            </div>
            <!-- Fjalëkalimi -->
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Fjalëkalimi Aktual " name="fjalëkalimaktual" required />
            </div>

            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Fjalëkalimi i Ri" name="fjalëkalim1" required />
            </div>

            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Konfirmo Fjalëkalimin " name="fjalëkalim2" required />
            </div>
            <!-- Adresa -->
            <div class="form-group">
                <label class="cols-sm-2 control-label">Vendodhje</label>
              <input type="text" class="form-control input-lg" placeholder="Adresa" value="<?php echo $row[9]; ?>" name="adresa" onFocus="initializeAutocomplete()" id="adresa" required />
            </div>
            <!--Qyteti -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Qyteti" value="<?php echo $row[8]; ?>" name="qyteti" id="qyteti" required />
            </div>
            <!--Shteti -->
            <div class="form-group">

              <input type="text" class="form-control input-lg" placeholder="Shteti" value="<?php echo $row[7]; ?>" name="shteti" id="shteti"required />
            </div>



<input type="text" name="latitude" id="latitude" placeholder="Latitude" value="" hidden><br>
<input type="text" name="longitude" id="longitude" placeholder="Longitude" value="" hidden><br>
            <!-- Butoni -->
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-lg btn-primary" name="profil" value="Ruaj të dhënat" />
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
  <?php
    } else {
        header('location:profile.php');
    }
} else {
    header('location:profile.php');
}
mysqli_close($con);
?>
