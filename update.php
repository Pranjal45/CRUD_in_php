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

    $sql="Select * from users where id='$id'";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        die("Failed to view data". mysqli_error($conn));
    }
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $sql2="UPDATE users
    SET  name = '$name', email = '$email',phone='$phone'
    WHERE id ='$id'";
    $result2=mysqli_query($conn,$sql2);

    if(!$result2){
        die("Failed to update data". mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <h2>Update Data</h2>
    <form action="update.php" method="POST">
        <?php
        if (isset($result)) {
            while($row=mysqli_fetch_assoc($result)){
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "Name:<input type='text' name= 'name' value='".$row['name']."'>";
                echo "Email:<input type='text' name= 'email' value='".$row['email']."'>";
                echo "Phone:<input type='text' name= 'phone' value='".$row['phone']."'>";
                echo "<button>Submit</button>";
            }
        } else {
            // If there's no user data to update, redirect to "show.php"
            header("Location: show.php");
            exit();
        }
        ?>
    </form>
</body>
</html>
