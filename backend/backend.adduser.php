<?php
session_start();
if (isset($_POST['shto'])) {
    include_once '../db/dbconnect.php';

    $errors = array();

    $username = $_POST["username"];
    $emri = $_POST["emri"];
    $mbiemer = $_POST["mbiemer"];
    $gjinia = $_POST["gender"];
    $telefon = $_POST["telefon"];
    $fjalëkalim1 = $_POST["fjalëkalim1"];
    $fjalëkalim2 = $_POST["fjalëkalim2"];
    $shteti = $_POST["shteti"];
    $qyteti = $_POST["qyteti"];
    $email = $_POST["email"];
    $adresa = $_POST["adresa"];
    $mosha = $_POST["mosha"];
	$lat = $_POST["latitude"];
    $lng = $_POST["longitude"];

    //Errors

    if (empty($username) || empty($emri) || empty($mbiemer) || empty($telefon) || empty($fjalëkalim1) || empty($fjalëkalim2) || empty($shteti) || empty($qyteti) || empty($email)  || empty($adresa) || empty($mosha)) {
      $_SESSION['error'] = 'Ju lutem plotësoni të gjitha hapësirat!';
        header("Location: ../adduser.php?adduser=bosh");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $username) || !preg_match("/^[a-zA-Z]*$/", $emer) || !preg_match("/^[a-zA-Z]*$/", $mbiemer)) {
            $_SESSION['error'] = 'Ju lutem jepni një username/emër të saktë!';
            header("Location: ../adduser.php?adduser=invalid");
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $_SESSION['error'] = 'Ju lutem jepni nje email të saktë!';
                header("Location: ../adduser.php?adduser=emailinvalid");
                array_push($errors, "Email invalid");
                exit();
            } else {
                $sqluser = "SELECT * FROM perdorues WHERE Username='".$username."'";
                $result = mysqli_query($con, $sqluser);
                $resultUser = mysqli_num_rows($result);

                if ($resultUser > 0) {
                  $_SESSION['error'] = 'Username i dhënë ekziston!';
                    header("Location: ../adduser.php?adduser=usernameEkziston");
                    exit();
                } else {
                    if ($fjalëkalim1!=$fjalëkalim2 || strlen($fjalëkalim1) < 6) {
                      $_SESSION['error'] = 'Ju lutem jepni një password që përmban më tepër se 6 karakter!';
                        header("Location: ../adduser.php?adduser=InvalidPassword");
                        exit();
                    } else {
                        $fjalëkalim = password_hash($fjalëkalim1, PASSWORD_DEFAULT);

                        // Vendosim te dhenat ne database

                        $sql="INSERT INTO perdorues (Username,Emer, Mbiemer,Gjinia,NrTel,Email,Password,ResetPassword,Shteti,Qyteti,Adresa,Mosha,lat,lng)
				 VALUES ('".$username."', '".$emri."', '".$mbiemer."', '".$gjinia."', '".$telefon."', '".$email."', '"
                 .$fjalëkalim."', '".$fjalëkalim1."', '".$shteti."', '".$qyteti."', '".$adresa."', '".$mosha." ', '".$lat."', '".$lng."')";

                        $result=mysqli_query($con, $sql);
                        if ($result) {

                            $_SESSION['success'] = 'Shtimi u krye me sukses!';
                            header("location:../listuser.php?listuser=suksesem");
                            exit();
                        } else {
                          $_SESSION['error'] = 'Regjistrim Invalid';
                            header("location:../adduser.php");
                            exit();
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../adduser.php");
}
