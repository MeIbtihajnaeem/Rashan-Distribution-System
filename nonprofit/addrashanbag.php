<h2>Add or Update Rashan</h2>
      <hr>

    <form action="insertrashanquantity.php" method="POST">
    <div class="container">
      <h1>Add Rashan Quantity</h1>
      <hr>
      <label for="date"><b>Date</b></label>
      <input type="date" placeholder="Enter Date" name="date" required>
  
      <label for="quantity"><b>Quantity</b></label>
      <input type="number" placeholder="Enter Quantity of Rashan" name="rquantity" required>
      <hr>

      <button style="width: 20%;" type="submit" class="registerbtn">Add Rashan </button>
    </div>
  
  </form>
            
            <form action="updaterashanquantity.php" method="POST">
                <div class="container">
                  <h1>Update Rashan Quantity</h1>
                  <hr>
              
                  <label for="date"><b>Date</b></label>
                  <input type="date" placeholder="Enter Date" name="date" required>
              
                  <label for="quantity"><b>Quantity</b></label>
                  <input type="number" placeholder="Enter Quantity of Rashan" name="rquantity" required>
                  <hr>
            
                  <button style="width: 20%;" type="submit" class="registerbtn">Update Rashan Quantity</button>
                </div>
              
              </form>
          