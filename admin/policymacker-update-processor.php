<?php 
require_once '../lib/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    // Collect form data
    $name = $_POST['policymackerName'];
    $email = $_POST['policymackerEmail'];
    $contact = $_POST['policymackerContact'];
    $group = $_POST['policymackerGroup'];
    $password = $_POST['policymackerPassword'];
    $editId = $_POST['policymakerId'];
    $role = "policymaker";

    if ($password) {
       // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE policymakers_t SET policymakerName=?, policymakerEmail=?, policymakerContact=?, policymakerGroup=?, role=?, password=? WHERE policymakerID=?");
        $stmt->bind_param("sssssss", $name, $email, $contact, $group, $role, $password, $editId);
    }else{
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE policymakers_t SET policymakerName=?, policymakerEmail=?, policymakerContact=?, policymakerGroup=?, role=? WHERE policymakerID=?");
        $stmt->bind_param("ssssss", $name, $email, $contact, $group, $role, $editId);
    }

    // // Use prepared statement to prevent SQL injection
    // $stmt = $conn->prepare("UPDATE policymakers_t SET policymakerName=?, policymakerEmail=?, policymakerContact=?, policymakerGroup=?, password=? WHERE policymakerID=?");
    // $stmt->bind_param("ssssss", $name, $email, $contact, $group, $password, $editId);

    // Execute the update statement
    if ($stmt->execute()) {
        header("Location: policymacker.php");
        // Redirect to a confirmation page or back to the list of policymakers
        // header("Location: confirmation.php");
        exit;
    } else {
        echo "Error updating policymaker: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>