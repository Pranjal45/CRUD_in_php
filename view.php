<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hornet";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the 'id' parameter from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user data based on the 'id' from the URL
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo "<h2>User Details</h2>";
            echo "<h1>Id: " . $row['id'] . "</h1>";
            echo "<h1>Name: " . $row['name'] . "</h1>";
            echo "<h1>Email: " . $row['email'] . "</h1>";
            echo "<h1>Phone: " . $row['phone'] . "</h1>";
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided.";
}
?>
