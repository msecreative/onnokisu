<?php 
  require_once '../lib/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = $_POST['policymackerName'];
        $email = $_POST['policymackerEmail'];
        $contact = $_POST['policymackerContact'];
        $group = $_POST['policymackerGroup'];
        $password = $_POST['policymackerPassword']; // Note: It's highly recommended to hash passwords before storing them in the database for security reasons
        $role = "policymaker";

        // Get the last policymakerID from the database
        $lastIdQuery = "SELECT policymakerID FROM policymakers_t ORDER BY policymakerID DESC LIMIT 1";
        $result = $conn->query($lastIdQuery);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastId = $row["policymakerID"];
            // Extract numeric part and increment by 1
            $numericPart = (int)substr($lastId, 3) + 1;
            // Concatenate with "PM0"
            $newId = "PM0" . str_pad($numericPart, strlen($lastId) - 3, '0', STR_PAD_LEFT);
        } else {
            // If no records exist, start with PM001
            $newId = "PM001";
        }
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO policymakers_t (role, policymakerID, policymakerName, policymakerEmail, policymakerContact, policymakerGroup, policymakerPassword) VALUES ('$role','$newId','$name', '$email', '$contact', '$group', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: policymacker.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
