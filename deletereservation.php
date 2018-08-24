<?php
session_start();
include '/includes/header.php';

include('db/dbconnect.php');
//$sql="Delete From rezervimi where RezervimId=".$_GET['RezervimId'];
// gjendje behet 1 ne menyre qe dhoma te jete e lire
//rezervimi behet 0 ne menyre qe te jete i fshire
        $sql="UPDATE rezervimi r
		JOIN  dhoma  dh ON r.DhomaId = dh.DhomaId
		SET r.AnulloRezervim=0,
		  dh.Gjendje=1
		where RezervimId=".$_GET['RezervimId'];

$result=mysqli_query($con, $sql);

if ($result==1) {
    $_SESSION['success'] = 'Rezervimi u anullua me sukses!';
    header('location:listreservation.php?rezervimi=deleted');
} else {
    echo"Fshirja nuk u realizua";
}
mysqli_close($con);
