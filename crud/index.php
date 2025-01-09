<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <h1>Hello,
        <?php echo $_SESSION['username']; ?>
    </h1>
    <div class="container">
        <a href="datacreate.php" class="btn btn-primary my-3">Add data</a>
        <a href="datadisplay.php" class="btn btn-primary">View data</a><br>
        <a href="imagecreate.php" class="btn btn-primary my-3">Add images</a>
        <a href="imagedisplay.php" class="btn btn-primary">View images</a><br>
        <a href="signout.php" class="btn btn-primary my-3">Logout</a>
    </div>
</body>

</html>