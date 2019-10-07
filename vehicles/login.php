<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = ""; 
    $conn = mysqli_connect("localhost", "TITLE", "TITLE", "TITLE");
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    if(empty($username) or empty($password)) {
        $errors = "Anna käyttäjänimi ja salasana!";
    } else {
        $sql = "SELECT username, password FROM register WHERE username = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           $errors = "Error!";
        } else {
           mysqli_stmt_bind_param($stmt, "s", $username);
           mysqli_stmt_execute($stmt);
           $result = mysqli_stmt_get_result($stmt);
           $data = mysqli_fetch_assoc($result);
           if(is_null($data["username"])) {
           $errors = "Käyttäjää ei löydy!";   
           } else {
             if(password_verify($password, $data["password"])) {
               session_start();
               $_SESSION["username"] = $username;
               header("Location: auto.php");
        } else {
          $errors = "Väärä salasana!";
        }
    }
  }
}
}
?>

<!DOCTYPE html>
<html lang="fi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css"> 
        <title>Kirjaudu sisään</title>
    </head>
    <body>
        <center>
            <br>
            <a href="https://vadelmapilvi.com" class="button">Pääsivulle</a>
        </center>
        <br>
        <h1 style="text-align: center">Kirjaudu sisään</h1>
        <center>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="text" name="username" placeholder="Käyttäjänimi">
                <input type="password" name="password" placeholder="Salasana"><br>
                <button type="submit" class="button">Kirjaudu</button><br>
            </form>
            <br>
        </center>
       <p style="color: red; text-align: center;"><?php echo $errors ?></p> 
    </body>
</html>
