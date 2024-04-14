<?php 
  require_once '../lib/database.php';

  if(isset($_GET['interventionId'])) {
    // Retrieve the recstatusId from the query string
    $interventionId = $_GET['interventionId'];
    //var_dump($interventionId);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $interventionId = $_POST['interventionId'];
    $nidNumber = $_POST['nidNumber'];
    $fullName = $_POST['fullName'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $bloodGroup = $_POST['bloodGroup'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $area = $_POST['area'];


    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO public_t (NIDNumber, FullName, nationality, gender, bloodGroup, dateOfBirth, locationID, centerID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nidNumber, $fullName, $nationality, $gender, $bloodGroup, $dob, $city, $area);

    // Execute the statement
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();
    header("Location: form.php?msg=success");

  }

  

  var_dump($_POST);
?>