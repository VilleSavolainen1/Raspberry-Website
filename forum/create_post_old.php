<?php
    session_start();
    
    if(is_null($_SESSION["username"])) {
     header("Location: login.php");
    }
    if($_SERVER["REQUEST_METHOD"] = "POST") {
      $poster = $_SESSION["username"];
      $conn = mysqli_connect("localhost", "foorumi", "krevifoorumi", "forum");
      $errors = "";
      $title = htmlspecialchars($_POST["title"]);
      $post_desc =  htmlspecialchars($_POST["desc"]);

    if(empty($title) or empty($post_desc)) {
      $errors = "";
    } else {
       $query = mysqli_query($conn, "SELECT post_title FROM posting WHERE post_title='$title';");
       $data = mysqli_fetch_assoc($query);
       if(!is_null($data["post_title"])) {
        $errors = "Aihe on jo käytössä!";
       } else {
           $query = mysqli_query($conn, "INSERT INTO posting (poster, post_title, post_desc) VALUES ('$poster', '$title', '$post_desc');");
           if($query) {
            header("Location: forum.php");
         } else {
            echo "Jotain meni vikaan.";
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
<title>Kirjoita viesti</title>
</head>
<body>
<br>
<center>
<a href="forum.php" class="button">Takaisin</a>
</center>
<h1 style="text-align: center">Luo uusi viesti</h1>
<p style="color: red"><?php echo $errors; ?></p>
<center>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="text" name="title" placeholder="Aihe"><br>
    <textarea rows="15" cols="60" name="desc" placeholder="Viesti"></textarea><br><br>
    <button type="submit" class="button">Lähetä</button>
</form>
</center>
</body>
</html>
