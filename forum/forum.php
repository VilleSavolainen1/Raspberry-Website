<?php 
    session_start();

    if(is_null($_SESSION["username"])) {
      header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Foorumi</title>
</head>
<body style="background-color: #819FF7; color: #FFF;">
  <div class="link" style="text-align: center;"><br>
  <a href="https://vadelmapilvi.com" class="button">Pääsivulle</a>
  <a href="create_post.php" class="button">Luo uusi viesti</a>
  <a href="logout.php" class="button">Kirjaudu ulos</a><br><br><hr size="1" style="border-color: #A9BCF5"><br>
  </div>
  <div class="content">
  <?php
    $conn = mysqli_connect("localhost", "foorumi", "krevifoorumi", "forum");
    $query = mysqli_query($conn, "SELECT post_title, poster, post_desc FROM posting;");
    while($data = mysqli_fetch_assoc($query)){
     echo "<h3><b>#".$data["poster"].": </b></h3>-".$data["post_title"]."<br>";
     echo $data["post_desc"]."<br><br>";
    }
  ?>
  </div>
</body>
</html>
