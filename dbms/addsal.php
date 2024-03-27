<?php
  session_start();
  
  include("dbemp.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $fname = $_POST['name'];
    $id = $_POST['id'];
    $salary =$_POST['salary'];
    $lastdate =$_POST['lastpdate'];
    $empstat =$_POST['empstat'];

    if(!empty($id) && !empty($salary))
    {
      $query = "select * from employee where id = '$id' limit 1";
      $result = mysqli_query($con, $query);

      if($result){
        if($result && mysqli_num_rows($result) > 0 && $result)
        {
          $query1 = "select * from salary where id = '$id' limit 1";
          $result1 = mysqli_query($con, $query1);
          $user_data = mysqli_fetch_assoc($result1);

           if(empty($user_data['sal']))
           {$query = "insert into salary ( id, fname, sal, lastPDate, empstat) values ('$id', '$fname', '$salary', '$lastdate', '$empstat')";
      
            mysqli_query($con, $query);
 
    
            echo "<script>alert('Successfully added salary!'); window.location.href = 'dashboard.html';</script>";
             
           }      
           else{
            echo "<script type='text/javascript'> alert('Already exists')</script>";
           }
        }
      }
      
    }

  }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Salary</title>
    <link rel="stylesheet" href="./addsal.css">
</head>
<body>
<div class="wrapper">
<div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
</div>
    <div class="title-text">
      <div class="title add">Add Salary</div>
    </div>
      <div class="form-inner">

        <form  method="post" class="add">    
          <div class="field">
            <p>Employee ID </p>
            <input type="text" name="id" placeholder="ID" id="id" required>
          </div>     
          <br>
          <div class="field">
            <p>Name</p>
          <input type="text" name="name" placeholder="Name" id="name" required>
        </div>
        <br>
        <div class="field">
          <p>Salary</p>
          <input type="number" name="salary" placeholder="salary" id="salary" required>
        </div>
        <br>
        <div class="field">
          <p>Last Payment on</p>
          <input type="date" name="lastpdate"  id="lastpayment" required>
        </div>
        <br>
              <div class="field">
                <p>Employment Status</p>
                <input type="text" name="empstat"  id="lastpayment" placeholder="paid or not paid" required>
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
</body></html>