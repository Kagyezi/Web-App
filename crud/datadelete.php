<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "delete from data where id = $id";
    $result = mysqli_query($conn, $sql); 
    if($result){
        echo "Data deleted successfully";
        header('location:datadisplay.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>