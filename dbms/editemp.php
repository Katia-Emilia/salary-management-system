<?php
    session_start();
  
include("dbemp.php");

// Check if a record ID is provided
if (isset($_GET['id'])) {
    $recordId = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $selectQuery = "SELECT * FROM employee Where id='$recordId'";
    $result = mysqli_query($con,$selectQuery);

    if ($result->num_rows > 0) {
        // Record found, display the form for editing
        $record = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Record</title>
            <link rel="stylesheet" href="./addemp.css">
        </head>
        <body>
            
            <div class="wrapper">
<div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
</div>
    <div class="title-text">
      <div class="title add">Edit Leave</div>
    </div>
   <br>
      <div class="form-inner">
            <form action="updateemp.php" method="post">
            <div class="personal_info">
                <h4>PERSONAL INFO</h4>
            
          <div class="field">
            <p>Name</p>
          <input type="text" name="fname" value="<?php echo $record['fname']; ?>" id="name" required>
        </div>
        <br>
        <div class="field">
          <p>Address</p>
            <input type="text" name="address" value="<?php echo $record['address']; ?>" id="Address" required>
          </div>
          <br>
          <div class="field">
            <p>Email</p>
            <input type="text" value="<?php echo $record['email']; ?>" name="email" required>
          </div>
          <br>
          <div class="field">
            <p>Phone</p>
            <input type="text" value="<?php echo $record['phone']; ?>" name="phone" id="phone" >
          </div>
        </div>
          <br>
        <div class="emp_info">
            <h4>EMPLOYMENT INFO</h4>
            <input type="test" name="id" value="<?php echo $record['id']; ?>", id="id" style="background-color:transparent ; color: rgba(0,0,0,0); border-color:transparent">   
            <br>
              <div class="field">
                <p>Title</p>
                <input type="text" name="title" value="<?php echo $record['title']; ?>" id="title" required>
              </div>
              <br>
              <div class="field">
                <p>Date of hire</p>
                <input type="date" name="hiredate" value="<?php echo $record['doh']; ?>"  id="HireDate" required>
              </div>
              <br>
              <div class="field">
                <p>Department</p>
                <select id="dept" name="dept" value="<?php echo $record['dept']; ?>" size="1" >
                    <option value="comp">COMPUTER DEPARTMENT</option>
                    <option value="mech">MECHANICAL DEPARTMENT</option>
                    <option value="ecomp">ELECTROINC AND COMPUTERS DEPARTMENT</option>
                    <option value="civil">CIVIL DEPARTMENT</option>
                  </select>
              </div>
           
              <div class="field">
                <p>Employment Status</p>
                <select id="empStatus" name="empStatus" value="<?php echo $record['empstat']; ?>" size="1" >
                    <option value="full">Full Time</option>
                    <option value="part">Part Time</option>
                    <option value="contract">Contract</option>
                    <option value="intern">Intern</option>
                  </select>
              </div>
              
        </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Submit">
          </div>
            </form>
            </div>
    </div>
  </div>
        </body>
        </html>
        <?php
    } else {
        echo "Record not found";
    }

}
?>