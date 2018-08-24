<?php
session_start();


include '../db/dbconnect.php';

if (isset($_POST['hyr'])) {
    $username = $_POST['username'];
    $fjalëkalim=$_POST['fjalëkalim'];
    $adminID=2;
    $userID=1;

    //Errors

    if (empty($username) || empty($fjalëkalim)) {
       $_SESSION['error'] = 'Ju lutem plotësoni të gjitha hapësirat!';
        header("Location: ../login.php?login=bosh");
        exit();
    } else {
        $sql ="SELECT * FROM perdorues WHERE
		Inaktiv=1
		AND Username='".$username."'";
			// po kur useri eshte inaktiv
        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
           $_SESSION['error'] = 'Username nuk ekziston!';
            header("Location: ../login.php?login=username-nuk-ekziston");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                $hashfjalëkalim = password_verify($fjalëkalim, $row['Password']);
                if ($hashfjalëkalim == false) {
                   $_SESSION['error'] = 'Fjalëkalim i gabuar!';
                    header("Location: ../login.php?login=fjalekalim-i-gabuar");
                    exit();
                } else if ($hashfjalëkalim == true) {
                    $_SESSION["username"]=$row['Username'];
                    $_SESSION["userid"]=$row['PerdoruesId'];
                    $_SESSION['RoletId']=$row['RoletId'];// shtova ketu
                    $count=mysqli_num_rows($result);
                    if ($count==1) {
                        /*
                         else if ($row['RoletId']==$userID)
                         {
                           $_SESSION['RoletId']=$row["$userID"];
                          header ("Location: ../profile.php ");
                           exit();
                         }*/
                        if ($_SESSION['RoletId']==$adminID) {
                           $_SESSION['success'] = 'Hyrja u krye me sukses!';
                            header("Location: ../admin-home.php");
                            exit();
                        }
                        if ($_SESSION['RoletId']==$adminID or $_SESSION['RoletId']==$userID) {
                            header("Location: ../profile.php");
                            exit();
                        }
                        if ($_SESSION['RoletId']==$adminID) {
                            header("Location: ../admin-home.php");
                            exit();
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=ErrorNoAccess");
    exit();
           }
?>
