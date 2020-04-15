<h2>Select People to Donate</h2>
      <hr>
    
    

        
        <div class="card rounded-0 p-0 shadow-sm" style="border-color:red;">
          
          <div class="card-body text-center" >
          <h2>Current Date <?php echo dateRetrunFunction()?></h2>
          <p>Rashan Bags Available <?php echo quantityRetrunFunction()?></p>
            
          </div>
        
               
      </div>

    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>SNo</th>
            <th>Cnic</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>ZIP</th>
            
        </tr>
    </thead>
    <form action="" method="POST">
<?php
 $boolValue = 0;
 $id = 1;
 $currentDate = date("Y-m-d");
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "orgdata";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);
   
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
   $sql = 'SELECT main.id, main.cnic, main.fname,main.addres,main.phone,main.ZIP FROM helpseeker AS main , helpseekerAndrashanRelation AS second WHERE  main.cnic=second.cnic AND second.statuss=0';

   $result = $conn->query($sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysql_error());
   }
   
   if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       ?>
    <tr>
                <td><input type="checkbox" name="checkbox[]" value=<?php echo $row["cnic"] ?> id=<?php echo $row["cnic"] ?>>
                <span><?php echo $id ?></span>
                </td>
                <td><?php echo $row["cnic"] ?></td>
                <td><?php echo $row["fname"] ?></td>
                <td><?php echo $row["addres"] ?></td>
                <td><?php echo $row["phone"] ?></td>
                <td><?php echo $row["zip"] ?></td>
     </tr>
     
<?php
$id = $id+1;
    }
}

//echo "Fetched data successfully\n";
$conn->close();

function dateRetrunFunction(){
    $currentDate = date("Y-m-d");
    $quantityQuery = "SELECT dates,quantity from rashan WHERE dates= '$currentDate'";
    $conn = connection();
    $response = $conn->query($quantityQuery);
    $response = $response->fetch_assoc();
    return $response["dates"];
}

function quantityRetrunFunction(){
    $currentDate = date("Y-m-d");
    $quantityQuery = "SELECT dates,quantity from rashan WHERE dates= '$currentDate'";
    $conn = connection();
    $response = $conn->query($quantityQuery);
    $response = $response->fetch_assoc();
    return $response["quantity"];
}
function connection(){
    
    $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "orgdata";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);
 return $conn;
}
?>
   </table>
   <button type="submit" name="donate" class="registerbtn">Donate</button>
   </form>

    </div>

<!--Php Submission code-->
<?php
  if(isset($_POST['donate'])){

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
        if($result<=0){
            ?>
            <script>
              myFunction()
              function myFunction() 
              {
                alert("Sorry no rashan available right now"); 
              }
            </script>
               <?php
            
               break;
        }
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

$conn->close();

   }
 ?>