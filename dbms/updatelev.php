<?php
// Connect to your database (replace these credentials with your actual database credentials)
session_start();
  
include("dbemp.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted using POST method

    // Get data from the form
    $id = $_POST['id'];
    $username = $_POST['fname'];
    $Pd = $_POST['PaidLeave'];
    $Pr = $_POST['ParentalLeave'];
    $S = $_POST['SickLeave'];
    $A = $_POST['AnnualLeave'];
    $Co = $_POST['CompensatoryLeave'];
    $Ca = $_POST['CasualLeave'];
    $Ma = $_POST['MarriageLeave'];
    // Use prepared statements to prevent SQL injection
    $stmt = "UPDATE leaves SET fname = '$username', PdLeave='$Pd', PrLeave='$Pr', SLeave='$S', ALeave='$A', CoLeave='$Co', CaLeave='$Ca', MaLeave='$Ma' WHERE id = '$id'";
    
    if ($con->query($stmt)) {
        $con->query($stmt);
        echo "<script>alert('Data updated Successfully!'); window.location.href = 'leave.php';</script>;";
    } else {
        echo "Error updating record: " . $stmt->error;
    }


} else {
    echo "Invalid request";
}

?>
