<?php
  // Start session
   session_start();
   $_SESSION["loggedIn"] = true;

   // Check if user is logged in.
   if(!isset($_SESSION['currentUser'])){
     	$_SESSION['loggedIn'] = false;
   }
?>
