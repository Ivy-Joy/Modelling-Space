<?php
include 'config.php';

$title = $_GET['title'];
$job_id = $_GET['job_id'];

$job_module = new Job($conn);

if (isset($_POST['apply'])) {
    // get user inputs 
$reason = $_POST['reason'];
$email = $_POST['email'];

    if ($job_module->ApplyJob($job_id, $email, $reason)) {
        echo "<script> alert('Application was successful'); </script>";?>
      <script>  window.location.href = 'companies.php'; </script>
   <?php }else{
        echo "<script> alert('Something went wrong !!'); </script>";
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Job</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-2 shadow">
                <div class="card-header shadow">
                    APPPLY FOR A POSITION IN <?= strtoupper($title); ?>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <p for="email">Email</p>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="reason">Why You ?:</label>
                            <textarea class="form-control" id="reason" name="reason"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-success btn-sm shadow" name="apply">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>