<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
<div id="dashboardMainContainer">
    <?php include('partials/sidebar.php')?>     
     <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/topnav.php')?>
        <div class="dashboard_content">
              <div class="dashboard_content_main">
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Register Populations</h5>
                                <strong>25896</strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Ongoing Intervention</h5>
                                <strong>25896</strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-5 text-center border border-2 rounded-4">
                                <h5 class="text-uppercase">Upcoming Intervention</h5>
                                <strong>25896</strong>
                            </div>
                        </div>
                    </div>      
                </div>
             </div>
        </div>
       </div>
    </div>
</body>
</html>