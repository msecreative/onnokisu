<?php 
require_once '../lib/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    // Collect form data
    $interventionName = $_POST['interventionName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $targetPopulation = $_POST['targetPopulation'];
    $editId = $_POST['interventionId'];
   
  
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE intervention_t SET interventionName=?, startDate=?, endDate=?, targetPopulation=? WHERE interventionID=?");
    $stmt->bind_param("sssss", $interventionName, $startDate, $endDate, $targetPopulation, $editId);


    // // Use prepared statement to prevent SQL injection
    // $stmt = $conn->prepare("UPDATE policymakers_t SET policymakerName=?, policymakerEmail=?, policymakerContact=?, policymakerGroup=?, password=? WHERE policymakerID=?");
    // $stmt->bind_param("ssssss", $name, $email, $contact, $group, $password, $editId);

    // Execute the update statement
    if ($stmt->execute()) {
        header("Location: all-intervention.php");
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