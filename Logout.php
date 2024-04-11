<?php
session_start();

// Controleer of de gebruiker is ingelogd, zo ja, beëindig sessie.
if(isset($_SESSION['email'])) {
  // Sessie vernietigen
  session_destroy();

  // Stuur de gebruiker terug naar het inlogscherm.
  header("Location:Inloggen.php");
  exit;
} else {
  // Als de gebruiker niet is ingelogd, stuur deze dan naar het inlogscherm
  header("Location:Inloggen.php");
  exit;
}
?>