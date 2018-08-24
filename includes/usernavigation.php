<nav class="navbar navbar-expand-lg nav-fixed-top navbar-dark bg-dark ">
     <div class="container">
       <a class="navbar-brand" href="#home"><img src="images/logo.png" width="100" height="100" alt="Hotel DELUXE Tirana" >
       </a>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a class="nav-link" href="index.php" id="navA">Kryefaqe</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="profile.php" id="navA">Profili Im</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="reservation.php" id="navA">Rezervime</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="findroom.php" id="navA">Kerko dhoma</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="user_reservation.php" id="navA">Shiko Rezervime</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="location.php" id="navA">Location</a>
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
