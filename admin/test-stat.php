<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-Stat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">

    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
<div id="dashboardMainContainer">
    <?php include('partials/sidebar.php')?>     
    <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/topnav.php')?>
        <div class="dashboard_content">
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Center Name</th>
                      <th>Disease Name</th>
                      <th>Month</th>
                      <th>Year</th>
                      <th>Population Count</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT
                          teststat.*, 
                          `disease_t`.diseaseName, 
                          `interventioncentre_t`.centreName
                        FROM
                          interventioncentre_t
                          INNER JOIN
                          teststat
                          ON 
                            `interventioncentre_t`.centerID = `teststat`.centerID
                          INNER JOIN
                          disease_t
                          ON 
                            `disease_t`.diseaseID = `teststat`.diseaseID";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // Output data of each row
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?=$row["centreName"]; ?></td>
                      <td><?=$row["diseaseName"]; ?></td>
                      <td><?=$row["month"]; ?></td>
                      <td><?=$row["year"]; ?></td>
                      <td><?=$row["population_count"]; ?></td>
                     
                    </tr>
                    <?php  
                    }
                  } else {
                      echo "0 results";
                  }
                    
                 ?>
                  
              </tbody>
            </table>
        </div>
       </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>