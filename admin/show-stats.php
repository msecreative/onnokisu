<?php 
require_once '../lib/database.php';

if(isset($_GET['editId'])) {
    // Retrieve the statusId from the query string
    $editId = $_GET['editId'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM teststat WHERE centerID = ?");
    $stmt->bind_param("s", $editId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is found for the given editId
    if ($result->num_rows > 0) {
        $stats = $result->fetch_assoc(); // Fetch agency data
    } else {
        echo "No agency found for editId: $editId";
        exit; // Stop further execution
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Stats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
<div id="dashboardMainContainer">
    <?php include('partials/sidebar.php')?>     
     <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/topnav.php')?>
        <div class="dashboard_content">
              <div class="dashboard_content_main">

                <div class="container">
                    <canvas id="myLChart" style="width:100%;max-width:1000px"></canvas>
                </div>
             </div>
        </div>
       </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php 
    $xvalues = array();
    $yLValues = array();
    $sql = "SELECT * FROM teststat"; // Select only the interventionName column to avoid fetching unnecessary data
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $xvalues[] = $row["month"];
            $yLValues[] = $row["population_count"];
        }
        // Implode the array to create a comma-separated string
        $xLValues = implode('","', $xvalues);
        //$yLValues = implode(',', $yLValues);

    }  

    $xValuesJSON = json_encode($xvalues);
    $xYValuesJSON = json_encode($yLValues);
    var_dump($xYValuesJSON);
    
    ?>

<script>
    var xLValues = <?php echo $xValuesJSON; ?>;
    var yLValues = <?php echo $xYValuesJSON; ?>;
    var barLColors = ["red", "green","blue","orange","brown"];

new Chart("myLChart", {
  type: "bar",
  data: {
    labels: xLValues,
    datasets: [{
      backgroundColor: barLColors,
      data: yLValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Intervention Progress"
    }
  }
});
</script>
</body>
</html>