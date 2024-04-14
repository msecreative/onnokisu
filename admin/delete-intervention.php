<?php 
  require_once '../lib/database.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect policymaker ID from POST data
    $interventionID = $_POST['interventionID'];
    var_dump($interventionID);

    // SQL query to delete policymaker
    $sql = "DELETE FROM intervention_t WHERE interventionID = '$interventionID'";

    if ($conn->query($sql) === TRUE) {
        $msg = "Intervention deleted successfully";
        header("Location: all-intervention.php?msg=$msg");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();