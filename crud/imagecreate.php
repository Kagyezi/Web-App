<?php
include('connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExplode = explode('.', $fileName);
    $fileExt = strtolower(end($fileExplode));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'mp3', 'mp4', 'mkv');

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000000) { // Check the file size
                $fileNameNew = uniqid('', true) . "." . $fileExt; // Give the file a new random name
                $fileDestination = 'uploads/' . $fileNameNew; // Specify the file's final location
                move_uploaded_file($fileTmpName, $fileDestination); // Move the file from its temporary location
                // echo "Success";
                $sql = "insert into images (name, image) values ('$name', '$fileDestination')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo "<div class='alert alert-success' role='alert'>
                    //     <strong>Success</strong> Data inserted successfully</div>";
                    header('location:imagedisplay.php');
                } else {
                    die(mysqli_error($conn));
                }
            } else {
                echo "File too big !";
            }
        } else {
            echo "Upload error !";
        }
    } else {
        echo "Can't upload this type of file !";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class='form-group my-4'>
            <form action="" method="post" class="w-50" enctype="multipart/form-data">
                <div class="mt-3">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter your name" autocomplete="off">
                </div>
                <div class="mt-3">
                    <label>Image</label>
                    <input type="file" class='form-control' name="file">
                </div>
                <!-- <button class="btn btn-dark" type="submit" name="submit">Submit</button> -->
                <button class="btn btn-primary my-5" name="submit">Submit</button>

            </form>
        </div>
    </div>
</body>

</html>