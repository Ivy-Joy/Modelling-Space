<?php
include('config.php');


$user_id = '';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
$user_model = new User($conn);

$user = $user_model->GetFilteredUsers('id', $user_id, 'company');
// print_r($user);
// exit;

// get user jobs
$job_model = new Job($conn);
$jobs = $job_model->GetCompanyJobs($user_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Women</title>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <header>
            <h2 class="header mt-2 text-uppercase"><?= strtoupper($user[0]['firstname'])."'s"; ?> Company jobs</h2>
        </header>
        <?php if (count($jobs ) > 0) { ?>
              <div class="row">
            <?php foreach ($jobs as $key => $row) { ?>
                <div class="col-md-4 mb-2">
                    <div class="card border border-warning" style="width: 16rem;">
                        <div class="card-header shadow text-uppercase">
                            <?php echo $row['job_title']; ?>
                        </div>
                        <div class="card-body">
                            <h5 >Job Category:</h5> <?php echo ucfirst($row['job_category']); ?>
                            <h5>Description</h5>
                            <p class="card-text"><?php echo ucfirst($row['job_description']); ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="apply.php?title=<?php echo ucfirst($row['job_title']); ?>&job_id=<?php echo ucfirst($row['id']); ?>" class="btn btn-info btn-sm">Apply</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php }else{?>
            <div class="card">
                <div class="card-header border-bottom border-primary">
                    No <?= strtoupper($user[0]['firstname'])."'s"; ?> jobs Data.  <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Go Back</a> 
                </div>
            </div>
        <?php }?>
      
    </div>

</body>
</html>