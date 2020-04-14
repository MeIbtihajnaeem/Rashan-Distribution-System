<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgdata";
$dates = $_POST["date"];
$quantity = $_POST["rquantity"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO rashan (dates,quantity) VALUES('$dates','$quantity')";


if ($conn->query($sql) === TRUE) {

    header('Location: rashanbag.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   
}

$conn->close();
?>