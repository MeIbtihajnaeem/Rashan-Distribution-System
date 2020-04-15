
<form action="" method="POST">
    <div class="container">
      <h1>Add Help Seeker</h1>
      <p>Please fill in this form to add new help seeker.</p>
      <hr>
  
      <br>
      <label for="cnic"><b>Cnic</b></label>
      <input type="text" placeholder="Enter Cnic" name="cnics" >
      <br>
      <label for="Address"><b>Contact Number</b></label>
      <input type="text" placeholder="0300-0000000" name="phonenum" >
      <br>
      <label for="zip"><b>Zip</b></label>
      <input type="text" placeholder="Enter Zip Code" name="zip" >
   
      <button type="submit" name="insertSeeker" class="registerbtn">Add Seeker</button>
    </div>
  
  </form>

<div id="searchBlock">
  <h2>Search Result</h2>
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
            <th>ZIP</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
<!--PHP Files-->
  <?php
 
  if(isset($_POST['insertSeeker'])){
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "orgdata";
    $cnic = $_POST["cnics"];
    $zip=$_POST["zip"];
    $phone = $_POST["phonenum"];
    $boolValue = 0;
    $currentDate = date("Y-m-d");
    $sql="";
    $id = 1;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($phone =="" && $zip=="" && $cnic!=""){
        $sql = "SELECT hp.cnic ,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
        hp.cnic='$cnic' AND (hp.cnic=hpr.cnic) ";
    }
    else  if($cnic =="" && $zip=="" && $phone!=""){
        $sql = "SELECT hp.cnic,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
        hp.phone='$phone' AND (hp.cnic=hpr.cnic) ";
    }
    else  if($cnic =="" && $zip!="" && $phone==""){
        $sql = "SELECT hp.cnic,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
        hp.zip='$zip' AND (hp.cnic=hpr.cnic) ";
    }
    else if($phone !="" && $zip=="" && $cnic!=""){
        $sql = "SELECT hp.cnic ,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
        hp.cnic='$cnic' OR hp.phone='$phone' AND (hp.cnic=hpr.cnic) ";
    }
    else if($phone =="" && $zip!="" && $cnic!=""){
        $sql = "SELECT hp.cnic ,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
        hp.cnic='$cnic' OR hp.zip='$zip' AND (hp.cnic=hpr.cnic) ";
    }
    else  if($cnic =="" && $zip!="" && $phone!=""){
        $sql = "SELECT hp.cnic,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
        hp.phone='$phone' OR hp.zip='$zip' AND (hp.cnic=hpr.cnic) ";
    }
    else if($cnic !="" && $zip!="" && $phone!=""){
        $sql = "SELECT hp.cnic,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr  WHERE 
       (hp.cnic='$cnic' OR hp.phone='$phone' OR hp.zip='$zip') AND (hp.cnic=hpr.cnic) ";
}
    else{
        $sql = "SELECT hp.cnic,hp.fname,hp.addres,hp.phone,hp.zip ,hpr.dates ,hpr.statuss from helpseeker AS hp ,helpseekerAndrashanRelation AS hpr ";
    }

    $result = $conn->query($sql);
   
    if(! $result ) {
       echo "No Result Found";
    }
    
    if ($result->num_rows > 0) {
   
     while($row = $result->fetch_assoc()) {
         $Status= $row["statuss"];
         if($Status==1){
             $Status="Sent";
         }
         else{
            $Status="Pending";
         }
        ?>
     <tr>
                 <td><span><?php echo $id ?></span></td>
                 <td><?php echo $row["cnic"] ?></td>
                 <td><?php echo $row["fname"] ?></td>
                 <td><?php echo $row["addres"] ?></td>
                 <td><?php echo $row["phone"] ?></td>
                 <td><?php echo $row["zip"] ?></td>
                 <td><?php echo $row["dates"] ?></td>
                 <td><?php echo $Status?></td>
      </tr>
      
 <?php
 $id = $id+1;
     }
 }
 else{
    echo "No Result Found";
 }
 $conn->close(); 
   }
 
?>
</table>


    </div>