<?php
  session_start();
  
  include("dbemp.php");

  $selectQuery = "SELECT * FROM employee ORDER BY id ASC";
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
    <title>Employee details</title>

    <link rel="stylesheet" href="employeedetails.css">
</head>
<body>
    
    <div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
    </div>

    <div class="add-btn">
        <a href="addemp.php">Add Info</a>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>SID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email-ID</th>
                <th>Phone No</th>
                <th>Title</th>
                <th>Date-of-hire</th>
                <th>Department</th>
                <th>Employment Status</th>
                <th>Action</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['doh']; ?></td>
                    <td><?php echo $row['dept']; ?></td>
                    <td><?php echo $row['empstat']; ?></td>
                    <td>
                    
                    <?php
                    echo '<a href="editemp.php?id=' . $row['id'] . '" class="edit">Edit</a>';
                    echo '<a href="deleteemp.php?id=' . $row['id'] . '" class="delete">Delete</a>';
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