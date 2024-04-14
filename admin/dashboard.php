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
                                <strong>25896</strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Ongoing Intervention</h5>
                                <strong>25896</strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Upcoming Intervention</h5>
                                <strong>25896</strong>
                            </div>
                        </div>
                    </div>      
                </div>

                <div class="container">
                    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                </div>

                <div class="container">
                    <canvas id="myLChart" style="width:100%;max-width:1000px"></canvas>
                </div>
             </div>
        </div>
       </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
const yValues = [55, 49, 44, 24, 15];
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

<?php 
    $xvalues = array();
    $sql = "SELECT diseaseName FROM disease_t"; // Select only the interventionName column to avoid fetching unnecessary data
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $xvalues[] = $row["diseaseName"];
        }
        // Implode the array to create a comma-separated string
        $xLValues = implode('","', $xvalues);

    }  

    $xValuesJSON = json_encode($xvalues);
    
    ?>

<script>
    var xLValues = <?php echo $xValuesJSON; ?>;
    var yLValues = [55, 49, 44, 24, 15];
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