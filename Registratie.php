<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registratie opdradcht 3</title>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Email: <input type="email" name="email"><br><br>
    Wachtwoord: <input type="password" name="password"><br><br>
    <input type="submit" name="submit" value="Registreren">
  </form>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "opdracht";

$table = "users";

$conn = new mysqli($servername, $username, $password, $database);
  if($conn->connect_error) {
    die("Kan geen verbinding maken met de database. " .$conn->connect_error);
  };


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Wachtwoord hashen
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepared statement voor de registratie

    $stmt = $conn->prepare("INSERT INTO users (email, wachtwoord) VALUES(?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);

    // Voer de query uit
    if ($stmt->execute()) {
      echo "<p>Registratie succesvol!</p>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn_error;
        }
      } else {
        echo "<p>Vul een naam en wachtwoord in</p>";
    }
}


?>
</body>
</html>