<?php 
  require_once '../lib/database.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect policymaker ID from POST data
    $resourceID = $_POST['resourceID'];
    var_dump($resourceID);

    // SQL query to delete policymaker
    $sql = "DELETE FROM resourceallocation_t WHERE resourceID = '$resourceID'";

    if ($conn->query($sql) === TRUE) {
        $msg = "Resource deleted successfully";
        header("Location: all-resources.php?msg=$msg");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();