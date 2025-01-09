<?php
include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Image</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        img {
            width: 50px;
        }
    </style>
</head>

<body>
    <h1 class="text-center my-4">Data</h1>
    <div class="container mt-5 d-flex justify-content-center"></div>
    <table class="table table-bordered w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from images";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $image = $row['image'];
                echo '<tr>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                <td><img src=' . $image . ' /></td>
                <td>
                    <button class="btn btn-primary"><a class="text-light" href="imageupdate.php?updateid=' . $id . '">Update</a></button>
                    <button class="btn btn-danger"><a class="text-light" href="imagedelete.php?deleteid=' . $id . '">Delete</a></button>
                </td>
                </tr>';
            }
            ?>

        </tbody>
    </table>
    <a href="imagecreate.php" class="btn btn-primary my-5">Add data</a>
    <a href="index.php" class="btn btn-primary my-5">Home</a>
</body>

</html>