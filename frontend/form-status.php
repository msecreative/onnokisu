<?php 
require_once '../lib/database.php';

if(isset($_GET['interventionId'])) {
    // Retrieve the recstatusId from the query string
    $interventionId = $_GET['interventionId'];
    //var_dump($interventionId);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nidNumber = $_POST['nidNumber'];
    $fullName = $_POST['fullName'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $bloodGroup = $_POST['bloodGroup'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $centerID = $_POST['centerID'];
    $area = $_POST['area'];
    $centerType = $_POST['centerType'];
    $interventionDate = date('Y-m-d');
    $interventionMonth = date('F');
    $interventionYear = date('Y');

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO public_t (NIDNumber, FullName, nationality, gender, bloodGroup, dateOfBirth, `location`, centerID, area, `type`, interventionID, interventionDate, interventionMonth, interventionYear ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $nidNumber, $fullName, $nationality, $gender, $bloodGroup, $dob, $city, $centerID, $area, $centerType, $interventionId, $interventionDate, $interventionMonth, $interventionYear);

    // Execute the statement
    $stmt->execute();

    // Check for errors
    if($stmt === false) {
        // Handle the error
        // Log or display an error message
    }

    // Close the connection
    $stmt->close();

    // Update population count
    $ustmt = $conn->prepare("SELECT centerID, population_count FROM `teststat` WHERE `month` = ?");
    $ustmt->bind_param("s", $interventionMonth);
    $ustmt->execute();
    $allstats = $ustmt->get_result();

    if($allstats !== false) {
        $row = $allstats->fetch_assoc();
        if($row) {
            $restPopulation = $row['population_count'] + 1;
            $sql = "UPDATE teststat SET population_count = '$restPopulation' WHERE centerID = '$centerID'";
            $conn->query($sql);
        } else {
            // No stats found, insert new record
            $population_count = 1;
            $stmt = $conn->prepare("INSERT INTO teststat (centerID, interventionD, `month`, `year`, population_count ) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $centerID, $interventionD, $interventionMonth, $interventionYear, $population_count);
            $stmt->execute();
            $stmt->close();
        }
    }

    $conn->close();
    header("Location: index.php?msg=success");
}
?>
