<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Intervention</title>
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
              <h2>All Interventions</h2>
              <?php 
                if(isset($_SESSION['centerID'])) {
              ?>
              <a class=" btn btn-primary" href="add-intervention.php">Add New Intervention</a>
              <?php } ?>
            </div>
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Intervention Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Target Population</th>
                       <?php 
                        if(isset($_SESSION['centerID'])) {
                       ?>
                      <th>Actions</th>
                    <?php } ?>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM `intervention_t`";
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
                      <td><?=$row["interventionName"]; ?></td>
                      <td><?=$row["startDate"]; ?></td>
                      <td><?=$row["endDate"]; ?></td>
                      <td><?=$row["targetPopulation"]; ?></td>
                       <?php 
                        if(isset($_SESSION['centerID'])) {
                       ?>
                      <td>
                        <a class="btn btn-info" href='../admin/edit-intervention.php?editId=<?=$row["interventionID"]; ?>'>Edit</a>
                        <button class='delete-btn btn btn-danger' data-id="<?=$row['interventionID'] ?>">Delete</button>
                      </td>
                    <?php } ?>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){
      $(".delete-btn").click(function(){
          var interventionID = $(this).data("id");
          if(confirm("Are you sure you want to delete this intervention?")){
              $.ajax({
                  url: 'delete-intervention.php',
                  type: 'post',
                  data: {interventionID: interventionID},
                  success:function(response){
                      // Refresh the page or update the UI as needed
                      location.reload();
                  }
              });
          }
      });
  });
    </script>
</body>
</html>
