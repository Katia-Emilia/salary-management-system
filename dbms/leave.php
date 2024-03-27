<?php
  session_start();
  
  include("dbemp.php");

  $selectQuery = "SELECT * FROM leaves ORDER BY id ASC";
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
    <title>leave</title>

    <link rel="stylesheet" href="leave.css">
</head>
<body>
    
    <div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
    </div>

    <div class="container">
        

        <div class="add-btn">
            <a href="addleave.php">Add Info</a>
        </div>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Paid leave</th>
                <th>Parental leave</th>
                <th>Sick leave</th>
                <th>Annual leave</th>
                <th>Compensatory leave</th>
                <th>Casual leave</th>
                <th>Marriage leave</th>
                <th>Action</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['PdLeave']; ?></td>
                    <td><?php echo $row['PrLeave']; ?></td>
                    <td><?php echo $row['SLeave']; ?></td>
                    <td><?php echo $row['ALeave']; ?></td>
                    <td><?php echo $row['CoLeave']; ?></td>
                    <td><?php echo $row['CaLeave']; ?></td>
                    <td><?php echo $row['MaLeave']; ?></td>
                    <td>
                    <?php
                    echo '<a href="editlev.php?id=' . $row['id'] . '" class="edit">Edit</a>';
                    echo '<a href="deletelev.php?id=' . $row['id'] . '" class="delete">Delete</a>';
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
