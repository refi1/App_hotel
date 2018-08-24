<?php
include 'db/dbconnect.php';
include 'includes/header.php';
include 'includes/usernavigation.php';
include 'includes/footer.php';
if (!isset($_SESSION['RoletId'])) {
    header("Location:index.php");
    exit();
}
if (isset($_SESSION['userid'])){
  $userID = $_SESSION['userid'];
  $query="SELECT  Emer, Mbiemer,NrTel,Email,Shteti,Qyteti,Adresa
FROM perdorues where PerdoruesId=".$userID;
  $result=mysqli_query($con, $query);
  if (mysqli_num_rows($result)==1) {
      $row= mysqli_fetch_array($result, MYSQLI_NUM);
    }

  }
     ?>

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
      <h1 class="text-center">Mirëseerdhët! <?php echo $row[0]; ?> <?php echo $row[1]; ?> </h1>
      <hr>
      <form action="backend/backend.reservation.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="text-center">Rezervime</h1>
          </div>
          <div class="modal-body">
            <!-- Arrival/Departure -->
            <div class="form-group">
            <?php   errorDisplay() ?>
              <label class="cols-sm-2 control-label">Mbërritja</label>
              <input type="date" id="mberritja" class="form-control input-lg" name="mberritja" onchange="kostoPerfundimtare()" value="<?php echo date('Y-m-d'); ?>">
              <i class="fa fa-calendar"></i>
              <div class="form-group">
                <br>
                <label class="cols-sm-2 control-label">Largimi</label>
                <input type="date" id="largimi" class="form-control input-lg" name="largimi" onchange="kostoPerfundimtare()" value="<?php echo date('Y-m-d'); ?>">
                <i class="fa fa-calendar"></i>
              </div>
            </div><label class="cols-sm-2 control-label">Informacion mbi Dhomën</label>
            <div class="form-row">

              <div class="col-6">
                <select class="form-control input-lg" id="tipi_dhomes" name="tipiIdhomes" onchange="kostoPerfundimtare()">
                    <option value="" disabled selected style="display: none;">Tipi i dhomës</option>
                  <?php
                  $sql = "SELECT Lloji,Cmimi
                  FROM tipidhomes";
                  $rs=mysqli_query($con, $sql);
                  while($row1=mysqli_fetch_array($rs,MYSQLI_BOTH))
                  {
                    echo "<option value=\"".$row1['Cmimi']."\">".$row1['Lloji']."</option>\n  "; }
                    ?>
                  </select>

              </div>
              <div class="col-6">
                <div class="form-group">
                  <input type="number" id="numri_personave" class="form-control input-lg" name="persona" placeholder="Persona" min="1" max="6" onchange="kostoPerfundimtare()" required/>
                </div>
              </div>


                <textarea class="form-control" id="" name="sherbime" rows="3" placeholder="Shërbime"></textarea>


            </div>

            <br>
            <!-- Emer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="emri" value="<?php echo $row[0]; ?>" placeholder="Emer" required disabled/>
            </div>

            <!-- Mbiemer -->
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="mbiemer" value="<?php echo $row[1]; ?>" placeholder="Mbiemer" required disabled/>
            </div>

            <!-- Telefon -->
            <div class="form-group">
              <label class="cols-sm-2 control-label">Informacion Kontakti</label>
              <input type="phone" class="form-control input-lg" name="telefon" placeholder="Telefon" value="<?php echo $row[2]; ?>" required disabled/>
            </div>
            <!-- Email -->
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $row[3]; ?>" required disabled/>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="qendrimi" value="" id="qendrimih"  hidden/>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="userID" value="<?php echo $userID; ?>"  hidden/>
            </div>
            <div class="col">
              <input type="text" class="form-control" name="cmimi" value="" id="resulth"  hidden/>
            </div>

            <!--Vendodhje -->
            <label class="cols-sm-2 control-label">Vendodhje</label>
            <div class="form-row">

              <div class="col-7">

                <input type="text" class="form-control input-lg" placeholder="Adresa" name="adresa" value="<?php echo $row[6]; ?>" required disabled/>
              </div>
              <div class="col">
                <input type="text" class="form-control input-lg" placeholder="Qyteti" name="qyteti" value="<?php echo $row[5]; ?>" required disabled/>
              </div>
              <div class="col">
                <input type="text" class="form-control input-lg" placeholder="Shteti" name="shteti" value="<?php echo $row[4]; ?>" required disabled/>
              </div>

            </div>
            <br>

            <div class="form-group">
              <label>Kosto Totale (€) per </label>
              <span id="qendrimi" class="">0</span>


              <label>Ditë qëndrimi </label>
              <span id="result" class="btn btn-success">0</span>
            </div>

            <!-- Butoni -->
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-lg btn-primary" name="rezervo" value="Shto Rezervim" />
            </div>


          </div>
        </div>
      </div>


    </form>
    <?php


  mysqli_close($con);
  ?>
  </body>

  </html>
