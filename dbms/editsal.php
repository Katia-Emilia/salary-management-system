<?php
    session_start();
  
include("dbemp.php");

// Check if a record ID is provided
if (isset($_GET['id'])) {
    $recordId = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $selectQuery = "SELECT * FROM salary Where id='$recordId'";
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
      <div class="title add">Edit Employee</div>
    </div>
   <br>
      <div class="form-inner">
            <form action="updatesal.php" method="post">
            <input type="test" name="id" value="<?php echo $record['id']; ?>", id="id" style="background-color:transparent ; color: rgba(0,0,0,0); border-color:transparent">
          <div class="field">
            <p>Name</p>
          <input type="text" name="name" value="<?php echo $record['fname']; ?>" placeholder="Name" id="name" >
        </div>
        <br>
        <div class="field">
          <p>Salary</p>
          <input type="number" name="sal" value="<?php echo $record['sal']; ?>" placeholder="salary" id="salary" >
        </div>
        <br>
        <div class="field">
          <p>Last Payment on</p>
          <input type="date" name="lastpdate" value="<?php echo $record['lastPDate']; ?>" id="lastpdate" required>
        </div>
        <br>
              <div class="field">
                <p>Employment Status</p>
                <input type="text" name="empstat" value="<?php echo $record['empstat']; ?>" id="lastpayment" placeholder="paid or not paid" required>
              </div>
              <br>
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