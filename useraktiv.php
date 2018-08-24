<?php include '/includes/header.php'?>
<?php
include('db/dbconnect.php');
$sql="UPDATE perdorues
		SET Inaktiv=1
		where PerdoruesId=".$_GET['id'];

$result=mysqli_query($con,$sql);

if($result==1){
	header('location:listuser.php');
}
else{
	echo"Modifikimi nuk u realizua";
}
mysqli_close($con);
?>
