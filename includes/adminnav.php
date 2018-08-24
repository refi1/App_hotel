
<html>
<nav class="navbar navbar-expand-lg nav-fixed-top navbar-dark bg-dark ">
     <div class="container">
       <a class="navbar-brand" href="#home">Admin Panel
       </a>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a class="nav-link" href="index.php" id="navA">Kryefaqe</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="listuser.php" id="navA">Listo Userat</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="listreservation.php" id="navA">Listo Rezervime</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="listuserinaktiv.php" id="navA">Userat Inaktiv</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="alluserlocation.php" id="navA">Vendodhja e Userave</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="chart.php" id="navA">Chart</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="admin-profile.php" id="navA">Profili Im</a>
           </li>

           <?php
           if(isset($_SESSION['username'])) {
           echo '
           <li class="nav-item">
             <a class="nav-link" id="navA" href="backend/backend.logout.php">Dil</a>
             </li>';
           } else {
             header("Location:index.php?login=sjeni-loguar");
             exit();
           }
           ?>
         </ul>
     </div>
   </nav>

</html>
