<?php 
  require_once '../lib/database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $interventionName = $_POST['interventionName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $targetPopulation = $_POST['targetPopulation'];

        // Get the last policymakerID from the database
        $lastIdQuery = "SELECT interventionID FROM intervention_t ORDER BY interventionID DESC LIMIT 1";
        $result = $conn->query($lastIdQuery);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastId = $row["interventionID"];
            // Extract numeric part and increment by 1
            $numericPart = (int)substr($lastId, 3) + 1;
            // Concatenate with "PM0"
            $newId = "IN0" . str_pad($numericPart, strlen($lastId) - 3, '0', STR_PAD_LEFT);
        } else {
            // If no records exist, start with IN001
            $newId = "IN001";
        }
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO intervention_t (interventionName, startDate, endDate, targetPopulation, interventionID) VALUES ('$interventionName','$startDate','$endDate', '$targetPopulation', '$newId')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: all-intervention.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
