<?php 
require_once '../lib/database.php';

if(isset($_GET['editId'])) {
    // Retrieve the statusId from the query string
    $editId = $_GET['editId'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM policymakers_t WHERE policymakerID = ?");
    $stmt->bind_param("s", $editId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data is found for the given editId
    if ($result->num_rows > 0) {
        $policymaker = $result->fetch_assoc(); // Fetch policymaker data
    } else {
        echo "No policymaker found for editId: $editId";
        exit; // Stop further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Policymacker</title>
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
                    <h2>Edit Policymacker</h2>
                    <a class="btn btn-primary" href="policymacker.php">Back</a>
                </div>

                <form action="policymacker-update-processor.php" method="POST">
                    <div class="mb-3">
                        <label for="policymackerName" class="form-label">Policymacker Name</label>
                        <input type="hidden" name="policymakerId" value="<?=$_GET['editId'] ?>">
                        <input type="hidden" name="role" value="policymaker">
                        <input type="text" class="form-control" id="policymackerName" name="policymackerName" value="<?php echo $policymaker['policymakerName']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="policymackerEmail" class="form-label">Policymacker Email</label>
                        <input type="email" class="form-control" id="policymackerEmail" name="policymackerEmail" value="<?php echo $policymaker['policymakerEmail']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="policymackerContact" class="form-label">Policymacker Contact</label>
                        <input type="text" class="form-control" id="policymackerContact" name="policymackerContact" value="<?php echo $policymaker['policymakerContact']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="policymackerGroup" class="form-label">Policymacker Group</label>
                        <select class="form-select" id="policymackerGroup" name="policymackerGroup">
                            <option>Select a Group</option>
                            <option value="Covid Vaccination" <?php if ($policymaker['policymakerGroup'] == "Covid Vaccination") echo "selected"; ?>>Admin</option>
                            <option value="Dengue Prevention Program" <?php if ($policymaker['policymakerGroup'] == "Dengue Prevention Program") echo "selected"; ?>>Dengue Prevention Program</option>
                            <option value="Water and Sanitation Programs" <?php if ($policymaker['policymakerGroup'] == "Water and Sanitation Programs") echo "selected"; ?>>Water and Sanitation Programs</option>
                            <option value="Nutrition Improvement Program" <?php if ($policymaker['policymakerGroup'] == "Nutrition Improvement Program") echo "selected"; ?>>Nutrition Improvement Program</option>
                            <option value="Maternal and Child Healthcare" <?php if ($policymaker['policymakerGroup'] == "Maternal and Child Healthcare") echo "selected"; ?>>Maternal and Child Healthcare</option>
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
