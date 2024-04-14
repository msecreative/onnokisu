<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Policymackers</title>
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
              <h2>All Policymackers</h2>
              <a class=" btn btn-primary" href="add-policymacker.php">Add New Policymacker</a>
            </div>
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Policymacker Name</th>
                      <th>Policymacker Email</th>
                      <th>Policymacker Contact</th>
                      <th>Policymacker Group</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM `policymakers_t`";
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
                      <td><?=$row["policymakerName"]; ?></td>
                      <td><?=$row["policymakerEmail"]; ?></td>
                      <td><?=$row["policymakerContact"]; ?></td>
                      <td><?=$row["policymakerGroup"]; ?></td>
                      <td>
                        <a class="btn btn-info" href='../admin/edit-policymaker.php?editId=<?=$row["policymakerID"]; ?>'>Edit</a>
                        <button class='delete-btn btn btn-danger' data-id="<?=$row['policymakerID'] ?>">Delete</button>
                      </td>
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
          var policymakerID = $(this).data("id");
          if(confirm("Are you sure you want to delete this policymaker?")){
              $.ajax({
                  url: 'delete_policymaker.php',
                  type: 'post',
                  data: {policymakerID: policymakerID},
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
