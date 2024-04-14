<?php
require_once '../lib/database.php';
// Start session to access session variables
session_start();

// Check if the user ID is set in the session
if(isset($_SESSION['userId'])) {
    // Retrieve the user ID from the session
    $userId = $_SESSION['userId'];
    // Fetch data for all users
    $ustmt = $conn->prepare("SELECT * FROM `users` WHERE userId = ?");
    $ustmt->bind_param("s", $userId);
    $ustmt->execute();
    $allUsersResult = $ustmt->get_result();

    // Check for errors
    if($allUsersResult === false) {
        // Handle the error
        die("Error executing query: " . $ustmt->error);
    }

    $allUsers = $allUsersResult->fetch_all(MYSQLI_ASSOC)[0];
    //var_dump($allUsers);

    // You can now use $userId and other fetched data in your code
    //echo "User ID: $userId";
}elseif (isset($_SESSION['centerID'])) {
    $centerID = $_SESSION['centerID'];
    // Fetch data for all intervention centers
    $istmt = $conn->prepare("SELECT * FROM `interventioncentre_t` WHERE centerID = ?");
    $istmt->bind_param("s", $centerID);
    $istmt->execute();
    $allInterventionResult = $istmt->get_result();

    // Check for errors
    if($allInterventionResult === false) {
        // Handle the error
        die("Error executing query: " . $istmt->error);
    }

    $allIntervention = $allInterventionResult->fetch_all(MYSQLI_ASSOC)[0];

}elseif (isset($_SESSION['policymakerID'])) {
   $policymakerID = $_SESSION['policymakerID'];
    // Fetch data for all policymakers
    $pstmt = $conn->prepare("SELECT * FROM `policymakers_t` WHERE policymakerID = ?");
    $pstmt->bind_param("s", $policymakerID);
    $pstmt->execute();
    $allPolicymakersResult = $pstmt->get_result();

    // Check for errors
    if($allPolicymakersResult === false) {
        // Handle the error
        die("Error executing query: " . $pstmt->error);
    }

    $allPolicymakers = $allPolicymakersResult->fetch_all(MYSQLI_ASSOC)[0];
}elseif (isset($_SESSION['agencyID'])) {
   $agencyID = $_SESSION['agencyID'];
    // Fetch data for all policymakers
    $pstmt = $conn->prepare("SELECT * FROM `governmentagencies_t` WHERE agencyID = ?");
    $pstmt->bind_param("s", $agencyID);
    $pstmt->execute();
    $allAgenciesResult = $pstmt->get_result();

    // Check for errors
    if($allAgenciesResult === false) {
        // Handle the error
        die("Error executing query: " . $pstmt->error);
    }

    $allAgencies = $allAgenciesResult->fetch_all(MYSQLI_ASSOC)[0];
} else {
    // If the user ID is not set in the session, it means the user is not logged in
    // Redirect the user to the login page or display an error message
    header("Location: index.php");
    exit(); // Ensure script execution stops after redirection
}

//var_dump($allPolicymakers);

?>

<div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">IMS</h3>
             <div class="dashboard_sidebar_user" >
              <img src="userimage.jpg" alt="User image."  id="userimage">
              <?php 
                    $userName = "";
                    $role = "";

                    if (isset($allUsers["name"])) {

                        $userName = $allUsers["name"];
                        $role = $allUsers["role"];

                    }elseif (isset($allPolicymakers["policymakerName"])) {

                       $userName =$allPolicymakers["policymakerName"];
                       $role =$allPolicymakers["role"];

                    }elseif (isset($allIntervention["centreName"])) {

                       $userName =$allIntervention["centreName"];
                       //var_dump($userName);
                       $role =$allIntervention["role"];
                    }elseif (isset($allAgencies["agencyName"])) {

                        $userName =$allAgencies["agencyName"];
                        //var_dump($userName);
                        $role = "Govt Agency";
                     }
                ?>   
              <span>
                <?=$userName;?>
                   
               </span>
               <span>
                   <?=$role;?>
               </span> 
                
            </div>
            <div class="dashboard_sidebar_menus">
                
                <ul class="dashboard_menus_lists" >
                    <!--menuActive -->
                    <li >
                        <a href="./dashboard.php" ><i class="fa fa-dashboard"></i><span class="menuText">Dashboard</span></a>
                    </li>
                    <?php 

                        if (!isset($_SESSION['userId'])) {

                        ?>
                    <li>
                        <a href="test-stat.php" ><i class="fa fa-user-plus"></i><span class="menuText">Test Stat</span></a>
                    </li>

                    <?php } ?>


                    <?php 

                    if ((isset($allUsers['role']) && $allUsers['role'] == 'admin')) {

                    ?>

                    <li >
                        <a href="reg-users.php" ><i class="fa fa-user-plus"></i><span class="menuText">All Registrations</span></a>
                    </li>
                    
                    <?php 
                        
                    }
                        if ((isset($allUsers['role']) && $allUsers['role'] == 'admin') || (isset($allIntervention['role']) && $allIntervention['role'] == 'intervention') || (isset($allPolicymakers['role']) && $allPolicymakers['role'] == 'policymaker') || (isset($allAgencies['role']) && $allAgencies['role'] == 'ageny')) {
                     ?>
                    <li>
                        <a href="all-resources.php" ><i class="fa fa-user-plus"></i><span class="menuText">All Resources</span></a>
                    </li>

                    <li>
                        <a href="all-intervention.php" ><i class="fa fa-user-plus"></i><span class="menuText">All Intervention</span></a>
                    </li>
                    <li>
                       <a href="intervention-centers.php" ><i class="fa fa-user-plus"></i><span class="menuText">Intervention Centers</span></a> 
                    </li>

                    <li>
                       <a href="gov-agencies.php" ><i class="fa fa-user-plus"></i><span class="menuText">Govt Agencies</span></a> 
                    </li>


                    <?php 

                    }
                        if ((isset($allUsers['role']) && $allUsers['role'] == 'admin') || (isset($allPolicymakers['role']) && $allPolicymakers['role'] == 'policymaker')) {
                     ?>

                    <li>
                        <a href="policymacker.php" ><i class="fa fa-user-plus"></i><span class="menuText">All Policymackers</span></a>
                    </li>

                    <?php 

                    }
                        if ((isset($allUsers['role']) && $allUsers['role'] == 'admin')) {
                     ?>




                     <li>
                         <a href="all-users.php" ><i class="fa fa-user-plus"></i><span class="menuText">All Users</span></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>