<?php
  session_start();
  
  include("dbemp.php");

  $selectQuery = "SELECT * FROM salary ORDER BY id ASC";
    $result = mysqli_query($con,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Update</title>

    <link rel="stylesheet" href="salaryupdate.css">
</head>
<body>

    <div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
    </div>

    <div class="add-btn">
        <a href="addsal.php">Add Info</a>
    </div>
    <div class="container">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Salary Amount</th>
                <th>Last payment on</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['sal']; ?></td>
                    <td><?php echo $row['lastPDate']; ?></td>
                    <td><?php echo $row['empstat']; ?></td>
                    <td>
                    <?php
                    echo '<a href="editsal.php?id=' . $row['id'] . '" class="edit">Edit</a>';
                    echo '<a href="deletesal.php?id=' . $row['id'] . '" class="delete">Delete</a>';
                    ?>
                    

                </td>
                <tr>
                <?php 
               } 
          ?>
           
        
        </table>
    </div>
    


    
  
</body>
</html>