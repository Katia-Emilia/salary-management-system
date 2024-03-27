<?php
// Connect to your database (replace these credentials with your actual database credentials)
session_start();
  
include("dbemp.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted using POST method

    // Get data from the form
    $recordId = $_POST['id'];
    $newName = $_POST['name'];
    $empstat = $_POST['empstat'];
    $lpdate = $_POST['lastpdate'];
    $salary = $_POST['sal'];
    // Use prepared statements to prevent SQL injection
    $stmt = "UPDATE salary SET fname = '$newName', sal='$salary', lastPdate='$lpdate', empstat='$empstat' WHERE id = '$recordId'";
    
    if ($con->query($stmt)) {
        $con->query($stmt);
        echo "<script>alert('Data updated Successfully!'); window.location.href = 'salaryupdate.php';</script>;";
    } else {
        echo "Error updating record: " . $stmt->error;
    }


} else {
    echo "Invalid request";
}

?>
