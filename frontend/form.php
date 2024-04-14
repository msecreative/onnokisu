<?php 
  require_once '../lib/database.php';

  if(isset($_GET['interventionId'])) {
    // Retrieve the recstatusId from the query string
    $interventionId = $_GET['interventionId'];
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/form.css">
    <title>PHITS form</title>
  </head>
  <body>
   <div>
   <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">PHITS</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="navbar.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="card.php">Intervention</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="navbar.php">Contact</a>
					</li>
				</ul>
			</div>
		</div>
</header>
</div>
   <div>
   <section class="container my-5 bg-dark w-100% text-light p-2">
    <form class="row g-3 p-3" action="form-status.php?interventionId=<?=$interventionId ?>" method=POST>
        <div class="col-md-6">
          <input type="hidden" name="interventionId" value="$interventionId">
            <label for="validationDefault01" class="form-label">NID number</label>
            <input type="text" class="form-control" name="nidNumber" id="validationDefault01" value="" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullName" id="validationDefault02" value="" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Nationality</label>
            <input type="text" class="form-control" name="nationality" id="validationDefault02" value="Bangladeshi" required>
          </div>
          <div class="col-md-6">
          <label for="inputState" class="form-label">Gender</label>
          <select id="inputState" name="gender" class="form-select">
            <option selected>Choose...</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
        <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Blood Group</label>
            <input type="text" class="form-control" name="bloodGroup" id="validationDefault02" value="" required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Date Of Birth</label>
            <input type="date" class="form-control" name="dob" id="validationDefault02" value="" required>
          </div>
        
        <div class="col-12">
          <label for="inputAddress2" class="form-label">City</label>
          <input type="text" name="city" class="form-control" id="inputAddress2" placeholder="" value="Dhaka">
        </div>

        <div class="col-6">
          <label for="inputAddress" class="form-label">Area</label>
          <?php 
            $sql = "SELECT * FROM `location_t`";
            $result = $conn->query($sql);
          ?>
          <select name="area" class="form-select area-combo" data-areatype="permanent">
            <option value="">Select a area</option>
            <?php 
            while($row = $result->fetch_assoc()) {
             ?>
             <option value="<?=$row['area']?>"><?=$row["area"]  ?></option>
             <?php } ?>
          </select>
        
        </div>

        <div class="col-6">
          <label for="inputAddress" class="form-label">Center</label>
          <select name="area" class="form-select permanentCenter" id="permanentCenter">
            <option value="">Select a Center</option>
          </select>
        
        </div>
        
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
   </section>
   </div>

   <!--footer-->
	<div class="footer">
         <?php// include('footer.php')?> 
	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/script.js"></script>
  </body>
</html>