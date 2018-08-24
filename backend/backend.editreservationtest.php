<?php
if (isset($_POST['rezervo'])) {
// lidhja me db
include_once '../db/dbconnect.php';
//bejme vlerëdhenien
	$mberritja = $_POST["mberritja"];
	$largimi = $_POST["largimi"];
	$tipiIdhomes = $_POST["tipiIdhomes"];
	$persona=$_POST["persona"];
	$dhomeid= $_POST["dhomeid"];
	$RezervimId=$_POST["RezervimId"];
	$rezervimi=$_POST["rezervimi"];
  $data =  date('Y-m-d');
	 $sql1 = "SELECT TipiDhomesId FROM tipidhomes WHERE Cmimi = '".$tipiIdhomes."'";
      $rs1=mysqli_query($con, $sql1);
      while($row1=mysqli_fetch_array($rs1,MYSQLI_BOTH))
      {
         $tipi = $row1['TipiDhomesId'];

         // Gjejm nje dhome te lire

         $sql2 = "SELECT
         DhomaId
         FROM dhoma
         WHERE Gjendje = 1
         AND TipiDhomesId = '.$tipi.' LIMIT 1";

         $rs2=mysqli_query($con, $sql2);
         while($row2=mysqli_fetch_array($rs2,MYSQLI_BOTH))
         {
            $dhomaid = $row2['DhomaId'];

            //Vendosim  Rezervimin ne DB
            $sql="UPDATE rezervimi
			SET DateRezervimi='".$rezervimi."',
			DateFillimi='".$mberritja."',
			DateMbarimi='".$largimi."',
			NrPersonave='".$persona."',
			DhomaId='".$dhomaid."'
			WHERE RezervimId=".$RezervimId;

        $result=mysqli_query($con, $sql);

        if ($result) {
					$query="UPDATE dhoma
					SET Gjendje = 0
					WHERE Gjendje = 1
					AND DhomaId in ( SELECT DhomaId FROM rezervimi WHERE '".$data."' BETWEEN '".$mberritja."'  AND '".$largimi."'  )
					AND DhomaId=".$dhomaid;
			$result1=mysqli_query($con, $query);
			if ($result1){
				$query1="UPDATE dhoma
			SET Gjendje=1
			WHERE DhomaId=".$dhomeid;
			$result2=mysqli_query($con, $query1);


			if ($result2){



            echo"Reservim me Sukses";
            header("location:../listreservation.php?reservation=suksesem");
            exit();
         }else {
            echo"Ndodhi një gabim gjatë registrimit! Ju lutem provoni përsëri!";
            header("location:../listreservation.php?reservation=error");
            exit();
         }

      }
    }
	  }
		}
	
}


?>
