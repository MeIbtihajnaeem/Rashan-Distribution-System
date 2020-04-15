<h2>Add or Update Rashan</h2>
      <hr>

    <form action="" method="POST">
    <div class="container">
      <h1>Add Rashan Quantity</h1>
      <hr>
      <label for="date"><b>Date</b></label>
      <input type="date" placeholder="Enter Date" name="date" required>
  
      <label for="quantity"><b>Quantity</b></label>
      <input type="number" placeholder="Enter Quantity of Rashan" name="rquantity" required>
      <hr>

      <button style="width: 20%;" type="submit" name="addrashan" class="registerbtn">Add Rashan </button>
    </div>
  
  </form>
            
            <form action="#" method="POST">
                <div class="container">
                  <h1>Update Rashan Quantity</h1>
                  <hr>
              
                  <label for="date"><b>Date</b></label>
                  <input type="date" placeholder="Enter Date" name="date" required>
              
                  <label for="quantity"><b>Quantity</b></label>
                  <input type="number" placeholder="Enter Quantity of Rashan" name="rquantity" required>
                  <hr>
            
                  <button style="width: 20%;" type="submit" name ="updaterashan" class="registerbtn">Update Rashan Quantity</button>
                </div>
              
              </form>
          

<?php
  if(isset($_POST['addrashan'])){
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
$log = "INSERT INTO Orders (dates,quantity) VALUES('$dates','$quantity')";

if ($conn->query($sql) === TRUE && $conn->query($log)===TRUE) {

   echo "Added to database";
} else {
  ?>
  <script>
    myFunction()
    function myFunction() 
    {
      alert("Cannot add rashan bag since this date is already register try to update rashan quantity"); 
    }
  </script>
     <?php
   
}

$conn->close();
   }
 ?>
<?php
if(isset($_POST['updaterashan'])){
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

    echo "updated";
} else {
  ?>
  <script>
    myFunction()
    function myFunction() 
    {
      alert("Cannot update rashan bag"); 
    }
  </script>
     <?php
   
}

$conn->close();
}
?>
