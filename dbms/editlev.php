<?php
    session_start();
  
include("dbemp.php");

// Check if a record ID is provided
if (isset($_GET['id'])) {
    $recordId = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $selectQuery = "SELECT * FROM leaves Where id='$recordId'";
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
            <form action="updatelev.php" method="post">
            <input type="test" name="id" value="<?php echo $record['id']; ?>", id="id" style="background-color:transparent ; color: rgba(0,0,0,0); border-color:transparent">           
          <br>
          <div class="field">

            <p>Name</p>
          <input type="text" name="fname" value="<?php echo $record['fname']; ?>" id="name" >
        </div>
        <br>
        <div class="field">
          <p>Paid Leave</p>
          <input type="number" name="PaidLeave" value="<?php echo $record['PdLeave']; ?>" id="PaidLeave">
        </div>
        <br>
        <div class="field">
          <p>Parental Leave</p>
          <input type="number" name="ParentalLeave" value="<?php echo $record['PrLeave']; ?>" id="ParentalLeave">
        </div>
        <br>
        <div class="field">
          <p>SickLeave</p>
          <input type="number" name="SickLeave" value="<?php echo $record['SLeave']; ?>" id="SickLeave">
        </div>
        <br>
        <div class="field">
          <p>Annual Leave</p>
          <input type="number" name="AnnualLeave" value="<?php echo $record['ALeave']; ?>" id="AnnualLeave">
        </div>
        <br>
        <div class="field">
          <p>Compensatory Leave</p>
          <input type="number" name="CompensatoryLeave" value="<?php echo $record['CoLeave']; ?>" id="CompensatoryLeave">
        </div>
        <br>
        <div class="field">
          <p>Casual Leave</p>
          <input type="number" name="CasualLeave" value="<?php echo $record['CaLeave']; ?>" id="CasualLeave">
        </div>
        <br>
        <div class="field">
          <p>Marriage Leave</p>
          <input type="number" name="MarriageLeave" value="<?php echo $record['MaLeave']; ?>" id="MarriageLeave">
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