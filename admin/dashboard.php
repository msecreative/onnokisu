<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <div class="row pt-5">
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Register Populations</h5>
                                <?php 
                                  $sql = "SELECT COUNT(NIDNumber) AS total_count
                                  FROM public_t";
                                  $result = $conn->query($sql);
                                  //var_dump($result);
                                  if ($result) {
                                    // Fetch associative array of the result
                                    $row = $result->fetch_assoc();
                                    
                                    // Access the total count value
                                    $total_count = $row['total_count'];
                                ?>
                                <strong><?=$total_count; ?></strong>
                                <?php } ?>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Ongoing Intervention</h5>
                                <?php 
                                  $sql = "SELECT COUNT(interventionID) AS total_count
                                  FROM intervention_t";
                                  $result = $conn->query($sql);
                                  //var_dump($result);
                                  if ($result) {
                                    // Fetch associative array of the result
                                    $row = $result->fetch_assoc();
                                    
                                    // Access the total count value
                                    $total_count = $row['total_count'];
                                ?>
                                <strong><?=$total_count?></strong>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Upcoming Intervention</h5>
                                <strong>0</strong>
                            </div>
                        </div>
                    </div>      
                </div>

                <div class="container">
                    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                </div>
             </div>
        </div>
       </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <?php 
    $xValues = array();
    $yValues = array();
    $sql = "SELECT DISTINCT area FROM public_t"; // Select only the interventionName column to avoid fetching unnecessary data
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $xValues[] = $row["area"];
            $ddarea= $row["area"];
            $sql = "SELECT area, COUNT(area) AS total_count
            FROM public_t
            WHERE area = '$ddarea'
            GROUP BY area"; // Select only the interventionName column to avoid fetching unnecessary data
            $results = $conn->query($sql);
            if ($results->num_rows > 0) {
              while ($rows = $results->fetch_assoc()) {
                $yValues[] = $rows['total_count'];
                var_dump($yValues);
            }
          }

        }
        // Implode the array to create a comma-separated string
        $xLValues = implode('","', $xValues);

    }  

    $xValuesJSON = json_encode($xValues);
    $xValuesJSON = json_encode($yValues);
    
    ?>

    <script>
const xValues = <?php echo $xValuesJSON; ?>;
const yValues = <?php echo $xValuesJSON; ?>;
const barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Intervention Reachability"
    }
  }
});
</script>


</body>
</html>