<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hornet";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

    $sql="Insert into users(name,phone,email)values('$name',$phone,'$email')";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        die('Data not Inserted'. mysqli_error($conn));
    }else{
        header("Location:show.php");
        exitt();
    }
}
?>

