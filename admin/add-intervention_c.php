<?php 
  //require_once '../../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Center</title>
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
                <h2>Add New Center</h2>
                <a class=" btn btn-primary" href="intervention-centers.php">All Centers</a>
              </div>

              <form action="add-intervention_c-processor.php" method="POST">
                <div class="mb-3">
                  <label for="centreName" class="form-label">Center Name</label>
                  <input type="text" class="form-control" id="centreName" name="centreName">
                </div>
                <div class="mb-3">
                  <label for="centreEmail" class="form-label">Center Email</label>
                  <input type="email" class="form-control" id="centreEmail" name="centreEmail">
                </div>

                <div class="mb-3">
                  <label for="centreContact" class="form-label">Center Contact</label>
                  <input type="text" class="form-control" id="centreContact" name="centreContact">
                </div>

                <div class="mb-3">
                  <label for="centreType" class="form-label">Center Type</label>
                  <select name="centreType" id="centreType" class="form-select">
                    <option value="">Select a Type</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Government Booth">Government Booth</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="area" class="form-label">Area</label>
                  <input type="text" class="form-control" id="area" name="area">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Center Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>