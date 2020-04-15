<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgdata";
$cnic = $_POST["checkbox"];
$boolValue = 1;
$currentDate = date("Y-m-d");
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['checkbox'])){
  $rashan = "SELECT quantity  FROM rashan WHERE dates='$currentDate'";
  $result= $conn->query($rashan);
  $result = $result->fetch_assoc();
  $result = $result["quantity"];
    if (is_array($_POST['checkbox'])) {
      foreach($_POST['checkbox'] as $value){
        $sql = "UPDATE helpseekerAndrashanRelation SET statuss='$boolValue', dates='$currentDate' WHERE cnic='$value'";
        $conn->query($sql);
        $result = $result-1;
      
      }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      $value = $_POST['checkbox'];
      echo $value;
    }
    $updateRashan = "UPDATE rashan SET quantity='$result' WHERE dates='$currentDate'";
       
    $conn->query($updateRashan);
  }
  header('Location: donate.php');
  exit();

$conn->close();
?>