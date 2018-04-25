<?php
   session_start();

   if(session_destroy()) {
    $_SESSION['loggedIn'] = false;
	  $_SESSION['currentUser']= "";
	  header("Location: ../index.php");
   }
?>
