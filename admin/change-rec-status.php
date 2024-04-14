<?php 
require_once '../lib/database.php';

// Check if the recstatusId parameter is set in the query string
if(isset($_GET['acceptId'])) {
    // Retrieve the acceptId from the query string
    $acceptId = $_GET['acceptId'];
    // Example query to update the status in the database
    $sql = "UPDATE resourceallocation_t SET approvalStatus = 'APP' WHERE resourceID = $acceptId";

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


// Check if the recstatusId parameter is set in the query string
if(isset($_GET['rejectId'])) {
    // Retrieve the acceptId from the query string
    $rejectId = $_GET['rejectId'];

    // Example query to update the status in the database
    $sql = "UPDATE resourceallocation_t SET approvalStatus = 'REJ' WHERE resourceID = $rejectId";

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


// Check if the recstatusId parameter is set in the query string
if(isset($_GET['alloId'])) {
    // Retrieve the acceptId from the query string
    $alloId = $_GET['alloId'];
    $allocationDate = date('Y-m-d'); // Format the current date as YYYY-MM-DD

    // Example query to update the status in the database
    $sql = "UPDATE resourceallocation_t SET allocationDate = '$allocationDate' WHERE resourceID = $alloId";

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
