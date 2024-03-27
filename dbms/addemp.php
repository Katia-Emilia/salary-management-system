<?php
  session_start();
  
  include("dbemp.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $username = $_POST['fname'];
    $address = $_POST['address'];
    $emailid = $_POST['email'];
    $phoneno = $_POST['phone'];
    $id = $_POST['id'];
    $title = $_POST['title'];
    $hiredate = $_POST['hiredate'];
    $dept = $_POST['dept'];
    $empstat = $_POST['empStatus'];
    

    if(!empty($id))
    {
      $query = "insert into employee (fname, address, email, phone, id, title, doh, dept, empstat) values ('$username', '$address', '$emailid', '$phoneno', '$id', '$title', '$hiredate', '$dept', '$empstat')";
      
      mysqli_query($con, $query);

      echo "<script>alert('Successfully Register!'); window.location.href = 'dashboard.html';</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Please enter some valid information')</script>";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="./addemp.css">
</head>

<body>

<div class="wrapper">
<div class="back">
        <a href="dashboard.html"><img src="images/back.png"></a>
</div>
    <div class="title-text">
      <div class="title add">Add Employee</div>
    </div>
   <br>
      <div class="form-inner">

        <form  method="post" class="add">
            <div class="personal_info">
                <h4>PERSONAL INFO</h4>
            
          <div class="field">
            <p>Name</p>
          <input type="text" name="fname" placeholder="Name" id="name" required>
        </div>
        <br>
        <div class="field">
          <p>Address</p>
            <input type="text" name="address" placeholder="Address" id="Address" required>
          </div>
          <br>
          <div class="field">
            <p>Email</p>
            <input type="text" placeholder="Email Address" name="email" required>
          </div>
          <br>
          <div class="field">
            <p>Phone</p>
            <input type="text" placeholder="Phone Number" name="phone" id="phone" required>
          </div>
        </div>
          <br>
        <div class="emp_info">
            <h4>EMPLOYMENT INFO</h4>
            <div class="field">
              <p>Employee ID </p>
              <input type="text" name="id" placeholder="ID" id="id" required>
            </div>     
            <br>
              <div class="field">
                <p>Title</p>
                <input type="text" name="title" placeholder="Title" id="title" required>
              </div>
              <br>
              <div class="field">
                <p>Date of hire</p>
                <input type="date" name="hiredate"  id="HireDate" required>
              </div>
              <br>
              <div class="field">
                <p>Department</p>
                <select id="dept" name="dept" size="1" >
                    <option value="comp">COMPUTER DEPARTMENT</option>
                    <option value="mech">MECHANICAL DEPARTMENT</option>
                    <option value="ecomp">ELECTROINC AND COMPUTERS DEPARTMENT</option>
                    <option value="civil">CIVIL DEPARTMENT</option>
                  </select>
              </div>
           
              <div class="field">
                <p>Employment Status</p>
                <select id="empStatus" name="empStatus" size="1" >
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
</body></html>