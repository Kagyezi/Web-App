<?php
$exists = 0;
$success = 0;

if (isset($_POST['submit'])) {
    include 'connect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $time = $_POST['time'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];

    $sql = "select * from data where name = '$name'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $exists = 1;
        } else {
            $sql = "insert into data (name, email, dob, time, gender, mobile, password, bio) 
            values ('$name', '$email', '$dob', '$time', '$gender', '$mobile', '$password','$bio')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $success = 1;
                // header('location:display.php');
            } else {
                die(mysqli_error($conn));
            }
        }

    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form data</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
</head>

<body>

    <?php
    if ($exists) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> Data already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <?php
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> Data uploaded.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <div class="container">
        <form action="" method="post" class="my-5" >
            <div class="mt-3">
                <label>Name: </label>
                <input type="text" name="name" placeholder="Enter your name" autocomplete="off">
            </div>
            <div class="mt-3">
                <label>Email: </label>
                <input type="email" name="email" placeholder="Enter your email" autocomplete="off">
            </div>
            <div class="mt-3">
                <label>Date of Birth: </label>
                <input type="date" name="dob" required>
            </div>
            <div class="mt-3">
                <label>Time: </label>
                <input type="time" name="time" required>
            </div>
            <div class="mt-3">
                <label>Gender: </label>
                <input type="radio" name="gender" value="m">Male
                <input type="radio" name="gender" value="f">Female
            </div>
            <div class="mt-3">
                <label>Phone number: </label>
                <input type="mobile" name="mobile" placeholder="Enter your phone number" autocomplete="off">
            </div>
            <div class="mt-3">
                <label>Password: </label>
                <input type="password" name="password" placeholder="Enter your password" autocomplete="off">
            </div>
            <div class="mt-3">
                <label>Bio: </label>
                <textarea cols="5" rows="5" name="bio" class="form-control" required> </textarea>
            </div>
            <button class="btn btn-primary my-5" name="submit">Submit</button>
            <a href="datadisplay.php" class="btn btn-primary">View data</a>
        </form>
    </div>
</body>

</html>