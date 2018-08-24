<?php session_start();
$con=mysqli_connect("localhost", "root", "", "hotelii") or die("Lidhja me databazën dështoi");


    $emri = $_POST["emri"];
    $mbiemer = $_POST["mbiemer"];
    //$gjinia = $_POST["gender"];
    $telefon = $_POST["telefon"];
    $fjalëkalim1 = $_POST["fjalëkalim1"];
    $fjalëkalim2 = $_POST["fjalëkalim2"];
    $shteti = $_POST["shteti"];
    $qyteti = $_POST["qyteti"];
    $email = $_POST["email"];
    $adresa = $_POST["adresa"];
    $mosha = $_POST["mosha"];
    $id=$_POST["id"];
	$lat = $_POST["latitude"];
    $lng = $_POST["longitude"];
    //Errors

    if (empty($emri) || empty($mbiemer) || empty($telefon) || empty($fjalëkalim1)|| empty($fjalëkalim2) || empty($shteti) || empty($qyteti) || empty($email)  || empty($adresa) || empty($mosha)) {
        $_SESSION['error'] = 'Ju lutem plotësoni të gjitha hapësirat!';
        header("Location: ../edituser.php?id=".$id);
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $emri) || !preg_match("/^[a-zA-Z]*$/", $mbiemer)) {
          $_SESSION['error'] = 'Ju lutem jepni një emër dhe mbiemër!';
            header("Location: ../edituser.php?id=".$id);
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $_SESSION['error'] = 'Ju lutem jepni një email të saktë!!';
                header("Location: ../edituser.php?id=".$id);

                exit();
            } else {
                if ($fjalëkalim1!=$fjalëkalim2 || strlen($fjalëkalim1) < 6) {
                  $_SESSION['error'] = 'Fjalëkalimet janë të ndryshme.Ju lutem provoni përsëri!';
                    header("Location: ../edituser.php?id=".$id);
                    exit();
                } else {
                    $fjalëkalim = password_hash($fjalëkalim1, PASSWORD_DEFAULT);

                  
                    $sqluser="UPDATE perdorues
						 SET
								Emer='".$emri."',
								Mbiemer='".$mbiemer."',

								NrTel='".$telefon."',
								Email='".$email."',
								Password='".$fjalëkalim."',
								ResetPassword='".$fjalëkalim1."',
								Shteti='".$shteti."',
								Qyteti='".$qyteti."',
								Adresa='".$adresa."',
								Mosha='".$mosha."',
							    lat='".$lat."',
								lng='".$lng."'
							Where PerdoruesId=".$id;
                    var_dump($sqluser);

                    $result=mysqli_query($con, $sqluser);

                    if ($result==1) {
                        // echo"Modifikmi u krye me sukses";
                        $_SESSION['success'] = 'Modifikmi u krye me sukses!';
                        header("location: ../listuser.php?listuser=editsuccess");
                        exit();
                    } else {
                      $_SESSION['error'] = 'Gabim gjatë modifikimit.Ju lutem provoni përsëri!';
                        header("Location: ../edituser.php?id=".$id);
                        exit();
                    }
                }
            }
        }
    }
