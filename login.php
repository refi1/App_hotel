<?php include 'includes/header.php' ?>
<?php if (isset($_SESSION['username']))
{
    header("Location: index.php");
    exit();
} ?>
<!-- Login Form -->
<html><head> <link rel="stylesheet" type="text/css" href="css/lr.css" /></head><body><div class="bodyRes"><div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="text-center">Hyrje</h1>
        </div>
      <?php errorDisplay() ?>
        <form action="backend/backend.login.php" method="POST">
         <div class="modal-body">
             <div class="form-group">
                 <input type="text" class="form-control input-lg" placeholder="Username" name="username"/>
             </div>

             <div class="form-group">
                 <input type="password" class="form-control input-lg" placeholder="Fjalëkalim" name="fjalëkalim"/>
             </div>

             <div class="form-group">
                 <input type="submit" class="btn btn-block btn-lg btn-primary" value="Kycu" name="hyr"/>
                 <span class="pull-right"><a href="register.php">Regjistohu </a></span>
             </div>
         </div>
       </form>
    </div>
 </div>
</div>

<!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top smooth-scroll">
      <div class="container">
        <a class="navbar-brand" href="#home"><img src="images/logo.png" width="100" height="100" alt="Hotel DELUXE Tirana" >
        </a>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php" id="navA">Kryefaqe</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</body>
</html>
  <?php include 'includes/footer.php' ?>
