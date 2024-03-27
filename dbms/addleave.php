<?php
  session_start();
  
  include("dbemp.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $id = $_POST['id'];
    $username = $_POST['fname'];
    $Pd = $_POST['PaidLeave'];
    $Pr = $_POST['ParentalLeave'];
    $S = $_POST['SickLeave'];
    $A = $_POST['AnnualLeave'];
    $Co = $_POST['CompensatoryLeave'];
    $Ca = $_POST['CasualLeave'];
    $Ma = $_POST['MarriageLeave'];

    if(!empty($id) )
    {
      $query = "select * from employee where id = '$id' limit 1";
      $result = mysqli_query($con, $query);

      if($result){
        if($result && mysqli_num_rows($result) > 0 && $result)
        {
          $query1 = "select * from leaves where id = '$id' limit 1";
          $result1 = mysqli_query($con, $query1);
          $user_data = mysqli_fetch_assoc($result1);

           if(empty($user_data['id']))
           {
            $query = "insert into leaves (id, fname, PdLeave, PrLeave, SLeave, ALeave, CoLeave, CaLeave, MaLeave) values ('$id', '$username', '$Pd', '$Pr', '$S', '$A', '$Co', '$Ca', '$Ma')";
      
            mysqli_query($con, $query);
      
            echo "<script>alert('Successfully Register!'); window.location.href = 'dashboard.html';</script>";
             
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
    <title>Add Leave</title>
    <link rel="stylesheet" href="./addleave.css">
</head>
<body>
<div class="wrapper">
<div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
</div>
    <div class="title-text">
      <div class="title add">Add Leave</div>
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
          <input type="text" name="fname" placeholder="Name" id="name" required>
        </div>
        <br>
        <div class="field">
          <p>Paid Leave</p>
          <input type="number" name="PaidLeave" placeholder="Paid Leave" id="PaidLeave">
        </div>
        <br>
        <div class="field">
          <p>Parental Leave</p>
          <input type="number" name="ParentalLeave" placeholder="Parental Leave" id="ParentalLeave">
        </div>
        <br>
        <div class="field">
          <p>SickLeave</p>
          <input type="number" name="SickLeave" placeholder="Sick Leave" id="SickLeave">
        </div>
        <br>
        <div class="field">
          <p>Annual Leave</p>
          <input type="number" name="AnnualLeave" placeholder="Annual Leave" id="AnnualLeave">
        </div>
        <br>
        <div class="field">
          <p>Compensatory Leave</p>
          <input type="number" name="CompensatoryLeave" placeholder="Compensatory Leave" id="CompensatoryLeave">
        </div>
        <br>
        <div class="field">
          <p>Casual Leave</p>
          <input type="number" name="CasualLeave" placeholder="Casual Leave" id="CasualLeave">
        </div>
        <br>
        <div class="field">
          <p>Marriage Leave</p>
          <input type="number" name="MarriageLeave" placeholder="Marriage Leave" id="MarriageLeave">
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