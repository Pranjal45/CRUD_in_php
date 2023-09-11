<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hornet";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$request = mysqli_query($conn, $sql);

if (!$request) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Data</title>
</head>
<body>
<h2><a href="add.html">ADD</a></h2>
<table border='1'>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>VIEW</th>
        <th>UPDATE</th>
        <th>DELETE</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($request)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td> <a href='view.php?id=" . $row['id']."'>View</a> </td>";
        echo "<td> <a href='update.php?id=".$row['id']."'>update</a> </td>";
        echo "<td> <a href='delete.php?id=".$row['id']."'>delete</a> </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>
