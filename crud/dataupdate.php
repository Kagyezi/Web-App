<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from data where id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$dob = $row['dob'];
$time = $row['time'];
$gender = $row['gender'];
$mobile = $row['mobile'];
$password = $row['password'];
$bio = $row['bio'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $time = $_POST['time'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];

    $sql = "update data set id = '$id', name = '$name', email = '$email', dob = '$dob', time = '$time', gender = '$gender', 
    mobile = '$mobile', password = '$password', bio = '$bio' where id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:datadisplay.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
        <div class="mt-3">
                <label>Name: </label>
                <input type="text" name="name" placeholder="Enter your name" autocomplete="off" value=<?php echo $name; ?>>
            </div>
            <div class="mt-3">
                <label>Email: </label>
                <input type="email" name="email" placeholder="Enter your email" autocomplete="off" value=<?php echo $email; ?>>
            </div>
            <div class="mt-3">
                <label>Date of Birth: </label>
                <input type="date" name="dob" required value=<?php echo $dob; ?>>
            </div>
            <div class="mt-3">
                <label>Time: </label>
                <input type="time" name="time" required value=<?php echo $time; ?>>
            </div>
            <div class="mt-3">
                <label>Gender: </label>
                <input type="radio" name="gender" value="m" value=<?php echo $gender; ?>>Male
                <input type="radio" name="gender" value="f" value=<?php echo $gender; ?>>Female
            </div>
            <div class="mt-3">
                <label>Phone number: </label>
                <input type="mobile" name="mobile" placeholder="Enter your phone number" autocomplete="off" value=<?php echo $mobile; ?>>
            </div>
            <div class="mt-3">
                <label>Password: </label>
                <input type="password" name="password" placeholder="Enter your password" autocomplete="off" value=<?php echo $password; ?>>
            </div>
            <div class="mt-3">
                <label>Bio: </label>
                <textarea cols="5" rows="5" name="bio" class="form-control" value=<?php echo $bio;?>> </textarea>
            </div>
            <button class="mt-3" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>