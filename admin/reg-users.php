<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">

    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
<div id="dashboardMainContainer">
    <?php include('partials/sidebar.php')?>     
    <div class="dashboard_content_container" id="dashboard_content_container">
      <h2>All Registrations</h2>
        <?php include('partials/topnav.php')?>
        <div class="dashboard_content">
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Nid Number</th>
                      <th>Nationality</th>
                      <th>Gender</th>
                      <th>Blood Group</th>
                      <th>Date Of Birt</th>
                      <th>Location</th>
                      <th>Center</th>
                      <th>date</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT
                          `interventioncentre_t`.centreName, 
                          public_t.*
                        FROM
                        public_t
                          INNER JOIN
                          interventioncentre_t
                          ON 
                            `public_t`.centerID = `interventioncentre_t`.centerID";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // Output data of each row
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?=$row["NIDNumber"]; ?></td>
                      <td><?=$row["FullName"]; ?></td>
                      <td><?=$row["nationality"]; ?></td>
                      <td><?=$row["gender"]; ?></td>
                      <td><?=$row["bloodGroup"]; ?></td>
                      <td><?=$row["dateOfBirth"]; ?></td>
                      <td><?=$row["location"]; ?></td>
                      <td><?=$row["centreName"]; ?></td>
                      <td><?=$row["interventionDate"]; ?></td>
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