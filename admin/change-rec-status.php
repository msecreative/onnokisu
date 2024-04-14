<?php 
require_once '../lib/database.php';

// Check if the recstatusId parameter is set in the query string
if(isset($_GET['recstatusId'])) {
    // Retrieve the recstatusId from the query string
    $recstatusId = $_GET['recstatusId'];
    $allocationDate = date('Y-m-d'); // Format the current date as YYYY-MM-DD

    // Example query to update the status in the database
    $sql = "UPDATE resourceallocation_t SET approvalStatus = 'APP', allocationDate = '$allocationDate' WHERE resourceID = $recstatusId";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the desired page
        header("Location: all-resources.php");
        exit(); // Stop further execution
    } else {
        echo "Error executing query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If recstatusId parameter is not set in the query string
    echo "recstatusId not provided";
}
?>
