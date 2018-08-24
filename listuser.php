<?php include  'includes/header.php';
 include 'includes/adminnav.php';

if ($_SESSION['RoletId'] != 2 ) {
  header('Location: index.php');
  exit;
} ?>

<html>
<head>
<script>

function showHint(str) {

		if (str.length != 0){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tekst").innerHTML = this.responseText;
				        document.getElementById("fshiTabele").innerHTML = "";

            }
        }
        xmlhttp.open("POST", "searchUser.php?username="+str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body id="listBody" onload="showHint(this.value)">
</br></br></br></br></br></br></br></br>
<h1 align="center">  Lista e Përdoruesve  </h1>
</br></br>


 
<form class="form-inline">
  <a href="adduser.php" class="btn btn-outline-primary" style="margin-left:10px" >Shto User</a>
  <a href="listuserinaktiv.php" class="btn btn-outline-primary "  style="margin-left:10px">Userat Inaktiv</a>
<input type="submit" class="btn btn-primary btn-md" name="clear" onload="fshiTabele" value="Pastro Fushë"style="margin-left:10px"/>
<div class="modal-body">
 <input  type="text"  size="30"   name="username"
 onkeyup="showHint(this.value)"
 placeholder="Kerko perdorues me username " action="searchUser.php" method="POST" />
</div>
</form>


</br></br>

<?php
 include('db/dbconnect.php');
 ?>
 <p><span id="tekst"></span></p>
 <?php errorDisplay()?>
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
   AND Inaktiv=1";
$result=mysqli_query($con ,$sqlcomand);
$c=0;
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
	echo'<tr><td>'.++$c .'</td><td>'.$row['Username'].'</td><td>'.$row['Emer'].
	'</td><td>'.$row['Mbiemer'].'</td><td>'.$row['Mosha'].'</td><td>'.$row['NrTel'].'</td><td>'.$row['Email'].'</td>
	<td>'.$row['Shteti'].'</td><td>'.$row['Qyteti'].'</td><td>'.$row['Adresa'].'</td>
	<td><a  href="edituser.php?id='.$row[0].'"> <b>Modifiko</b> </a> <a href="deleteuser.php?id='.$row[0].'"> <b>Fshi</b></a></td></tr>';

}
?>
</table>
<?php
mysqli_close($con);
?>


</body>
</html>
