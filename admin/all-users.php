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
                <h2>All Users</h2>
                <a class=" btn btn-primary" href="add-user.php">Add User</a>
              </div>

              <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>User Name</th>
                      <th>Role</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sql = "SELECT * FROM users";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // Output data of each row
                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                    $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?=$row["name"]; ?></td>
                      <td><?=$row["username"]; ?></td>
                      <td><?=$row["role"]; ?></td>
                      <td>
                        <a href='../admin/delete-user.php?statusId=<?=$row["userId"]; ?>'>Delete</a>
                        <a href='../admin/update-user.php?statusId=<?=$row["userId"]; ?>'>Update</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>