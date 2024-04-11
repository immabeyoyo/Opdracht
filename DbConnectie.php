<?php

// Database verbinding
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Opdracht";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
  die("Kan geen verbinding maken met de database" . $conn->connect_error);
}
