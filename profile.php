<?php include 'includes/header.php' ?>
 <?php include 'includes/usernavigation.php' ?>
<?php


// lidhja me db
	include 'db/dbconnect.php';

if (isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
$query="SELECT  PerdoruesId,Username,Emer, Mbiemer,Mosha,NrTel,Email,Shteti,Qyteti,Adresa
	FROM perdorues where Username='".$username."'";
	$result=mysqli_query($con,$query);

	if(mysqli_num_rows($result)==1)
	{
		$row= mysqli_fetch_array($result,MYSQLI_NUM);
?>
<html>
<head><link rel="stylesheet" type="text/css" href="css.css"></head>
    <body>

		<!-- shtova kodin deri ne fund te body -->
		<form action="editprofile.php " method="POST"><div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="text-center">Profili i Përdoruesit</h1>
        </div>
         <div class="modal-body">

             <div class="form-group">
				<label class="cols-sm-2 control-label">Informacion Personal</label>
			<!-- ID UNIKE -->
      <?php errorDisplay(); ?>
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
			<!-- Username -->
                 <input type="text" class="form-control input-lg"  name="username"  value="<?php echo $username; ?>"
				 placeholder="Username" disabled />

             </div>
            <!-- Emer -->
			 <div class="form-group">
                 <input type="text" class="form-control input-lg"  name="emri" value="<?php echo $row[2]; ?>"
				 placeholder="Emer" disabled />
             </div>
		 <!-- Mbiemer -->
    <div class="form-group">
                 <input type="text" class="form-control input-lg"  name="mbiemer" value="<?php echo $row[3]; ?>"
				 placeholder="Mbiemer" disabled />
             </div>
    	 <!-- Mosha -->
    <div class="form-group">
                 <input type="number" class="form-control input-lg"  name="mosha" value="<?php echo $row[4]; ?>"
				 placeholder="Mosha" disabled />
             </div>
     <!-- Telefon -->
			 <div class="form-group">
                 <input type="phone" class="form-control input-lg"   name="telefon" value="<?php echo $row[5]; ?>"
				 placeholder="Telefon" disabled />
             </div>
       <!-- Email -->
			 <div class="form-group">
			<input type="text" class="form-control"  name="email" value="<?php echo $row[6]; ?>"
				placeholder="Vendos Emailin"disabled />
								</div>
              <!-- Adresa -->
          			 <div class="form-group">
                   	<label class="cols-sm-2 control-label">Vendodhje</label>
                           <input type="text" class="form-control input-lg" placeholder="Adresa" value="<?php echo $row[9]; ?>"
          				 name ="adresa" disabled />
                       </div>
                       <!--Qyteti -->
                      <div class="form-group">
                                   <input type="text" class="form-control input-lg" placeholder="Qyteti"  value="<?php echo $row[8]; ?>"
                  				 name="qyteti" disabled />
                           </div>
    <!--Shteti -->
    <div class="form-group">

                 <input type="text" class="form-control input-lg" placeholder="Shteti" value="<?php echo $row[7]; ?>"
				 name="shteti" disabled />
             </div>


		<!-- Butoni -->
             <div class="form-group">
                 <input type="submit" class="btn btn-block btn-lg btn-primary" name="modifikoprofil" value="Modifiko të dhënat" />
             </div>

		    </div>
         </div>
    </div>
 </div>

</form>
    </body>
</html>
<?php
	}
}mysqli_close($con);
?>
