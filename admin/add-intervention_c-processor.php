<?php 
  require_once '../lib/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $centreName = $_POST['centreName'];
        $centreEmail = $_POST['centreEmail'];
        $centreContact = $_POST['centreContact'];
        $centreType = $_POST['centreType'];
        $area = $_POST['area'];
        $password = $_POST['password']; // Note: It's highly recommended to hash passwords before storing them in the database for security reasons
        $role = "intervention";

        // Get the last policymakerID from the database
        $lastIdQuery = "SELECT centerID FROM interventioncentre_t ORDER BY centerID DESC LIMIT 1";
        $result = $conn->query($lastIdQuery);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastId = $row["centerID"];
            // Extract numeric part and increment by 1
            $numericPart = (int)substr($lastId, 3) + 1;
            // Concatenate with "PM0"
            $newId = "IC0" . str_pad($numericPart, strlen($lastId) - 3, '0', STR_PAD_LEFT);
        } else {
            // If no records exist, start with IC001
            $newId = "IC001";
        }
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO interventioncentre_t (role, centerID, centreName, centreEmail, centreContact, centreType, area,`password`) VALUES ('$role','$newId','$centreName', '$centreEmail', '$centreContact', '$centreType', '$area', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: intervention-centers.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
