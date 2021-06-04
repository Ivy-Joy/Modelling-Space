<?php
include('config.php');

$user_model = new User($conn);
$get_gender = '';

if (isset($_GET['gender'])) {
    $get_gender = $_GET['gender'];
}
// get models by gender
$models = $user_model->GetFilteredUsers('gender', $get_gender, 'model');
// print_r($models);
// exit;
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
            <h2 class="header mt-2"><?= strtoupper($_GET['gender']); ?> MODELS</h2>
        </header>
        <?php if (count($models) > 0) { ?>
            <div class="row">
                <?php foreach ($models as $key => $row) { ?>
                    <div class="col-md-4 mb-2">
                        <div class="card border border-warning" style="height: 16rem; width: 16rem;">
                            <img src="images/<?php echo $row['profileImage']; ?>" class="" alt="..." style="height: 16rem; width: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">Name: <?php echo $row['firstname'] . " " . $row['lastname']; ?></h5>
                                <p class="card-text"><?php echo $row['email'] ?></p>
                                <p class="card-text"><?php
                                                        if (strlen($row['about']) > 30) {
                                                            echo substr($row['about'], 0, 20);
                                                        } else {
                                                            echo $row['about'];
                                                        }

                                                        ?></p>
                                <a href="model_posts.php?user_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-block btn-sm"><?php echo ucwords(strtolower($row['firstname']))."'s";?> Posts</a>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="card">
                <div class="card-header border-bottom border-primary">
                    No <?= ucwords($_GET['gender']); ?> Models Data. <a href="<?= $_SERVER['HTTP_REFERER'];?>">Go Back</a>
                </div>
            </div>
        <?php } ?>

    </div>

</body>

</html>