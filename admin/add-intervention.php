<?php 
  //require_once '../../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Intervention</title>
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
              <div class="d-flex justify-content-between pb-3">
                <h2>Add New Intervention</h2>
                <a class=" btn btn-primary" href="all-intervention.php">All Intervention</a>
              </div>

              <form action="add-intervention-processor.php" method="POST">
                <div class="mb-3">
                  <label for="interventionName" class="form-label">Intervention Name</label>
                  <input type="text" class="form-control" id="interventionName" name="interventionName">
                </div>

                <div class="mb-3">
                  <label for="startDate" class="form-label">Intervention Start Date</label>
                  <input type="date" class="form-control" id="startDate" name="startDate">
                </div>

                <div class="mb-3">
                  <label for="endDate" class="form-label">Intervention End Date</label>
                  <input type="date" class="form-control" id="endDate" name="endDate">
                </div>
                <div class="mb-3">
                  <label for="targetPopulation" class="form-label">Target Population</label>
                  <input type="text" class="form-control" id="targetPopulation" name="targetPopulation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>