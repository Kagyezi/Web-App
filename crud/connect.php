<?php
    $conn = mysqli_connect('localhost', 'root', '', 'tutorial');

    if(!$conn){
        die(mysqli_error($conn));
    }

?> 