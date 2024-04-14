<?php
require_once '../lib/database.php';

// Check if center parameter is set in the GET request
if (isset($_GET["center"])) {
    $center = $_GET["center"];

    // Prepare SQL statement using a prepared statement
    $sql = "SELECT * FROM interventioncentre_t WHERE area = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $center);
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Fetch data from result set and store in an array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'centreName' => $row['centreName'],
            'centerID' => $row['centerID']
        ];
    }

    // Close prepared statement
    $stmt->close();

    // Close database connection
    $conn->close();

    // Encode data as JSON
    $response = [
        "issuccess" => true,
        "data" => $data
    ];

    // Send JSON response
    echo json_encode($response);
    exit;
} else {
    // If center parameter is not set, send an error response
    echo json_encode(["issuccess" => false, "error" => "Center parameter not provided"]);
    exit;
}
?>
