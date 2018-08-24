<html>

<body>
  <table class="table table-hover">
    <tr>
      <td><b>Numër</b></td>
      <td><b>Username</b></td>
      <td><b>Emër</b></td>
      <td><b>Mbiemër</b></td>
      <td><b>Mosha</b></td>
      <td><b>Telefon</b></td>
      <td><b>Email</b></td>
      <td><b>Shteti</b></td>
      <td><b>Qyteti</b></td>
      <td><b>Adresa</b></td>
      <td><b>Veprime</b> <br>
    </tr>
    <?php
include('db/dbconnect.php');
//KERKIMI I USER
$username=$_GET["username"];
$c=0;
$var="SELECT  DISTINCT
PerdoruesId, Username,Emer, Mbiemer,Gjinia,NrTel,Email,Shteti,Qyteti,Adresa,Mosha
   From perdorues where RoletId=1 AND Inaktiv=1
AND Username LIKE '%".$username."%'";


   $res=mysqli_query($con, $var);

while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
    echo'<tr><td>'.++$c .'</td><td>'.$row['Username'].'</td><td>'.$row['Emer'].
    '</td><td>'.$row['Mbiemer'].'</td><td>'.$row['Mosha'].'</td><td>'.$row['NrTel'].'</td><td>'.$row['Email'].'</td>
	<td>'.$row['Shteti'].'</td><td>'.$row['Qyteti'].'</td><td>'.$row['Adresa'].'</td>
	<td><a href="EditUser.php?id='.$row[0].'"> <b>Modifiko</b> </a> <a href="deleteuser.php?id='.$row[0].'"> <b>Fshi</b>
	</a></td></tr>';
}mysqli_close($con); 
?>
  </table>
</body>

</html>
