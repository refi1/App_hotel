<?php
session_start();
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
	$cmimi=$_POST["cmimi"];
	$qendrimi=$_POST['qendrimi'];
	$data =  date('Y-m-d');

	    //Errors
	    if (empty($mberritja) || empty($largimi) || empty($tipiIdhomes) || empty($persona)) {
	        $_SESSION['error'] = 'Ju lutem plotësoni të gjitha hapësirat!';
					 header("Location: ../usereditreservation.php?RezervimId=".$RezervimId);
	        exit();
	    } else {
	      if(empty($qendrimi) || $persona <= 0 || $cmimi <=0) {
					$_SESSION['error'] = 'Ju lutem plotësoni datat dhe numrin e personave saktë!';
	        header("Location: ../usereditreservation.php?RezervimId=".$RezervimId);
	        exit();
	      }

	      else {




					$sql1 = "SELECT TipiDhomesId FROM tipidhomes WHERE Cmimi = '".$tipiIdhomes."'";
					$rs1=mysqli_query($con, $sql1);
					while($row1=mysqli_fetch_array($rs1,MYSQLI_BOTH))
					{
         $tipi = $row1['TipiDhomesId'];

         // Gjejm nje dhome tlire

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
			SET DateRezervimi='".$data."',
			DateFillimi='".$mberritja."',
			DateMbarimi='".$largimi."',
			NrPersonave='".$persona."',
			SasiaPagesaTotale='".$cmimi."',
			DhomaId='".$dhomaid."'
			WHERE RezervimId=".$RezervimId;

        $result=mysqli_query($con, $sql);

        if ($result) {
			$query="UPDATE dhoma
			SET Gjendje=0
			WHERE DhomaId=".$dhomaid;
			$result1=mysqli_query($con, $query);
			if ($result1){
				$query1="UPDATE dhoma
			SET Gjendje=1
			WHERE DhomaId=".$dhomeid;
			$result2=mysqli_query($con, $query1);
			if ($result2){
              $_SESSION['success'] = 'Rezervimi u modifikua me sukses!';
            header("location:../user_reservation.php?reservation=suksesem");
            exit();
        } }else {
          $_SESSION['error'] = 'Ndodhi një gabim gjatë modifikimit të rezervimit.Provoni përsëri!';
            header("location:../user_reservation.php?reservation=error");
            exit();
         }
			 }
		 }
	 }
 }
}
}





?>
