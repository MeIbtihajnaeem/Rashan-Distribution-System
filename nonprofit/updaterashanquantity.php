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
$sql = "UPDATE rashan SET quantity='$quantity' WHERE dates='$dates'";
$log = "UPDATE Orders SET quantity='$quantity' WHERE dates='$dates'";


if ($conn->query($sql) === TRUE && $conn->query($log)===TRUE)  {

    header('Location: rashanbag.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   
}

$conn->close();
?>