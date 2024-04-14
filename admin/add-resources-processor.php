<?php 
  require_once '../lib/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $resourceType = $_POST['resourceType'];
        $quantityNeeded = $_POST['quantityNeeded'];
        $requestDate = $_POST['requestDate'];
        $interventionID = $_POST['interventionID'];
        $policymakerID = $_POST['policymakerID'];
        $agencyID = $_POST['agencyID'];
        $approvalStatus = "PEN";
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO resourceallocation_t (resourceType, quantityNeeded, requestDate, interventionID, policymakerID, agencyID, approvalStatus) VALUES ('$resourceType','$quantityNeeded','$requestDate', '$interventionID', '$policymakerID', '$agencyID', '$approvalStatus')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: all-resources.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
