<?php
include 'includes/header.php';
include 'includes/usernavigation.php';

 // lidhja me db
    include('db/dbconnect.php');
if (isset($_GET['RezervimId'])) {
    $RezervimId=$_GET['RezervimId'];
    $query="SELECT  DISTINCT
p.PerdoruesId,p.Username,p.Emer,p.Mbiemer, r.RezervimId,r.DateFillimi,r.DateMbarimi,r.DateRezervimi,
r.SasiaPagesaTotale,r.Sherbime,r.NrPersonave,dh.NrDhomes,dh.DhomaId,dh.Notes,t.Lloji
FROM rezervimi r
JOIN perdorues p ON r.PerdoruesId=p.PerdoruesId
  JOIN  dhoma  dh ON r.DhomaId = dh.DhomaId
  JOIN  tipidhomes t ON t.TipiDhomesId=dh.TipiDhomesId
  WHERE r.AnulloRezervim=1
And RezervimId=
".$RezervimId;
    $result=mysqli_query($con, $query);
    if (mysqli_num_rows($result)==1) {
        $row= mysqli_fetch_array($result, MYSQLI_BOTH);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/lr.css" />
	 <script>
    function kostoPerfundimtare() {
      var roomType = document.getElementById("tipi_dhomes").value;
      var personNum = document.getElementById("numri_personave").value;
      var arrival = document.getElementById("mberritja").value;
      var departure = document.getElementById("largimi").value;
      var date1 = new Date(arrival);
      var date2 = new Date(departure);
      var diff = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));
      if (diff < 0) {
        diff = 0;
      } else {
        diff++;


        var total = ((parseInt(roomType)) + ((personNum) * 10)) * diff
        document.getElementById("result").innerHTML = total;
        document.getElementById("qendrimi").innerHTML = diff;
        document.getElementById("qendrimih").value = diff;
        document.getElementById("resulth").value = total;


      }
    }
  </script>
  </head>
<body>
  <!-- Reservation Form -->
  <html>
  <script>
    function kostoPerfundimtare() {
      var roomType = document.getElementById("tipi_dhomes").value;
      var personNum = document.getElementById("numri_personave").value;
      var arrival = document.getElementById("mberritja").value;
      var departure = document.getElementById("largimi").value;
      var date1 = new Date(arrival);
      var date2 = new Date(departure);
      var diff = parseInt((date2 - date1) / (1000 * 60 * 60 * 24));
      if (diff < 0) {
        diff = 0;
      } else {
        diff++;


        var total = ((parseInt(roomType)) + ((personNum) * 10)) * diff
        document.getElementById("result").innerHTML = total;
        document.getElementById("qendrimi").innerHTML = diff;
        document.getElementById("qendrimih").value = diff;
        document.getElementById("resulth").value = total;


      }
    }
  </script>

  <head>
    <link rel="stylesheet" type="text/css" href="css/lr.css" />
  </head>

  <body>
    <div class="modal-dialog">
      <form action="backend/backend.usereditreservation.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="text-center">Modifiko Rezervimin</h1>
          </div>
          <div class="modal-body">
            <!-- Arrival/Departure -->
            <div class="form-group">
        <?php errorDisplay()?><br>
              <label class="cols-sm-2 control-label">Mbërritja</label>
              <input type="date" id="mberritja" class="form-control input-lg" name="mberritja" onchange="kostoPerfundimtare()" value="<?php echo $row['DateFillimi']; ?>">
              <i class="fa fa-calendar"></i>
              <div class="form-group">
                <br>
                <label class="cols-sm-2 control-label">Largimi</label>
                <input type="date" id="largimi" class="form-control input-lg" name="largimi" onchange="kostoPerfundimtare()" value="<?php echo $row['DateMbarimi']; ?>">
                <i class="fa fa-calendar"></i>
              </div>
            </div><label class="cols-sm-2 control-label">Informacion mbi Dhomën</label>
            <div class="form-row">

              <div class="col-6">
                <select class="form-control input-lg" id="tipi_dhomes" name="tipiIdhomes"  onchange="kostoPerfundimtare()" >
                  <?php
                  $lloj=$row['Lloji'];
                  echo $tipi .="<option selected hidden>".$lloj. "</option>";
                  $sqlcomand="SELECT  DISTINCT
                  TipiDhomesId,Pershkrimi,Lloji,Cmimi,Kati
                  FROM tipidhomes";
                  // shiko query
                  $result1=mysqli_query($con,$sqlcomand);
                  $menu=" ";
                  // Add options to the drop down
                  while($row1=mysqli_fetch_array($result1,MYSQLI_BOTH))
                  {
                    echo "<option value=\"".$row1['Cmimi']."\">".$row1['Lloji']."</option>\n";
                  }
                  ?>
                </select>

              </div>
              <div class="col-6">
                <div class="form-group">
                  <input type="number" id="numri_personave" class="form-control input-lg" name="persona" placeholder="Persona" min="1" max="6" onchange="kostoPerfundimtare()" required/>
                </div>
              </div>

            </div>
            <br>
            <div class="col">
              <input type="hidden" name="RezervimId"value="<?php echo $row['RezervimId']; ?>">
			  <input type="number" name="dhomeid" value="<?php echo $row['DhomaId']; ?>"hidden/>
              <input type="text" class="form-control" name="qendrimi" value="" id="qendrimih"  hidden/>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="cmimi" value="" id="resulth"  hidden/>
            </div>

            <!--Vendodhje -->

            <br>

            <div class="form-group">
              <label>Kosto e Re (€) per </label>
              <span id="result" class="btn btn-success">0</span>



              <label>Ditë qëndrimi </label>
                <span id="qendrimi" class="">0</span>
            </div>

            <!-- Butoni -->
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-lg btn-primary" name="rezervo" value="Modifiko Rezervimin" />
            </div>


          </div>
        </div>
      </div>


    </form>
    <?php
  }
}

  mysqli_close($con);
  ?>
  </body>

  </html>
