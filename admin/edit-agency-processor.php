<?php 
require_once '../lib/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    // Collect form data
    $editId = $_POST['agencyID'];
    $agencyName = $_POST['agencyName'];
    $agencyEmail = $_POST['agencyEmail'];
    $agencyContact = $_POST['agencyContact'];
    $area = $_POST['area'];
    $agencyGroup = $_POST['agencyGroup'];
    $password = $_POST['password'];
    $role = "ageny";
    $city = "Dhaka";

    if ($password) {
       // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE governmentagencies_t SET agencyName=?, agencyEmail=?, agencyContact=?, area=?, agencyGroup=?, `password`=?, `role`=?, `city`=? WHERE agencyID=?");
        $stmt->bind_param("sssssssss", $agencyName, $agencyEmail, $agencyContact, $area, $agencyGroup, $password,$role,$city, $editId);
    }else{
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE governmentagencies_t SET agencyName=?, agencyEmail=?, agencyContact=?, area=?, agencyGroup=?, `role`=?, `city`=? WHERE agencyID=?");
        $stmt->bind_param("ssssssss", $agencyName, $agencyEmail, $agencyContact, $area, $agencyGroup, $role,$city, $editId);
    }

    // Execute the update statement
    if ($stmt->execute()) {
        header("Location: gov-agencies.php");
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