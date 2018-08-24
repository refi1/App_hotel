<?php include '/includes/header.php'?>
<?php
session_start();
include('db/dbconnect.php');
//$sql="Delete From perdorues where PerdoruesId=".$_GET['id'];
$sql="UPDATE perdorues
		SET Inaktiv=0
		where PerdoruesId=".$_GET['id'];

$result=mysqli_query($con, $sql);

if ($result==1) {
    $_SESSION['success'] = 'Fshirja u krye me sukses!';
    header('location:listuser.php?listuser=delete');
} else {
    echo"Fshirja nuk u realizua";
}
mysqli_close($con);
?>
