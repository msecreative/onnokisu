<?php
require_once '../lib/database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from login form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'admin') {
        // Prepare SQL statement to check if the username and password match
        $sql = "SELECT * FROM users WHERE (username = '$username' OR email = '$username' ) AND password = '$password'";
        $result = $conn->query($sql);
    } elseif ($role == 'policymaker') {
        // Prepare SQL statement to check if the username and password match
        $sql = "SELECT * FROM policymakers_t WHERE policymakerEmail = '$username' AND policymakerPassword = '$password'";
        $result = $conn->query($sql);
    } elseif ($role == 'intervention') {
        $sql = "SELECT * FROM interventioncentre_t WHERE centreEmail = '$username' AND password = '$password'";
        $result = $conn->query($sql);
    }elseif ($role == 'ageny') {
        $sql = "SELECT * FROM governmentagencies_t WHERE agencyEmail = '$username' AND password = '$password'";
        $result = $conn->query($sql);
    }

    // Check if there's a match
    if ($result->num_rows > 0) {
        // User found, login successful
        $user = $result->fetch_assoc();

        // Start session
        session_start();

        // Store user ID in session
        $_SESSION['userId'] = $user['userId'];
        $_SESSION['centerID'] = $user['centerID'];
        $_SESSION['policymakerID'] = $user['policymakerID'];
        $_SESSION['agencyID'] = $user['agencyID'];

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // No match found, login failed
        echo "Invalid username or password";
    }
}
?>





<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../admin/assets/style.css" rel="stylesheet" >
        <title>Login Form</title>
    </head>
    <body>
        <div class="container-fluid">
            <form class="mx-auto" method="POST">
                <h4 class="text-center">Login</h4>
                <div class="mb-3 mt-5">
                  <label for="role" class="form-label">Login As</label>
                  <select id="role" class="form-select" name="role">
                      <option>Select Role</option>
                      <option value="admin">Admin</option>
                      <option value="policymaker">Policymaker</option>
                      <option value="intervention">Intervention Center</option>
                      <option value="ageny">Govt Ageny</option>
                  </select>
                </div>

                <div class="mb-3 mt-5">
                  <label for="username" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                  <div id="emailHelp" class="form-text mt-3">Forget password ?</div>
                </div>
              
                <button type="submit" class="btn btn-primary mt-5">Login</button>
              </form>
        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>