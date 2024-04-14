<?php 
require_once '../lib/database.php';

if(isset($_GET['editId'])) {
    // Retrieve the statusId from the query string
    $editId = $_GET['editId'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM resourceallocation_t WHERE resourceID = ?");
    $stmt->bind_param("s", $editId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is found for the given editId
    if ($result->num_rows > 0) {
        $resource = $result->fetch_assoc(); // Fetch intervention data
    } else {
        echo "No intervention found for editId: $editId";
        exit; // Stop further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resources</title>
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
                    <h2>Edit Resources</h2>
                    <a class="btn btn-primary" href="all-resources.php">Back</a>
                </div>

                <form action="edit-resources-processor.php" method="POST">
                <div class="mb-3">
                  <label for="resourceType" class="form-label">Resource Type</label>
                  <input type="hidden" name="resourceId" value="<?=$_GET['editId'] ?>">
                  <input type="text" class="form-control" id="resourceType" name="resourceType" value="<?php echo $resource['resourceType']; ?>">
                </div>

                <div class="mb-3">
                  <label for="quantityNeeded" class="form-label">Quantity Needed</label>
                  <input type="text" class="form-control" id="quantityNeeded" name="quantityNeeded" value="<?php echo $resource['quantityNeeded']; ?>">
                </div>

                <div class="mb-3">
                  <label for="requestDate" class="form-label">Request Date</label>
                  <input type="date" class="form-control" id="requestDate" name="requestDate" value="<?php echo $resource['requestDate']; ?>">
                </div>
                <div class="mb-3">
                  <label for="interventionID" class="form-label">Intervention Name</label>
                  <select name="interventionID" id="interventionID" class="form-select">
                    <option value="">Select a intervention</option>
                    <?php 
                        $sql = "SELECT * FROM `intervention_t`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                    ?>
                    <option <?php if ($resource['interventionID'] == $row['interventionID']) echo "selected"; ?>  value="<?=$row['interventionID']?> "><?=$row['interventionName']?></option>
                    <?php } } ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="policymakerID" class="form-label">Policymaker Name</label>
                  <select name="policymakerID" id="policymakerID" class="form-select">
                    <option value="">Select a policymaker</option>
                    <?php 
                        $sql = "SELECT * FROM `policymakers_t`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                    ?>
                    <option <?php if ($resource['policymakerID'] == $row['policymakerID']) echo "selected"; ?> value="<?=$row['policymakerID']?> "><?=$row['policymakerName']?></option>
                    <?php } } ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="agencyID" class="form-label">Govt Agency Name</label>
                  <select name="agencyID" id="agencyID" class="form-select">
                    <option value="">Select a agency</option>
                    <?php 
                        $sql = "SELECT * FROM `governmentagencies_t`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                    ?>
                    <option <?php if ($resource['agencyID'] == $row['agencyID']) echo "selected"; ?> value="<?=$row['agencyID']?> "><?=$row['agencyName']?></option>
                    <?php } } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
