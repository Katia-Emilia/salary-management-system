<?php
session_start();
  
include("dbemp.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['fname'];
    $address = $_POST['address'];
    $emailid = $_POST['email'];
    $phoneno = $_POST['phone'];
    $id = $_POST['id'];
    $title = $_POST['title'];
    $hiredate = $_POST['hiredate'];
    $dept = $_POST['dept'];
    $empstat = $_POST['empStatus'];
    $stmt = "UPDATE employee SET fname = '$username', address='$address', email='$emailid', phone='$phoneno', title='$title', doh='$hiredate', dept='$dept', empstat='$empstat' WHERE id = '$id'";
    if ($con->query($stmt)) {
        $con->query($stmt);
        echo "<script>alert('Data updated Successfully!'); window.location.href = 'employeedetails.php';</script>;";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    echo "Invalid request";
}
?>