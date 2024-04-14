<?php 
  require_once '../lib/database.php';
// Check if the statusId parameter is set in the query string
if(isset($_GET['statusId'])) {
    // Retrieve the statusId from the query string
    $statusId = $_GET['statusId'];

    // Example query to update the status in the database
    $sql = "UPDATE public_t SET status = 'Done' WHERE NIDNumber = $statusId";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        header("Location: reg-users.php");
    } else {
        header("Location: reg-users.php");
    }

    // Close the database connection
    $conn->close();
} else {
    // If statusId parameter is not set in the query string
    echo "StatusId not provided";
}
?>
