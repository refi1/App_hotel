<?php
session_start();
if (isset($_POST['rezervo'])) {

    include_once '../db/dbconnect.php';

    $userID = $_POST["userID"];
    $mberritja = $_POST["mberritja"];
    $largimi = $_POST["largimi"];
    $qendrimi = $_POST["qendrimi"];
    $cmimi = $_POST["cmimi"];
    $tipiIdhomes= $_POST["tipiIdhomes"];
    $persona= $_POST["persona"];
    $sherbime= $_POST["sherbime"];
    $data =  date('Y-m-d');




    //Errors
    if (empty($mberritja) || empty($largimi) || empty($tipiIdhomes) || empty($persona)) {
       $_SESSION['error'] = 'Ju lutem plotësoni të gjitha hapësirat!';
        header("Location: ../reservation.php?reservation=bosh");
        exit();
    } else {
      if(empty($qendrimi) || $persona <= 0 || $cmimi <=0) {
         $_SESSION['error'] = 'Ju lutem jepni data dhe numrin e personave saktë!';
        header("Location: ../reservation.php?reservation=problem-cmime-qedrim");
        exit();
      }

      else {




      // Gjejm IDn e tipit te dhomes

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
            $sql="INSERT INTO rezervimi (PerdoruesId,DhomaId,DateRezervimi,DateFillimi,DateMbarimi,SasiaPagesaTotale,Sherbime,NrPersonave)
        VALUES ('".$userID."', '".$dhomaid."','".$data."','".$mberritja."', '".$largimi."', '".$cmimi."', '".$sherbime."', '".$persona."')";

        $result=mysqli_query($con, $sql);

        $query="UPDATE dhoma
        SET Gjendje = 0
        WHERE Gjendje = 1
        AND DhomaId in ( SELECT DhomaId FROM rezervimi WHERE '".$data."' BETWEEN '".$mberritja."'  AND '".$largimi."'  )
        AND DhomaId=".$dhomaid;
        $result1=mysqli_query($con, $query);




        if ($result1) {
           $_SESSION['success'] = 'Rezervimi u krye me sukses!';

            header("location:../reservation.php?reservation=suksesem");
            exit();
           }else {
              $_SESSION['error'] = 'Ndodhi një gabim gjatë rezervimit.Ju lutem provoni përsëri!';
           
            header("location:../reservation.php?reservation=error");
            exit();
         }
       }

      }
    }
  }
}


?>
