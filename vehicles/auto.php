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
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <title>Huolto</title>
</head>
<body style="background-color: #819FF7; color: #FFF;">
<div class="link" style="text-align: center;"><br>
<a href="https://vadelmapilvi.com" class="button">Pääsivulle</a>
<a href="logout.php" class="button">Kirjaudu ulos</a><br><br>
</div>
<div class="wrapper">
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-12.col-sm-3 table-responsive">
     <div class="page-header clearfix">
      <h2 style="text-align: center;">Volvo V50</h2>
    <?php
        $conn = mysqli_connect("localhost", "foorumi", "krevifoorumi", "vehicles");
	$sql ="SELECT * FROM volvo";
                   if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr style='color: #3dee37'>";
                                        echo "<th>Öljy/km</th>";
                                        echo "<th>Jakoh./km</th>";
                                        echo "<th>Ilmans./km</th>";
                                        echo "<th>Jäähdytin./km</th>";
                                        echo "<th>Muokkaa</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style='color: #000'>";
                                        echo "<td>" . $row['oil'] . "</td>";
                                        echo "<td>" . $row['timing_belt'] . "</td>";
                                        echo "<td>" . $row['air_filter'] . "</td>";
                                        echo "<td>" . $row['cooling_oil'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='update.php' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Tietoja ei löytynyt.</em></p>";
                        }
                    } else{
                        echo "Virhe!" . mysqli_error($conn);
                    } 
                    // Close connection
                    mysqli_close($conn);
    ?>
</div>
</div>
</div>
</div>
</div>

<div class="wrapper">
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-12.col-sm-3 table-responsive">
     <div class="page-header clearfix">
      <h2 style="text-align: center;">Toyota Hiace</h2>
    <?php
        $conn = mysqli_connect("localhost", "foorumi", "krevifoorumi", "vehicles");
	$sql ="SELECT * FROM hiace";
                   if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr style='color: #3dee37'>";
                                        echo "<th>Öljy/km</th>";
                                        echo "<th>Jakoh./km</th>";
                                        echo "<th>Ilmans./km</th>";
                                        echo "<th>Jäähdytin./km</th>";
                                        echo "<th>Muokkaa</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style='color: #000'>";
                                        echo "<td>" . $row['oil'] . "</td>";
                                        echo "<td>" . $row['timing_belt'] . "</td>";
                                        echo "<td>" . $row['air_filter'] . "</td>";
                                        echo "<td>" . $row['cooling_oil'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='updateh.php' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Tietoja ei löytynyt.</em></p>";
                        }
                    } else{
                        echo "Virhe!" . mysqli_error($conn);
                    } 
                    // Close connection
                    mysqli_close($conn);
    ?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

