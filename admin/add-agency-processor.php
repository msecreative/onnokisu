<?php 
  require_once '../lib/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $agencyName = $_POST['agencyName'];
        $agencyEmail = $_POST['agencyEmail'];
        $agencyContact = $_POST['agencyContact'];
        $area = $_POST['area'];
        $agencyGroup = $_POST['agencyGroup'];
        $password = $_POST['password'];
        $role = "ageny";
        $city = "Dhaka";

        // Get the last policymakerID from the database
        $lastIdQuery = "SELECT agencyID FROM governmentagencies_t ORDER BY agencyID DESC LIMIT 1";
        $result = $conn->query($lastIdQuery);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastId = $row["agencyID"];
            // Extract numeric part and increment by 1
            $numericPart = (int)substr($lastId, 3) + 1;
            // Concatenate with "PM0"
            $newId = "GA0" . str_pad($numericPart, strlen($lastId) - 3, '0', STR_PAD_LEFT);
        } else {
            // If no records exist, start with GA001
            $newId = "GA001";
        }
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO governmentagencies_t (agencyID, agencyName, agencyEmail, agencyContact, city, area, `agencyGroup`,`role`, `password` ) VALUES ('$newId','$agencyName','$agencyEmail','$agencyContact', '$city', '$area','$agencyGroup','$role','$password')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: gov-agencies.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
