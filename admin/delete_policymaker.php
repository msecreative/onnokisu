<?php 
  require_once '../lib/database.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect policymaker ID from POST data
    $policymakerID = $_POST['policymakerID'];

    // SQL query to delete policymaker
    $sql = "DELETE FROM policymakers_t WHERE policymakerID = '$policymakerID'";

    if ($conn->query($sql) === TRUE) {
        $msg = "Policymaker deleted successfully";
        header("Location: policymacker.php?msg=$msg");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();