<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hornet";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="Delete from users where id='$id' ";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        die("failed to delete". mysqli_error($conn));
    }
    else{
        header('Location:show.php');
    }
}