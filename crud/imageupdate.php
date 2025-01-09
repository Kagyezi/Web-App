<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from images where id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$image = $row['image'];

if (isset($_POST['submit'])) {
    $name = $row['name'];
    $image = $row['image'];

    $sql = "update images set name = '$name', image = '$image' where id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:imagedisplay.php');
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
        <form action="" method="post" class="w-50" >
            <div class="mt-3">
                <label>Name</label>
                <input type="text" class="w-100" name="name" placeholder="Enter your name" autocomplete="off" value=<?php echo $name; ?> >
            </div>
            <div class="mt-3">
                <label>Image</label>
                <input type="file" class='form-control' name="file" value=<?php echo $image; ?>>

            </div>
            <button class="mt-3" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>