<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "foorumi", "krevifoorumi", "forum");
    $errors = "";
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if(empty($username) or empty($email) or empty($password) or filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors = "Täytä kaikki kentät!";
    } else {
       $query = mysqli_query($conn, "SELECT username FROM register WHERE username='$username';");
       $query1 = mysqli_query($conn, "SELECT email FROM register WHERE email='$email';");
       $data = mysqli_fetch_assoc($query);
       $data1 = mysqli_fetch_assoc($query1);
       if(!is_null($data["username"])) {
         $errors ="Username exists!";
       } elseif (!is_null($data1["email"])) {
          $errors = "E-mail already exists!";
       } else {
           $password = password_hash($password, PASSWORD_DEFAULT);
           $query = mysqli_query($conn, "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password');");

          if($query) {
           echo "Käyttäjä luotu!";
          } else {
           echo "Error!";
          }
       }
     }
   }
?>

<!DOCTYPE html>

<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Luo tunnus</title>
  </head>
  <body>
    <br>
    <center>
    <a href="https://vadelmapilvi.com" class="button">Pääsivulle</a>
    <a href="login.php" class="button">Kirjaudu sisään</a>
    </center><br>
    <h1 style="text-align: center">Luo tunnus</h1>
    <div class="form">
    <center>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
     <input type="text" name="username" placeholder="Käyttäjänimi">
     <input type="text" name="email" placeholder="E-mail">
     <input type="password" name="password" placeholder="Salasana">
     <br>
     <button type="submit" class="button">Luo tunnus</button>
     <br><br>
     <p style="color: red"><?php echo $errors; ?></p>
     </div>
     <br>
     <br>
     <center>
    </form>
    </center>
    <br>
  </body>
</html>

