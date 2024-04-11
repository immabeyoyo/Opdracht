<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>
<body>
  U bent nu ingelogd.
  <br>
  Log hier uit:
  <form action="Logout.php" method="post">
    <button type="submit">Logout</button>
</body>
</html>


<?php
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $database = "opdracht";
  
  // $table = "users";
  
  // $conn = new mysqli($servername, $username, $password, $database);
  //   if($conn->connect_error) {
  //     die("Kan geen verbinding maken met de database. " .$conn->connect_error);
  //   };
  

  // include("Inloggen.php");
  session_start();

  $email = $_SESSION['email'];
  if (!isset($_SESSION['email'])) {
    header("Location:Inloggen.php");
    exit;
  }

  echo("Uw email adres: $email");
?>