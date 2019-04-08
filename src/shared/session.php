<?php
  // Session:
  // http://www.formget.com/login-form-in-php/
  //
  session_name('mofr1108');
  session_start();
  // Establishing Connection with Server by passing server_name, user_id and password as a parameter
  include ( "../dbconfig.inc.php");
  $connection = @new mysqli($dbhost , $dbuser, $dbpassword , $dbname);

  if ($connection->connect_error) {
    die("Fatal user error: " . $connection->connect_error);
  }
  $connection->set_charset("utf8");
  // Storing Session
  $user_check=$_SESSION['epost'];
  // SQL Query To Fetch Complete Information Of User
  $sql = "SELECT epost from Person where epost='$user_check'";

  $resultat = $connection->query($sql);

  $epostDb = "";
  while ($rad = $resultat->fetch_assoc()) {
    $epostDb = $rad[epost];
  }

  if ($_SESSION['loggedin'] && $epostDb != "") {

  } else {
    header('Location: ../login/login.php');
    die('Vennligst logg inn for å se denne siden.');
  }
?>
