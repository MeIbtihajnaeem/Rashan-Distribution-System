
<form action="inserthelpseeker.php" method="POST">
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
   
      <button type="submit" class="registerbtn">Add Seeker</button>
    </div>
  
  </form>