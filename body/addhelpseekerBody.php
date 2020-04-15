
<form action="" method="POST">
    <div class="container">
      <h1>Add Help Seeker</h1>
      <p>Please fill in this form to add new help seeker.</p>
      <hr>
  
      <br>
      <label for="cnic"><b>Cnic</b></label>
      <input type="text" placeholder="Enter Cnic" name="cnics" required>
      <br>
      <label for="name"><b>Full Name</b></label>
      <input type="text" placeholder="Enter Name" name="fullname" required>
      <br>
      <label for="Address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="add" required>
      <br>
      <label for="Address"><b>Contact Number</b></label>
      <input type="text" placeholder="0300-0000000" name="phonenum" required>
      <br>
      <label for="zip"><b>Zip</b></label>
      <input type="text" placeholder="Enter Zip Code" name="zip" required>
   
      <button type="submit" name="insertSeeker" class="registerbtn">Add Seeker</button>
    </div>
  
  </form>
<!--PHP Files-->
  <?php
 
  if(isset($_POST['insertSeeker'])){
   
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
    $currentDate = date("Y-m-d");
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO helpseeker (cnic,fname,addres,phone,zip)
    VALUES ('$cnic', '$name', '$address','$phone','$zip')";
    
    $relation = "INSERT INTO helpseekerAndrashanRelation (cnic,statuss,dates)
    VALUES ('$cnic', '$boolValue','$currentDate')";
    
    if ($conn->query($sql) === TRUE && $conn->query($relation)===TRUE) {
  
      echo "SUBMITTED";
    } else {
      ?>
    <script>
      myFunction()
      function myFunction() 
      {
        alert("This person is already registered"); 
      }
    </script>
       <?php
       }
  
    
    $conn->close();
  
   }
 
?>
