<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govt Agencies</title>
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
              <h2>All Agency</h2>
              <a class=" btn btn-primary" href="add-agency.php">Add New Govt Agency</a>
            </div>
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Agency Name</th>
                      <th>Agency Email</th>
                      <th>Agency Contact</th>
                      <th>City</th>
                      <th>Area</th>
                      <th>Agency Group</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM `governmentagencies_t`";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // Output data of each row
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                    $i++;
                    //var_dump($row);
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?=$row["agencyName"]; ?></td>
                      <td><?=$row["agencyEmail"]; ?></td>
                      <td><?=$row["agencyContact"]; ?></td>
                      <td><?=$row["city"]; ?></td>
                      <td><?=$row["area"]; ?></td>
                      <td><?=$row["agencyGroup"]; ?></td>
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

<?php 
    if(isset($_GET['statusId'])) {
    // Retrieve the statusId from the query string
    $statusId = $_GET['statusId'];
    echo $statusId;
  }
 ?>