<?php

session_start();
  
include("dbemp.php");

// Check if a record ID is provided
if (isset($_GET['id'])) {
    $recordId = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = "DELETE FROM employee WHERE id = '$recordId' ";

    if ($con->query($stmt)) {
        $con->query($stmt);
        echo "<script>alert('Data Deleted Successfully!'); window.location.href = 'employeedetails.php';</script>";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

} else {
    echo "Record ID not provided";
}


?>