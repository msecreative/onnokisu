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
              <div class="d-flex justify-content-between pb-3">
                <h2>Add New Policymacker</h2>
                <a class=" btn btn-primary" href="all-user.php">All Policymacker</a>
              </div>

              <form action="policymacker-processor.php" method="POST">
                <div class="mb-3">
                  <label for="policymackerName" class="form-label">Policymacker Name</label>
                  <input type="text" class="form-control" id="policymackerName" name="policymackerName">
                </div>

                <div class="mb-3">
                  <label for="policymackerEmail" class="form-label">Policymacker Email</label>
                  <input type="email" class="form-control" id="policymackerEmail" name="policymackerEmail">
                </div>

                <div class="mb-3">
                  <label for="policymackerContact" class="form-label">Policymacker Contact</label>
                  <input type="text" class="form-control" id="policymackerContact" name="policymackerContact">
                </div>

                <div class="mb-3">
                  <label for="policymackerGroup" class="form-label">Policymacker Group</label>
                  <select class="form-select" id="policymackerGroup" name="policymackerGroup">
                    <option>Select a Group</option>
                    <option value="Covid Vaccination">Admin</option>
                    <option value="Dengue Prevention Program">Dengue Prevention Program</option>
                    <option value="Water and Sanitation Programs">Water and Sanitation Programs</option>
                    <option value="Nutrition Improvement Program">Nutrition Improvement Program</option>
                    <option value="Maternal and Child Healthcare">Maternal and Child Healthcare</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="policymackerPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="policymackerPassword" name="policymackerPassword">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>