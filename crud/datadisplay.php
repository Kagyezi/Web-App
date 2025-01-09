<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="css\bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table class="table table-hover my-5" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Time</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>

            <?php
            $sql = "select * from data";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $Name = $row['name'];
                    $Email = $row['email'];
                    $dob = $row['dob'];
                    $time = $row['time'];
                    $Gender = $row['gender'];
                    $Mobile = $row['mobile'];
                    $Password = $row['password'];
                    $bio = $row['bio'];
                    echo '
                    <tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $Name . '</td>
                        <td>' . $Email . '</td>
                        <td>' . $dob . '</td>
                        <td>' . $time . '</td>
                        <td>' . $Gender . '</td>
                        <td>' . $Mobile . '</td>
                        <td>' . $Password . '</td>
                        <td>' . $bio . '</td>
                        <td>
                        <button class="btn btn-primary"><a class="text-light" href="dataupdate.php?updateid=' . $id . '">Update</a></button>
                        <button class="btn btn-danger"><a class="text-light" href="datadelete.php?deleteid=' . $id . '">Delete</a></button>
                    </td>
                    </tr>
                        ';
                }
            }
            ?>

            </tbody>
        </table>
        <a href="datacreate.php" class="btn btn-primary ">Add data</a>
        <a href="index.php" class="btn btn-primary ">Home</a>
    </div>
</body>

</html>