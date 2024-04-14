<?php 
  //require_once '../../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Agency</title>
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
                <h2>Add New Agency</h2>
                <a class=" btn btn-primary" href="gov-agencies.php">All Agency</a>
              </div>

              <form action="add-agency-processor.php" method="POST">
                <div class="mb-3">
                  <label for="agencyName" class="form-label">Agency Name</label>
                  <input type="text" class="form-control" id="agencyName" name="agencyName">
                </div>

                <div class="mb-3">
                  <label for="agencyEmail" class="form-label">Agency Email</label>
                  <input type="email" class="form-control" id="agencyEmail" name="agencyEmail">
                </div>

                <div class="mb-3">
                  <label for="agencyContact" class="form-label">Agency Contact</label>
                  <input type="text" class="form-control" id="agencyContact" name="agencyContact">
                </div>
                <div class="mb-3">
                  <label for="area" class="form-label">Area</label>
                  <select name="area" id="area" class="form-select">
                    <option value="">Select a area</option>
                    <?php 
                      $sql = "SELECT * FROM `location_t`";
                      $result = $conn->query($sql);
                      while($row = $result->fetch_assoc()) {
                    ?>
                      <option value="<?=$row['area']?>"><?=$row['area']?></option>
                    <?php }  ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="agencyGroup" class="form-label">Agency Group</label>
                  <select name="agencyGroup" id="agencyGroup" class="form-select">
                    <option value="">Select a group</option>
                    <?php 
                      $sql = "SELECT * FROM `intervention_t`";
                      $result = $conn->query($sql);
                      while($row = $result->fetch_assoc()) {
                    ?>
                      <option value="<?=$row['interventionName']?>"><?=$row['interventionName']?></option>
                    <?php }  ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Agency password</label>
                  <input type="text" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>