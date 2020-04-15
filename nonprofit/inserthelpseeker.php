<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgdata";
$cnic = $_POST["cnics"];
$name = $_POST["fullname"];
$address=$_POST["add"];
$zip=$_POST["zip"];
$phone = $_POST["phonenum"];
$boolValue = 0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO helpseeker (cnic,fname,addres,phone,zip)
VALUES ('$cnic', '$name', '$address','$phone','$zip')";

$relation = "INSERT INTO helpseekerAndrashanRelation (cnic,statuss)
VALUES ('$cnic', '$boolValue')";

if ($conn->query($sql) === TRUE && $conn->query($relation)===TRUE) {

    header('Location: helpseeker.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>