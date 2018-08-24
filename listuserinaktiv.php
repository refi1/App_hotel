
<?php
include 'includes/header.php' ;
include('includes/adminnav.php');
 include('db/dbconnect.php');
 if ($_SESSION['RoletId'] != 2 ) {
   header('Location: index.php');
   exit;
 }
 ?>
 <html>
<body></br></br></br></br></br></br>
<h1 align="center">  Lista e Përdoruesve Inaktiv </h1>
</br></br></br></br>

<table  id="fshiTabele" class="table table-hover">
<tr>
<td><b>Numër</b></td><td><b>Username</b></td><td><b>Emër</b></td><td><b>Mbiemër</b></td><td><b>Mosha</b></td>
<td><b>Telefon</b></td><td><b>Email</b></td><td><b>Shteti</b></td><td><b>Qyteti</b></td><td><b>Adresa</b></td>
<td><b>Veprime</b> <br>
</tr>

<?php
$sqlcomand="SELECT  DISTINCT
PerdoruesId,Username,Emer, Mbiemer,Gjinia,NrTel,Email,Shteti,Qyteti,Adresa,Mosha
   From perdorues where RoletId=1
   AND Inaktiv=0";
$result=mysqli_query($con ,$sqlcomand);
$c=0;
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	echo'<tr><td>'.++$c .'</td><td>'.$row['Username'].'</td><td>'.$row['Emer'].
	'</td><td>'.$row['Mbiemer'].'</td><td>'.$row['Mosha'].'</td><td>'.$row['NrTel'].'</td><td>'.$row['Email'].'</td>
	<td>'.$row['Shteti'].'</td><td>'.$row['Qyteti'].'</td><td>'.$row['Adresa'].'</td>
	<td> <a href="useraktiv.php?id='.$row[0].'"> <b>Aktiv</b></a></td></tr>';

}
?>
</table>
<?php
mysqli_close($con);
?>


</body>
</html>
