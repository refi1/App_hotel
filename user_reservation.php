<?php
include 'includes/header.php';
include 'includes/usernavigation.php';
include 'includes/footer.php';
include('db/dbconnect.php');
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

<html>
<body>
</br></br></br></br>
<h1 style="text-align:center;"> Lista e Rezervimeve </h1>

</br></br>
<?php  errorDisplay(); ?>
<table class="table table-hover">
<tr>
<td><b>Numër</b></td><td><b>Dhoma</b></td><td><b>Tipi i Dhomës</b></td><td><b>Nr.Personave</b></td>
<td><b>Data e Rezervimit</b></td><td><b>Data e Fillimit</b></td><td><b>Data e Mbarimit</b></td><td><b>Shërbime</b></td><td><b>Cmimi</b></td>
<td><b>Veprime</b> <br>
</tr>

<?php

  $sqlcomand="SELECT  DISTINCT
p.PerdoruesId,p.Username,p.Emer,p.Mbiemer, r.RezervimId,r.DateFillimi,r.DateMbarimi,r.DateRezervimi,
r.SasiaPagesaTotale,r.Sherbime,r.NrPersonave,dh.NrDhomes,dh.DhomaId,dh.Notes,t.Lloji
FROM rezervimi r
JOIN perdorues p ON r.PerdoruesId=p.PerdoruesId
  JOIN  dhoma  dh ON r.DhomaId = dh.DhomaId
  JOIN  tipidhomes t ON t.TipiDhomesId=dh.TipiDhomesId
  WHERE r.AnulloRezervim=1
  And p.PerdoruesId='".$userID."'
";

$result=mysqli_query($con,$sqlcomand);

$c=0;
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	echo'<tr><td>'.++$c .'</td><td>'.$row['Notes'].'</td><td>'.$row['Lloji'].'</td><td>'.$row['NrPersonave'].'</td><td>'.$row['DateRezervimi'].'</td><td>'.$row['DateFillimi'].'</td>
	<td>'.$row['DateMbarimi'].'</td><td>'.$row['Sherbime'].'</td><td>'.$row['SasiaPagesaTotale'].'</td>
	<td><a  href="usereditreservation.php?RezervimId='.$row['RezervimId'].'"> <b>Modifiko</b> </a> <a href="userdeletereservation.php?RezervimId='.$row['RezervimId'].'"> <b>Fshi</b></a></td></tr>';

}
?>
</table>
<?php
mysqli_close($con);
?>


</body>
</html>
