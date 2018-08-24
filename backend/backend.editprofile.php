
<?php
session_start();
if(!isset($_SESSION['RoletId'])){
  header("Location:index.php");
   exit();
}
// lidhja me db
$con=mysqli_connect("localhost","root","","hotelii") or die("Lidhja me databazën dështoi");
		//bejme vlerëdhenien
	$username=$_SESSION['username'];
	$emri = $_POST["emri"];
	$mbiemer = $_POST["mbiemer"];
	$telefon = $_POST["telefon"];
	$fjalëkalimaktual=$_POST["fjalëkalimaktual"];
	$fjalëkalim1 = $_POST["fjalëkalim1"];
	$fjalëkalim2 = $_POST["fjalëkalim2"];
	$shteti = $_POST["shteti"];
	$qyteti = $_POST["qyteti"];
	$email = $_POST["email"];
	$adresa = $_POST["adresa"];
	$mosha = $_POST["mosha"];
    $lat = $_POST["latitude"];
    $lng = $_POST["longitude"];
	//kontrollojmë fushat
	if(empty($emri) || empty($mbiemer) || empty($telefon) || empty($fjalëkalimaktual)||empty($fjalëkalim1)|| empty($fjalëkalim2) || empty($shteti) || empty($qyteti) || empty($email)  || empty($adresa) || empty($mosha))
	{ $_SESSION['error'] = 'Ju lutem plotësoni të gjitha hapësirat!';
		header('Location: ../editprofile.php?username="'.$username.'"editprofile=bosh');
		exit();
	}
	else
	{
		if( !preg_match("/^[a-zA-Z]*$/",$emri) || !preg_match("/^[a-zA-Z]*$/",$mbiemer)){
      $_SESSION['error'] = 'Ju lutem jepni një emër dhe mbiemër!';
			header('Location: ../editprofile.php?username="'.$username.'"editprofile=InvalidNameOrSurname');
			exit();
		}
		else
		{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
      $_SESSION['error'] = 'Ju lutem jepni një email të saktë!';
			header('Location: ../editprofile.php?username="'.$username.'"editprofile=InvalidEmail');

			exit();
			}
			else {
			$sqluser = "SELECT * FROM perdorues WHERE Username='".$username."'";
			$result = mysqli_query($con, $sqluser);
			$row= mysqli_fetch_array($result,MYSQLI_BOTH);

		
			$pass=password_verify($fjalëkalimaktual,$row['Password']);

			if (!$pass){
        $_SESSION['error'] = 'Fjalëkalimi i vjetër nuk është i saktë.Ju lutem provoni përsëri!';
			header('Location: ../editprofile.php?username="'.$username.'"editprofile=InvaliOldPassword');
				exit();
			}

			else

			{ if($fjalëkalim1!=$fjalëkalim2 || strlen($fjalëkalim1) < 6) {
        $_SESSION['error'] = 'Fjalëkalimet janë të ndryshme.Ju lutem provoni përsëri!';
				header('Location: ../editprofile.php?username="'.$username.'"editprofile=InvalidPassword');
				exit();
				} else
				{

				$fjalëkalim = password_hash($fjalëkalim1, PASSWORD_DEFAULT);

				// Vendosim te dhenat ne database

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
							Where Username='".$username."'";


				 $result=mysqli_query($con,$sqluser);

				 if ($result==1) {
				// echo"Modifikmi u krye me sukses";
        $_SESSION['success'] = 'Modifikmi u krye me sukses!';
				 header('location: ../profile.php?edituser=suksesem');
				 exit();
				 }
				else {
          $_SESSION['error'] = 'Gabim gjatë modifikimit.Ju lutem provoni përsëri!';
					header('Location: ../editprofile.php?username="'.$username.'"');
				exit();
				}

				}
			}
		}
	} }



	?>
