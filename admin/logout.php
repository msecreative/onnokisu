<?php
// Start the session
session_start();

// Check if the user is logged in
if(isset($_SESSION['userId'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}elseif(isset($_SESSION['centerID'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}if(isset($_SESSION['policymakerID'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}if(isset($_SESSION['agencyID'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Redirect the user to the login page or any other desired page
header("Location: index.php");
exit;
?>