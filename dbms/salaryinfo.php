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
    <title>Salary Information</title>

    <link rel="stylesheet" href="salaryinfo.css">
</head>
<body>

    <div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
    </div>

    <div class="container">
        
        <!-- <form>
            <img src="images/search.png">
            <input type="text" placeholder="Search Employee">
            <button type="submit">Search</button>
        </form> -->

        <table>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Salary Amount</th>
                <th>Last payment on</th>
                <th>Status</th>
                
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['sal']; ?></td>
                    <td><?php echo $row['lastPDate']; ?></td>
                    <td><?php echo $row['empstat']; ?></td>
                    
                <tr>
                <?php 
               } 
          ?>
        
        </table>
    </div>
    

  
</body>
</html>