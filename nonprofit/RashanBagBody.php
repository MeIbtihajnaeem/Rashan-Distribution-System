
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>SNo</th>
            <th>Date</th>
            <th>Remaining Bags</th>
            
        </tr>
    </thead>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "orgdata";
 $id = 1;
 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);
   
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   
   $sql = 'SELECT dates, quantity FROM rashan ';

   $result = $conn->query($sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysql_error());
   }
   
   if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       ?>
    <tr>
                <td><span><?php echo $id ?></span></td>
                <td><?php echo $row["dates"] ?></td>
                <td><?php echo $row["quantity"] ?></td>
     </tr>
     
<?php
$id = $id+1;
    }
}

echo "Fetched data successfully\n";
$conn->close();
?>
   </table>

    </div>