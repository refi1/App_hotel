<?php
include 'includes/header.php';
include 'includes/adminnav.php';
if ($_SESSION['RoletId'] == 2 ) {
  header('Location: listuser.php');
  exit;
}
else{
  header('Location: index.php');
  exit;
}
?>
