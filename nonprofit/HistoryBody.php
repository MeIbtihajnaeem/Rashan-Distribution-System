<h2>Helped People</h2>
<hr>
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>SNo</th>
            <th>Cnic</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            
        </tr>
    </thead>
    <form action="donated.php" method="POST">
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "orgdata";
 $boolValue = 1;
 $id = 1;
 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);
   
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   
   $sql = 'SELECT main.id, main.cnic, main.fname,main.addres,main.phone FROM helpseeker AS main , helpseekerAndrashanRelation AS second WHERE  main.cnic=second.cnic AND second.statuss=1';

   $result = $conn->query($sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysql_error());
   }
   
   if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       ?>
    <tr>
                <td><span><?php echo $id ?></span></td>
                <td><?php echo $row["cnic"] ?></td>
                <td><?php echo $row["fname"] ?></td>
                <td><?php echo $row["addres"] ?></td>
                <td><?php echo $row["phone"] ?></td>
     </tr>
     
<?php
$id = $id+1;
    }
}

$conn->close();
?>
   </table>
   <button type="submit" class="registerbtn">Donate</button>
   </form>

    </div>