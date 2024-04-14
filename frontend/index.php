<?php 
  require_once '../lib/database.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./assets/styles.css" rel="stylesheet">
</head>

<body>
   
    <div class="container py-5">
        <h1 class="text-center">Ongoing Intervention</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            <?php 
              $sql = "SELECT * FROM `intervention_t`";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // Output data of each row
                $i = 0;
                while($row = $result->fetch_assoc()) {
                $i++;
                //var_dump($row);
            ?>
            <div class="col">
                <div class="card">
                    <img src="./img/intervention2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$row["interventionName"]; ?></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                            dignissimos accusantium amet similique velit iste.</p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                    <a href="form.php?interventionId=<?=$row['interventionID']?>" class="btn btn-primary">Sign up</a>
                    </div>
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
   




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>