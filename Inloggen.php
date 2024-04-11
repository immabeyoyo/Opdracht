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
    <input type="submit" name="submit" value="Inloggen">
  </form>
<?php
session_start();

// Controleer of de gebruiker al is ingelogd, zo ja, stuur deze dan door naar de welkomstpagina
if (isset($_SESSION['email'])) {
  header("Location:Welcome.php");
  exit;
}

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

    // Prepared statement voor inloggen.
    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows == 1) {
      $stmt->bind_result($db_email, $db_password);
      $stmt->fetch();

      // Controleer of het ingevoerde wachtwoord overeenkomt met het gehaste wachtwoord.
      if (password_verify($password, $db_password)) {
        // Inloggen succesvol, start sessie en sla gebruikersgegevens op in $_SESSION.
        $_SESSION['email'] = $email;
        // Stuur door naar de welkomstpagina
        header("Location: Welcome.php");
        exit;
      } else {
        echo ("<p>Ongeldig email of wachtwoord. Probeer het opnieuw</p>");
      }
    }
  } else {
    echo ("<p>Vul naam en wachtwoord in.</p>");
  }
}

//     $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
//     $result = $conn->query($sql);

//     if ($result->num_rows == 1) {
//       // Inloggen succesvol, sla gebruikersgegevens op in $_SESSION en stuur door naar Welcome.php
//       $_SESSION['email']=$email;
//       header("Location:Welcome.php");
//       exit;
//     } else { 
//       echo "<p>Ongeldig email of wachtwoord</p>";
//     }
//   } else {
//     echo "<p>Vul naam en wachtwoord in</p>";
//   }
// }

?>
</body>
</html>