 <?php

 function getTitle()
 {
/// Dynamic Page Title
 $title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
 // If index replace with home
 if (strtolower($title) == 'index') {
 $title = 'Home';
 }
 if (strtolower($title) == 'admin-profile') {
 $title = 'Admin Profile';
 }
 if (strtolower($title) == 'listuserinaktiv') {
 $title = 'List User Inaktiv';
 }
 if (strtolower($title) == 'listuser') {
 $title = 'List Users';
 }
 // capitalize first word
 $title = ucwords($title);
 return $title;
 }

 function errorDisplay() {

    if (isset($_SESSION['error'])) {
       echo '<div style="color:red;text-align:center;font-weight: bold;">'; echo $_SESSION["error"]; echo'</div>';
       unset($_SESSION['error']);
     } elseif (isset($_SESSION['success'])) { echo '<div style="color:green;text-align:center;font-weight: bold;">'; echo $_SESSION["success"]; echo'</div>';
     unset($_SESSION['success']);}

   }


 ?>
