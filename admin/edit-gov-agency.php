<?php 
require_once '../lib/database.php';

if(isset($_GET['editId'])) {
    // Retrieve the statusId from the query string
    $editId = $_GET['editId'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM governmentagencies_t WHERE agencyID = ?");
    $stmt->bind_param("s", $editId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is found for the given editId
    if ($result->num_rows > 0) {
        $agency = $result->fetch_assoc(); // Fetch agency data
    } else {
        echo "No agency found for editId: $editId";
        exit; // Stop further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agency</title>
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
                <h2>Edit Agency</h2>
                <a class=" btn btn-primary" href="gov-agencies.php">All Agency</a>
              </div>

              <form action="edit-agency-processor.php" method="POST">
                <div class="mb-3">
                  <label for="agencyName" class="form-label">Agency Name</label>
                  <input type="hidden" name="agencyID" value="<?=$_GET['editId'] ?>">
                  <input type="text" class="form-control" id="agencyName" name="agencyName" value="<?php echo $agency['agencyName']; ?>">
                </div>

                <div class="mb-3">
                  <label for="agencyEmail" class="form-label">Agency Email</label>
                  <input type="email" class="form-control" id="agencyEmail" name="agencyEmail" value="<?php echo $agency['agencyEmail']; ?>">
                </div>

                <div class="mb-3">
                  <label for="agencyContact" class="form-label">Agency Contact</label>
                  <input type="text" class="form-control" id="agencyContact" name="agencyContact" value="<?php echo $agency['agencyContact']; ?>">
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
                      <option <?php if ($agency['area'] == $row['area']) echo "selected"; ?> value="<?=$row['area']?>"><?=$row['area']?></option>
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
                      <option <?php if ($agency['agencyGroup'] == $row['interventionName']) echo "selected"; ?> value="<?=$row['interventionName']?>"><?=$row['interventionName']?></option>
                    <?php }  ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Change Agency password</label>
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