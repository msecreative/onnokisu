<?php 
  require_once '../lib/database.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect policymaker ID from POST data
    $agencyID = $_POST['agencyID'];

    // SQL query to delete policymaker
    $sql = "DELETE FROM governmentagencies_t WHERE agencyID = '$agencyID'";

    if ($conn->query($sql) === TRUE) {
        $msg = "Govt Agency deleted successfully";
        header("Location: gov-agencies.php?msg=$msg");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();