<?php
  session_name('mofr1108');
  session_start();
  if(session_destroy()) // Destroying All Sessions
  {
    header("Location: ../index.php"); // Redirecting To Home Page
  }
?>
