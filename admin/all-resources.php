<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Resources</title>
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
              <h2>All Resource Center</h2>
              <?php 
              //var_dump($_SESSION['centerID']);
                if(isset($_SESSION['centerID'])) {
              ?>
              <a class=" btn btn-primary" href="add-resources.php">Add New Resource</a>
              <?php } ?>
            </div>
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Resource Type</th>
                      <th>Quentity Needed</th>
                      <th>Request Date</th>
                      <th>Allocation Date</th>
                      <th>Approval Status</th>
                      <th>Intervention</th>
                      <th>Policymacker</th>
                      <th>Agency</th>
                      <?php 
                        if(!isset($_SESSION['userId'])) {
                       ?>
                      <th>Action</th>
                    <?php } ?>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT 
                          resourceallocation_t.*, 
                          `intervention_t`.interventionName, 
                          `policymakers_t`.policymakerName, 
                          `governmentagencies_t`.agencyName
                        FROM
                          governmentagencies_t
                          INNER JOIN
                          resourceallocation_t
                          ON 
                            `governmentagencies_t`.agencyID = `resourceallocation_t`.agencyID
                          INNER JOIN
                          intervention_t
                          ON 
                            `intervention_t`.interventionID = `resourceallocation_t`.interventionID
                          INNER JOIN
                          policymakers_t
                          ON 
                            `policymakers_t`.policymakerID = `resourceallocation_t`.policymakerID";
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
                      <td><?=$row["resourceType"]; ?></td>
                      <td><?=$row["quantityNeeded"]; ?></td>
                      <td><?=$row["requestDate"]; ?></td>
                      <td><?=$row["allocationDate"]; ?></td>
                      <td><?=$row["approvalStatus"]; ?></td>
                      <td><?=$row["interventionName"]; ?></td>
                      <td><?=$row["policymakerName"]; ?></td>
                      <td><?=$row["agencyName"]; ?></td>
                       <?php 
                        if(!isset($_SESSION['userId'])) {
                       ?>
                      <td>
                        <?php 
                          if (isset($_SESSION['policymakerID'])) {
                        ?>
                      <a class="btn btn-primary" href='../admin/change-rec-status.php?recstatusId=<?=$row["resourceID"]; ?>'>Accept</a>

                      <a class="btn btn-danger" href='../admin/change-rec-status.php?recstatusId=<?=$row["resourceID"]; ?>'>Reject</a>
                      <?php }?>
                      <?php 
                          if (isset($_SESSION['centerID'])) {
                        ?>
                        <a class="btn btn-info" href='../admin/edit-resources.php?editId=<?=$row["resourceID"]; ?>'>Edit</a>
                        <button class='delete-btn btn btn-danger' data-id="<?=$row['resourceID'] ?>">Delete</button>
                      <?php } ?>
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
          var resourceID = $(this).data("id");
          if(confirm("Are you sure you want to delete this Resource?")){
              $.ajax({
                  url: 'delete-resources.php',
                  type: 'post',
                  data: {resourceID: resourceID},
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
