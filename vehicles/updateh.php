<?php

$conn = mysqli_connect("localhost", "TITLE", "TITLE", "TITLE");
$hiace = mysqli_query($conn, "SELECT * FROM hiace;");
$info = mysqli_fetch_array($hiace);


if($_SERVER["REQUEST_METHOD"] = "POST") {

      $errors = "";
      $oil = htmlspecialchars($_POST["oil"]);
      $timing_belt = htmlspecialchars($_POST["timing_belt"]);
      $air_filter = htmlspecialchars($_POST["air_filter"]);
      $cooling_oil = htmlspecialchars($_POST["cooling_oil"]);

    if(empty($oil) or empty($timing_belt) or empty($air_filter) or empty($cooling_oil)) {
      $errors = "";
    } else {
      $sql = mysqli_query($conn, "SELECT * FROM hiace;");
      $data = mysqli_fetch_array($sql);

      $otac = mysqli_query($conn, "UPDATE hiace SET oil='$oil', timing_belt='$timing_belt', air_filter='$air_filter', cooling_oil='$cooling_oil';");
      if($otac) {
        header("Location: auto.php");
      }
   }
}

?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Päivitä</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Hiace</h2>
                    </div>
                    <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-group">
                            <label>Öljy</label>
                            <input type="text" name="oil" class="form-control" value="<?php echo $info['oil']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Jakohihna</label>
                            <input type="text" name="timing_belt" class="form-control" value="<?php echo $info['timing_belt']; ?>">
                        </div>
		        <div class="form-group">
                            <label>Ilmansuodatin</label>
                            <input type="text" name="air_filter" class="form-control" value="<?php echo $info['air_filter']; ?>">
                        </div>
                        <div class="form-group">
                             <label>Jäähdytinneste</label>
                             <input type="text" name="cooling_oil" class="form-control" value="<?php echo $info['cooling_oil']; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Lähetä">
                        <a href="auto.php" class="btn btn-default">Peruuta</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
