<?php 
require_once '../lib/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resourceType = $_POST['resourceType'];
    $quantityNeeded = $_POST['quantityNeeded'];
    $requestDate = $_POST['requestDate'];
    $interventionID = $_POST['interventionID'];
    $policymakerID = $_POST['policymakerID'];
    $agencyID = $_POST['agencyID'];
    $editId = $_POST['resourceId'];
   
  
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE resourceallocation_t SET resourceType=?, quantityNeeded=?, requestDate=?, interventionID=?, policymakerID=?, agencyID=? WHERE resourceID=?");
    $stmt->bind_param("sssssss", $resourceType, $quantityNeeded, $requestDate, $interventionID,$policymakerID,$agencyID, $editId);


    // // Use prepared statement to prevent SQL injection
    // $stmt = $conn->prepare("UPDATE policymakers_t SET policymakerName=?, policymakerEmail=?, policymakerContact=?, policymakerGroup=?, password=? WHERE policymakerID=?");
    // $stmt->bind_param("ssssss", $name, $email, $contact, $group, $password, $editId);

    // Execute the update statement
    if ($stmt->execute()) {
        header("Location: all-resources.php");
        // Redirect to a confirmation page or back to the list of policymakers
        // header("Location: confirmation.php");
        exit;
    } else {
        echo "Error updating intervention: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>