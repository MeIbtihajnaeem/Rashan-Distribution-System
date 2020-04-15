<h2>Remaining Rashan Bags</h2>
<hr>
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
   
        <tr>
            <th>SNo</th>
            <th>Date</th>
            <th>Remaining Bags</th>
            <th>Out Of</th>
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
   
   $sql = 'SELECT rash.dates AS dt, rash.quantity AS qt, ord.quantity AS quant FROM rashan AS rash , Orders AS ord  WHERE rash.dates=ord.dates';
   $result = $conn->query($sql);
   
   if(! $result ) {
      die('Could not get data: ' . mysql_error());
   }
   
   if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
       ?>
    <tr>
                <td><span><?php echo $id ?></span></td>
                <td><?php echo $row["dt"] ?></td>
                <td><?php echo $row["qt"] ?></td>
                <td><?php echo $row["quant"] ?></td>
     </tr>
     
<?php
$id = $id+1;
    }
}

$conn->close();
?>
   </table>

    </div>